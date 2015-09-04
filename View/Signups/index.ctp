<?php 
	$url = FULL_BASE_URL;
	$image = FULL_BASE_URL .  '/img/' . Configure::read('Admin.background_image');
    $this->Html->meta('description','Support a cause in your area and we\'ll have someone call and lobby your representatives on your behalf. Get started right now and join the movement.',array('inline' => false));
	$this->Html->meta('keywords', 'social activism, policital activism, lobby, lobbying, government, politics', array('inline' => false));
	$this->Html->meta(array('property' => 'og:url', 'content' => $url) ,'', array('inline' => false));
	$this->Html->meta(array('property' => 'og:title', 'content' => 'Crowd Sourced Lobbying') ,'', array('inline' => false));
	$this->Html->meta(array('property' => 'og:description', 'content' => 'Amplifyd is a crowdsourced marketplace to help people amplify their opinions on public policy by having someone else email, call and lobby on their behalf. Sign up to support a cause in your community, become a lobbyist and make calls for others, or start campaign and generate revenue for your activist organization.') ,'', array('inline' => false));
	$this->Html->meta(array('property' => 'og:image', 'content' => $image) ,'', array('inline' => false));
?>

<?php echo $this->element('title'); ?>

<div id="box"> 
	<div id="top-box">
        
    <div>
        <?php echo $this->Html->image('logo.png', array('alt' => 'Amplifyd', 'class' => 'image-logo')); ?>
        <p>Support a cause in your community with our upcoming site and someone will call and lobby your politicians on your behalf. Or become a lobbyist yourself and get paid to call politicians for others.
</p>
      
<p></p>
		<p>Sign up now to help us launch the site and to lock in a special caller rate - you could be making $20/hour working from home or anywhere in the world.</p>
    </div>
    <?php 
        echo $this->Form->create('Signup', array('autocomplete'=> 'off')); 
        echo $this->Form->input('email', array('label' => false,'placeholder' => 'your@email-address.com'));
        echo $this->Form->submit('Go', array('class' => 'submit-button'));
		//echo $this->Form->end(__('Go', array('class' => 'test'))); 
	?>
        
   	<div id="sharing" class="clearboth">
      
    </div>
</div>

<div id="sub-box">
	<?php echo $this->element('social_liking'); ?>

	
    <div id="sub-box-right">
    	<?php echo $this->Html->link('About Us', array('action' => 'about'));?>
    </div>
</div>
</div>
