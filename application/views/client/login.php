
<div>
<section class="container" id="login" >
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:50px">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Login here</h3>
                </div>
                <?php
                    $success_msg= $this->session->flashdata('success_msg');
                    $error_msg= $this->session->flashdata('error_msg');

                    if($success_msg){
                ?>
                        <div class="alert alert-success">
                            <?php echo $success_msg; ?>
                        </div>
                <?php
                    }
                    if($error_msg){
                ?>
                        <div class="alert alert-danger">
                            <?php echo $error_msg; ?>
                        </div>
                <?php
                    }
                ?>

                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('index.php/client/login_user'); ?>">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Enter E-mail" name="user_email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="user_password" type="password" value="">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                        </fieldset>
                    </form>

                    <center>
                        <b>You are not registered ?</b> <br>
                        <a class="register_button" href="#">Register here</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
