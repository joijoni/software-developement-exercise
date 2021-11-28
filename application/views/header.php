<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
	body{
  background-color: #c5eefa;
}
	#nav { font-family: Arial; font-size: 17px; width: 100%; float: left; margin: 0 0 1em 0; padding: 0; list-style: none;}
	#nav {list-style: none; border:0;}
	#rightnav { list-style: none; }
	#nav li { float: left; }
	#rightnav li { float: right; }
	#nav li a { margin: 0 3px 0 0; font-size: 16px; display: block; padding: 8px 15px; text-decoration: none; color: #000; background-color: #D0DDDD; border: 1px solid #c1c1c1;}
	#nav li a:hover {background-color: #ffffff;}
	#nav a:link, a:visited {border-radius: 12px 12px 12px 12px; }	

#footer {
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#6cf;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

.fa {
  padding: 15px;
  font-size: 20px;
  width: 20px;
  text-align: center;
  text-decoration: none;
  margin: 4px 2px;
  border-radius: 30%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: #ffffff;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-youtube {
  background: #bb0000;
  color: #ffffff;
}

.fa-instagram {
  background: #125688;
 color: #ffffff;
}   
	
	</style>

</head>
<body>
	<div>
		<ul id="nav">
			<li><a href='<?php echo site_url('')?>'>Home</a></li>
		
			<li><a href='<?php echo site_url('main/developer')?>'>Developer</a></li>
			<li><a href='<?php echo site_url('main/employee')?>'>Employee</a></li>
			<li><a href='<?php echo site_url('main/prod_tech')?>'>Productive Technology</a></li>
			<li><a href='<?php echo site_url('main/rating')?>'>Technology Ratings</a></li>
			<li><a href='<?php echo site_url('main/view_orders')?>'>View Orders</a></li>
			<li><a href='<?php echo site_url('main/view_users')?>'>Registered Users</a></li>
	
			<ul id="rightnav">
        <?php if(!isset($_SESSION['user_id'])){?>
				  <li><a href='<?php echo site_url('main/adminlogin')?>'>Admin Login</a></li>
        <?php }else{ ?>
          <li><a href='<?php echo site_url('main/logout')?>'>Logout</a></li>
        <?php } ?>
				<!-- <li><a href='<?php echo site_url('main/querynav')?>'>Queries</a></li> -->
				<li><a href='<?php echo site_url('main/faq')?>'>FAQ</a></li>
			</ul>
		</ul>
	</div>
	




</body>
</html>
