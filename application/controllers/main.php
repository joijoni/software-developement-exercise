<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	 
	 function __construct()
	{
		parent::__construct();	 
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('table');
		
		$this->load->model('user_model');
		$this->load->library('session');
		if(session_id() == ''){ session_start();}
	}
	
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('home');
	}
	
		//the fields function lists attributes to see on add/edit forms.
		//Note no inclusion of invoiceNo as this is auto-incrementing
		//$crud->fields('date', 'dev_ID', 'items');
		
		//set the foreign keys to appear as drop-down menus
		// ('this fk column','referencing table', 'column in referencing table')
		//$crud->set_relation('dev_ID','developer','dev_ID');
		
		//set the foreign keys to appear as drop-down menus
		// ('this fk column','referencing table', 'column in referencing table')
		//$crud->set_relation('dev_ID','prod_tech','dev_ID');
		
		
		
		//change column heading name for readability ('columm name', 'name to display in frontend column header')
		//$crud->display_as('dev_ID', 'DeveloperID');
		
		public function adminlogin()
		{	
			$this->load->view('header');
			$this->load->view('login');
		}
		
		public function login_user(){

            $user_login=array(
                'user_email'=>$this->input->post('uname'),
                'user_password'=>md5($this->input->post('pwd'))
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
                #redirect('/');
				header("Location: /tech4/");
            }
            else{
                $this->session->set_flashdata('error_msg', 'Incorrect Login Details,Try again.');
                redirect('client');
            }
        }

        public function logout(){
            session_destroy();
            header("Location: /tech4/");
        }

public function developer()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('developer');
		$crud->set_subject('developer');
		$crud->columns( 'dev_ID', 'dev_Name', 'dev_comp_Address', 'dev_comp_Tel','dev_email');
		//$crud->columns( 'dev_Name', 'dev_comp_Address', 'dev_comp_Tel','dev_email');
		//$crud->fields('dev_ID', 'dev_Name', 'dev_comp_Address', 'dev_comp_Tel','dev_email');
		$crud->fields('dev_Name', 'dev_comp_Address', 'dev_comp_Tel','dev_email');
		//$crud->required_fields('dev_ID', 'dev_Name', 'dev_comp_Address', 'dev_comp_Tel','dev_email');
		$crud->required_fields('dev_Name', 'dev_comp_Address', 'dev_comp_Tel','dev_email');
		//$crud->set_relation('dev_ID','prod_tech','dev_ID');
		$crud->display_as('dev_ID', 'DeveloperID');
		$crud->display_as('dev_Name', 'DeveloperName');
		$crud->display_as('dev_comp_Address', 'Address');
		$crud->display_as('dev_comp_Tel', 'Phone');
		$crud->display_as('dev_email', 'Email');
		
		$output = $crud->render();
		$this->developer_output($output);
	}
	
	function developer_output($output = null)
	{
		$this->load->view('developer_view.php', $output);
	}


public function prod_tech()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('prod_tech');
		$crud->set_subject('prod_tech');
		$crud->columns('tech_ID', 'tech_name', 'tech_date', 'tech_description','tech_setup', 'tech_RRP', 'dev_ID');
		//@$crud->columns('emp_ID','tech_ID', 'tech_name', 'tech_date', 'tech_description','tech_setup', 'tech_RRP', 'dev_ID');
		//set the foreign keys to appear as drop-down menus
		// ('this fk column','referencing table', 'column in referencing table')
		//$crud->set_relation_n_n('developer', 'rating','tech_ID,'emp_ID','emp_name');
		//$crud->set_relation('tech_ID','rating','rating_score','rating_usage'); //
		$crud->set_relation('dev_ID','developer','dev_Name');
		$crud->fields('dev_ID', 'tech_name', 'tech_date', 'tech_description','tech_setup', 'tech_RRP');
		//@$crud->fields('emp_ID','dev_ID', 'tech_name', 'tech_date', 'tech_description','tech_setup', 'tech_RRP');
		##$crud->required_field('tech_ID', 'tech_name', 'tech_date', 'tech_description','tech_setup', 'tech_RRP', 'dev_ID');
		$crud->required_fields('dev_ID', 'tech_name', 'tech_date', 'tech_description','tech_setup', 'tech_RRP');
		//@$crud->required_fields('emp_ID','dev_ID', 'tech_name', 'tech_date', 'tech_description','tech_setup', 'tech_RRP');
		#echo 'got here'; exit();
		//$crud->set_relation('dev_ID','developer','dev_ID');
		$crud->display_as('tech_ID', 'TechnologyID');
		$crud->display_as('tech_name', 'TechnologyName');
		$crud->display_as('tech_date', 'TechnologyDate');
		$crud->display_as('tech_description', 'Technology_Description');
		$crud->display_as('tech_setup', 'Technology_Setup');
		$crud->display_as('tech_RRP', 'Technology_RetailPrice');
		$crud->display_as('dev_ID', 'DeveloperID');
		//$crud->display_as('rating_score', 'Rating Score');
		
		$output = $crud->render();
		$this->prod_tech_output($output);
	}
	
	function prod_tech_output($output = null)
	{
		$this->load->view('prod_tech_output', $output);
	}

