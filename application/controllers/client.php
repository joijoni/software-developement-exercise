<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Client extends CI_Controller {
	 
        function __construct(){
           parent::__construct();	 
           $this->load->database();
           $this->load->helper('url');
           $this->load->model('user_model');
           $this->load->library('session');
           if(session_id() == ''){ session_start();}
        }
       

        protected function getTechList(){
            return $this->db->query('SELECT * from prod_tech order by tech_ID DESC');
        }

        protected function getRecentOrders(){
            return $this->db->query('
                SELECT po.*, pt.tech_name, pt.tech_setup, pt.tech_RRP, d.dev_Name, r.rating_score, r.rating_usage, r.rating_comments
                from placed_orders po 
                left join prod_tech pt on pt.tech_ID = po.tech_id
                left join developer d on d.dev_ID = pt.dev_ID
                left join rating r on r.tech_ID = pt.tech_ID
                where po.order_placed_by = ' . $_SESSION['user_id'] . '
                order by r.rating_score DESC
            ');
        }

        protected function placeNewOrder($techID){
            if($this->db->query('
                INSERT INTO placed_orders
                SET tech_id = "'.$techID.'",
                order_placed_by = ' . $_SESSION['user_id'] . ',
                order_placed_on = "'.date("l jS \of F Y").'"
            ')){
                return true;
            }
            return false;
        }

        protected function getFAQ(){
            return $this->db->query('
                SELECT * from faqs order by faq_id DESC
            ');
        }

        public function login_user(){ 
            $user_login=array(
                'user_email'=>$this->input->post('user_email'),
                'user_password'=>md5($this->input->post('user_password'))
            ); 

            $data['user']=$this->user_model->login_user($user_login['user_email'], $user_login['user_password']);

            if($data['user'] != false)
            {  
                $_SESSION['user_id'] = $data['user'][0]['user_id'];
                $_SESSION['user_email'] = $data['user'][0]['user_email'];
                $_SESSION['user_name'] = $data['user'][0]['user_name'];
                $_SESSION['user_age'] = $data['user'][0]['user_age'];
                $_SESSION['user_mobile'] = $data['user'][0]['user_mobile'];

                echo $_SESSION['user_id']; 
                redirect('client');
            }
            else{
                $this->session->set_flashdata('error_msg', 'Incorrect Login Details,Try again.');
                redirect('client');
            }
        }

        public function register_user(){
            $user=array(
            'user_name'=>$this->input->post('user_name'),
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>md5($this->input->post('user_password')),
            'user_age'=>$this->input->post('user_age'),
            'user_mobile'=>$this->input->post('user_mobile')
            );
            print_r($user);
        
            $email_check=$this->user_model->email_check($user['user_email']);
        
            if($email_check){
                $this->user_model->register_user($user);
                $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
                redirect('client');
            }
            else{
                $this->session->set_flashdata('error_msg', 'Email address not available, Try again.');
                redirect('client');
            }
        }

        public function logout(){
            session_destroy();
            redirect('client', 'refresh');
        }

        public function index(){	
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if (ob_get_length() > 0) { ob_end_clean(); }

                if(isset($_POST['placeOrder'])){
                    $this->result['status'] = $this->placeNewOrder($_POST['techID']);

                    $getRO = $this->getRecentOrders();
                    if($getRO->num_rows > 0){
                        foreach ($getRO->result() as $row) {
                            $this->result['html'] .=
                            '<tr>
                                <td class="text-left">'.$row->order_placed_on.'</td>
                                <td>'.$row->tech_name.'</td>
                                <td>'.$row->tech_setup.'</td>
                                <td>'.'£' . $row->tech_RRP.'</td>
                                <td>'.$row->dev_Name.'</td>
                                <!-- <td>'.(empty($row->rating) ? 'N/A' : $row->rating).'</td> -->
                            </tr>';
                        }
                    }
                    else{
                        $this->result['html'] = 
                        '<tr>
                            <td colspan="6">You haven\'t placed any order yet</td>
                        </tr>';
                    }

                    echo json_encode($this->result);
                }
                exit;
            }


            if($_SESSION['user_id']){
                $this->data['prod_tech'] = $this->getTechList();
                $this->data['recent_orders'] = $this->getRecentOrders();
                $this->data['faq'] = $this->getFAQ();
                
                $this->load->view('client/header');
                $this->load->view('client/index', $this->data);
                $this->load->view('client/footer');
            }else{
                $this->data['not_login'] = true;
                $this->load->view('client/header', $this->data);
                $this->load->view('client/login');
                $this->load->view('client/register');
                $this->load->view('client/footer');
            }
        }

    }
?> 