<section class="container" style="display:none;" id="register">
    <div class="row">
        <div class="col-md-4 col-md-offset-4"  style="margin-top:50px">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Register here</h3>
                </div>
                <div class="panel-body">

                <?php
                $error_msg=$this->session->flashdata('error_msg');
                if($error_msg){
                    echo $error_msg;
                }
                ?>

                    <form role="form" method="post" action="<?php echo base_url('index.php/client/register_user'); ?>">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Please enter Name" name="user_name" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Please enter E-mail" name="user_email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="user_password" type="password" value="">
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Age" name="user_age" type="number" value="">
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Enter 10 diMobile No" name="user_mobile" type="number" value="">
                            </div>

                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                        </fieldset>
                    </form>
                    <center>
                        <b>You have Already registered ?</b> <br>
                        <a class="login_button" href="#"> Please Login</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>