public function rating()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('rating');
		$crud->set_subject('rating');
		$crud->columns('rating_ID','tech_ID', 'emp_ID', 'rating_comments', 'rating_score','rating_usage');
		$crud->fields('tech_ID', 'emp_ID', 'rating_comments', 'rating_score','rating_usage');
		$crud->required_fields('tech_ID', 'emp_name', 'rating_comments', 'rating_score','rating_usage');
		//$crud->set_relation('emp_ID','employee','emp_ID');
		//$crud->set_relation('tech_ID','prod_tech','tech_name');
		$crud->set_relation('emp_ID','employee','emp_name');
		$crud->set_relation('tech_ID','prod_tech','tech_name');
		$crud->set_relation('rating_usage','usage','usage');
		$crud->set_relation('rating_score','score','score');
		$crud->display_as('rating_ID', 'Rating ID');
		$crud->display_as('tech_ID', 'Technology');
		$crud->display_as('emp_ID', 'Employee');
		$crud->display_as('rating_comments', 'Rating Comments');
		$crud->display_as('rating_score', 'Rating Score');
		$crud->display_as('rating_usage', 'Rating Usage');
		
		
		
		$output = $crud->render();
		$this->rating_output($output);
	}
	
	function rating_output($output = null)
	{
		$this->load->view('rating_output', $output);
	}
	
	public function employee()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('employee');
		$crud->set_subject('employee');
		$crud->columns('emp_ID', 'emp_name', 'emp_techniques', 'emp_JobType' );
		$crud->fields('emp_ID','emp_name', 'emp_techniques', 'emp_JobType' );
		$crud->required_fields('rating','emp_name', 'emp_techniques', 'emp_ID');
		//$crud->set_relation('rating','emp_ID','rating_score');
		$crud->set_relation('emp_JobType','type_of_job','Job_type');
		$crud->display_as('emp_ID', 'Employee ID');
		$crud->display_as('emp_name', 'Employee Name');
		$crud->display_as('emp_techniques', 'Employee Techniques');
		$crud->display_as('emp_JobType', 'Employee Job Type');
			
		
		$output = $crud->render();
		$this->employee_output($output);
	}
	
	function employee_output($output = null)
	{
		$this->load->view('employee_output', $output);
	}
	
	
	
	
	public function querynav()
	{	
		$this->load->view('header');
		$this->load->view('querynav_view');
	}
		
	public function query1()
	{	
		$this->load->view('header');
		$this->load->view('query1_view');
	}
	
	public function query2()
	{	
		$this->load->view('header');
		$this->load->view('query2_view');
	}
	
	public function blank()
	{	
		$this->load->view('header');
		$this->load->view('blank_view');
	}

	public function view_orders(){
		$this->load->view('header');

		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('placed_orders');
		$crud->set_subject('placed_orders');
		$crud->columns( 'tech_id', 'order_placed_by', 'order_placed_on');
		$crud->fields( 'tech_id', 'order_placed_by', 'order_placed_on');
		$crud->set_relation('order_placed_by','users','user_id');
		$crud->set_relation('tech_id','prod_tech','tech_ID');
		$crud->display_as('tech_id', 'Technology ID');
		$crud->display_as('order_placed_by', 'Order Placed By (User ID)');
		
		$output = $crud->render();
		$this->load->view('orders_view', $output);
	}

	public function faq()
	{	
		$this->load->view('header');

		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('faqs');
		$crud->set_subject('faqs');
		$crud->columns( 'faq_id', 'faq_question', 'faq_answer');
		$crud->fields('faq_question', 'faq_answer');
		$crud->required_fields('faq_question', 'faq_answer');
		$crud->display_as('faq_question', 'Question');
		$crud->display_as('faq_answer', 'Answer');
		
		$output = $crud->render();
		$this->load->view('faqs', $output);
	}

	public function view_users(){
		$this->load->view('header');

		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('users');
		$crud->set_subject('users');
		$crud->columns( 'user_id', 'user_name', 'user_name', 'user_password', 'user_age', 'user_mobile');
		$crud->fields('user_name', 'user_name', 'user_password', 'user_age', 'user_mobile');
		$crud->unset_add();
		
		$output = $crud->render();
		$this->load->view('view_users', $output);
	}

}
