<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1 { text-align: center; 	font-family: Calibri; }
	</style>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>

<h1>Productive Technology</h1>
    <div>
		<?php echo $output; ?>
    </div>
	<div>
	
<footer>
  <br>Author: Productive Tech4</br>
  <a href="mailto:p  <a href="mailto:productivetech4sys@prodtech4.com">productivetech4sys@yahoo.com</a></p>
<h2>

<!-- Add font awesome icons -->
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
</h2>
  </footer>
</div>
</body>
</html>
