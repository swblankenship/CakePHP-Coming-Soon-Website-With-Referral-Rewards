<html class="no-js">
<head>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'Amplifyd |  Crowd-Sourced Lobbying' ?>
	</title>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
 
   

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta(array('name'=>'viewport','content'=>'width=device-width, initial-scale=1.0'));
		echo $this->fetch('meta');
		echo $this->Html->css('style');
		//echo $this->Html->css('cake.generic');
		echo $this->fetch('css');
		echo $this->Html->script('modernizer');	
		echo $this->Html->script('jquery.backstretch');
		
		// Use the AssetCompress below when you go live to combine the files
		//echo $this->AssetCompress->script('jquery-combined');
		//echo $this->AssetCompress->css('css-combined');
		
		

		echo $this->fetch('script');
		echo $this->Html->script('site');

		
		
	?>
 
    
</head>
<body>
<?php echo $this->element('body-top'); ?>
<div id="holder">  

	<div id="container">
    	<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?> 
	</div>
  	
	
</div>
<?php echo $this->element('body-bottom'); ?>

<?php 
//This puts js file into new file
//echo $this->Js->writeBuffer(array('cache' => true));	?>



</body>
</html>

