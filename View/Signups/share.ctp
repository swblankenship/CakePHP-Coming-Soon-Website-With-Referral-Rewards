<?php 
	$url = FULL_BASE_URL.'/invite/'. $code;
	$image = FULL_BASE_URL .  '/img/' . Configure::read('Admin.background_image');
    $this->Html->meta('description','Support a cause in your community and we\'ll have someone call and lobby your representatives on your behalf. Share this URL to invite your friends to join.',array('inline' => false));
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
        <h2>Thank You!</h2>
        <p>Increase your calling rate by inviting friends into the community.</p>
        <p>For every person you invite up to ten people, you'll increase your calling rate by 10&cent;. This could mean an extra $10,000/year for a full-time lobbyist!</p>
       <p></p>
        <p>Share the URL below on Facebook, Twitter or via Email</p>
    </div>
   
    <div id="share-link"><?php echo FULL_BASE_URL.'/invite/'. $code; ?></div>
    
   	<div id="sharing" class="clearboth">
  
    <script>
	var feedObj = {
		method: 'feed',
		link: '<?php echo FULL_BASE_URL.'/invite/'. $code; ?>',
		picture: '<?php echo $image; ?>',
		name: 'Crowd Sourced Lobbying',
		caption: 'www.Amplifyd.com',
		description: 'Amplifyd is a crowdsourced marketplace to help people amplify their opinions on public policy by having someone else email, call and lobby on their behalf. Sign up to support a cause in your community, become a lobbyist and make calls for others, or start campaign and generate revenue for your activist organization.',
		actions: [
			{ name: 'Join', link: 'http://www.amplifyd.com/' }
		]
	};
</script>
	 <div id="facebook-share" onclick="
     	 FB.ui(feedObj);">
        <span id="icon-facebook"></span>Share on Facebook
   	</div>
 
        <a href="http://twitter.com/share?text=Signup+with+to+be+a+freelance+lobbyist+and+earn+up+to+%2430%2Fhr+working+from+home&url=<?php echo FULL_BASE_URL.'/invite/'. $code; ?>&via=Amplifyddotcom" id="twitter-share" target="_blank" data-url="https://dev.twitter.com" onclick="
         window.open(
         'http://twitter.com/share?text=Signup+with+to+be+a+freelance+lobbyist+and+earn+up+to+%2430%2Fhr+working+from+home&url=<?php echo FULL_BASE_URL.'/invite/'. $code; ?>&via=Amplifyddotcom',
         'twitter-share-dialog', 
         'width=610,height=368,top=150,left=350');     
         return false;">
     
        	<span id="icon-twitter"></span>Share on Twitter</a>
    </div>
</div>

<div id="sub-box" class="clearboth">
	<?php echo $this->element('social_liking'); ?>

	
    <div id="sub-box-right">
    	<?php echo $this->Html->link('About Us', array('action' => 'about'));?>
    </div>
</div>
</div>
