<?php 
   	$url = FULL_BASE_URL . '/about/';
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
        
    <div id="about">
        <?php echo $this->Html->image('logo.png', array('alt' => 'Amplifyd', 'class' => 'image-logo')); ?>
         <h2>Support a Cause</h2>
        <p>We didn't think it was right that the people of this country, the ones that actually vote, have less influence over public policy than organizations that dump millions of dollars into corporate lobbying efforts.  That's why we built Amplifyd.  It's time that your voice is heard, and we're going to help you do that.  By supporting a cause, you'll have your very own advocate call, email and lobby your elected official on your behalf.</p>
        <br />
        <h2>Become a Caller</h2>
        <p>Anyone can become a caller and earn money working from home, or anywhere in the world, calling local and national politicians on the issues that you're most passionate about.  You'll be guided with a dynamic script and will be given great tools and tips to help you become a voice of thunder.  All you need is a browser and an internet connection, we'll handle the rest.</p>
         <br />
        <h2>Start a Campaign</h2>
        <p>Each campaign issue is managed by an activist non-profit organization.  If you are interested in generating revenue for your organization, building your community, mobilizing people to get loud for your cause, then we would very much like to speak with you.  Please email us at contact (at) amplifyd (dot) com.</p>
         <br />
         <h2>Our Team</h2>
        <p><strong>Scott Blankenship</strong><br />
        <span style="font-style:italic;">Founder & CEO</span><br />
        After graduating from college with a degree in International Relations, Scott found himself gifted with the opportunity to work at Starbucks and with much time to ruminate on his skill set, or lack thereof, and how he could ultimately contribute to society.  It was this wonderful and humbling experience that inspired him to make a deep commitment to develop the technical ability needed to manifest his ideas that he felt could better the world.  After 8 years of learning, preparing, practicing, working as an internet marketer, web designer and web developer, Scott has finally culminated his efforts to bring this project to fruition.</p>
        <p>But he cannot continue this project alone, he needs your support.  Together we can bring about healthy change to our wonderful country, we can amplify our voices, our concerns and our demands.  It's time that our elected officials listen to the people that brought them into office and not the interests of corporations.  It is time we promote productive dialogue and harmonious progress towards a better future without compromising our values and who we are as people.</p>
        <p>Please join this effort to create a better America by sharing this with your family, friends and community.  If you want to get even more involved, please send Scott an email at contact (at) amplifyd (dot) com.</p>
        <p>Scott also likes cats and writing in the third person. He's a real person that you can find here:</p>
         <ul id="team-social-links">
                <li><a title="Facebook" target="_blank" href="http://www.facebook.com/scottblank10">
                           <?php echo $this->Html->image('facebook-icon.png', array('alt' => 'Amplifyd Facebook', 'class' => '')); ?></a></li>
                <li><a title="Twitter" target="_blank" href="http://www.twitter.com/sw_blankenship">
                          <?php echo $this->Html->image('twitter-icon.png', array('alt' => 'Amplifyd Twitter', 'class' => '')); ?></a></li>
               <li><a title="Linkedin" target="_blank" href="http://www.linkedin.com/in/swblankenship">
                           <?php echo $this->Html->image('linkedin-icon.png', array('alt' => 'Amplifyd LinkedIn', 'class' => '')); ?></a></li>
          </ul>  
        <br /><br /><br />
        <p><strong>Kara Sickel</strong><br />
        <span style="font-style:italic;">Senior Sharer</span><br />
        Kara Sickel rocks, she's invited 5 people to join the Amplifyd community!  As the top inviter, we want to acknowledge her contribution and let her know we tremendously appreciate her efforts by giving her the prestigious and honorary title of Senior Sharer.</p>

		<p>Want to become the Senior Sharer?  Every day we'll list here the current top inviter.  Don't worry, you can be anonymous if you like!</p>
		<br  />
        <br  />
        <br  />
        <p><span style="font-size:13px;">This awesome background image is an edited photo by <a href="http://www.flickr.com/photos/glynlowe/7662531448/">Glyn Lowe Photoworks</a></span></p>
    </div>
 
</div>

<div id="sub-box">
	<?php echo $this->element('social_liking'); ?>
    <div id="sub-box-right">
    	<?php echo $this->Html->link('Back', $this->request->referer());?>
    </div>
</div>
</div>
