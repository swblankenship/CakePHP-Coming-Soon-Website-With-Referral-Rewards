<?php 
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'unirest_php', array('file' => 'unirest_php'.DS.'lib'.DS.'Unirest.php'));
App::import('Vendor', 'Sendgrid', array('file' => 'Sendgrid'.DS.'lib'.DS.'SendGrid.php'));
App::import('Vendor', 'smtpapi_php', array('file' => 'smtpapi_php'.DS.'lib'.DS.'Smtpapi.php'));
SendGrid::register_autoloader();
Smtpapi::register_autoloader();
//App::uses('String', 'Utility');


		
class NewsletterShell extends AppShell {	
	
	function email_adminOut($task = null, $message) {
        $email = new CakeEmail('sendgrid');
		$email->emailFormat('html');
        $email->to(Configure::read('Admin.admin_email'));
        $email->subject('[' . $task  . '] shell completion status');
        $email->send($message);
    }
	function timestamp() {
		return date('Y-m-d H:i:s');
	}
   
public function main() {
		 set_time_limit(300); 
		 
		 //Set your subject and message.  HTML works in the message
		 $subject = 'This is my subject';
		 $message = 'This is my message<br /><br />Best, Scott';
		 
		 
		$sendgrid = new SendGrid(Configure::Read('Sendgrid.username'), Configure::Read('Sendgrid.password'));
		$mail = new SendGrid\Email();
		
		$this->loadModel('User');
	
		$recipients = $this->User->find('all', array(
			'conditions'=> array(
				'User.is_active' => true,
				'User.is_subscribed' => true,
				'OR' => array(
					//Target the type of user here by uncommenting the ones you don't want
					array('User.role_id' => Configure::read('Role.Campaigner_ID')),
					array('User.role_id' => Configure::read('Role.CampaignerAdmin_ID')),
					array('User.role_id' => Configure::read('Role.CampaignerUser_ID')),
					array('User.role_id' => Configure::read('Role.Activist_ID')),
					array('User.role_id' => Configure::read('Role.AdminAdmin_ID')),
					array('User.role_id' => Configure::read('Role.AdminUser_ID')),
				)
			),
			'recursive' => -1
		));
		
		$to_array = array();
		foreach ($recipients as $recipient) {
			array_push($to_array, $recipient['User']['username']);
		}
			
		//Uncomment the mail session below when you're ready to send the email
		/*	$mail
				->setTos($to_array)
				->setFrom('admin@amplifyd.com')
				->setFromName('Amplifyd')
				->setSubject($subject)
				->setText($message)
				->setHtml($this->emailTemplate($message));
			
			$sendgrid->send($mail);*/
					
		
		
		$task = 'Newsletter main';       
		$out_message = 'There were ' . count($to_array) . ' newsletter blast emails sent. 
							<br /><br />Time executed: ' . $this->timestamp();
		$this->email_adminOut($task,$out_message);
		$this->out($out_message);
	
	}
	
	
	//Couldn't figure out how to add this helper in, isn't supported with string:: but other helpers in String work
	function autoParagraph($text) {
		if (trim($text) !== '') {
			$text = preg_replace('|<br[^>]*>\s*<br[^>]*>|i', "\n\n", $text . "\n");
			$text = preg_replace("/\n\n+/", "\n\n", str_replace(array("\r\n", "\r"), "\n", $text));
			$texts = preg_split('/\n\s*\n/', $text, -1, PREG_SPLIT_NO_EMPTY);
			$text = '';
			foreach ($texts as $txt) {
				$text .= '<p>' . nl2br(trim($txt, "\n")) . "</p>\n";
			}
			$text = preg_replace('|<p>\s*</p>|', '', $text);
		}
		return $text;
	}
	
	//Couldn't figure out how to use the email layouts so adding it here.  It will need to get updated if the templates are updated.  
	function emailTemplate($content) {
		return $email = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $title_for_layout;?></title>
		<style type="text/css">
		#outlook a {
			padding:0;
		}
		body, html {
			width:100% !important;
			-webkit-text-size-adjust:none;
			 margin: 0;
			padding: 0;
		}
		table td {
			border-collapse:collapse;
		}
		</style>
		</head>
		<body>
		<table width="100%" cellpadding="0" cellspacing="0" align="center">
			 <!-- Body -->
			 <tr>
			  <td width="100%" bgcolor="#fefcef" align="center">
				<table width="600" cellpadding="0" cellspacing="0" align="center">
					<tr>
						 <td width="600" align="center" valign="top" bgcolor="#fefcef">
								<table width="600" height="100%" cellpadding="0" cellspacing="0" align="center">
									<tr>
										<td width="60" height="100%" align="center" valign="middle" bgcolor="#fefcef" style="line-height:0;">
										</td>
										<td width="478" height="100%" align="center" valign="middle" bgcolor="#fefcef" style="color:#28313d;font-family:Arial, Helvetica, sans-serif;font-size:18px;text-align:left;line-height:18px;padding-top:40px;padding-bottom:40px;">
										
										' . $content .
										'	
										   
										</td>
										 <td width="60" height="100%" valign="middle" style="line-height:0;" bgcolor="#fefcef">
										</td>
								</tr>
							</table>
						  </td>
					</tr>
					</table>
				 </td>
				</tr>
				 <!-- End Body -->
				 <!-- Footer 1 -->
			<tr>
			  <td width="100%" bgcolor="#232629" align="center">
				<table width="600" cellpadding="0" cellspacing="0" align="center">
				  <tr>
						 <td width="600" align="center" valign="top" bgcolor="#232629">
								<table width="600" height="100%" cellpadding="0" cellspacing="0" align="center">
									<tr>
										<td width="169" height="100%" align="center" valign="middle" bgcolor="#232629" style="line-height:0;padding-top:60px;padding-bottom:50px;">
										</td>
										<td width="65" height="100%" align="center" valign="middle" bgcolor="#232629" style="line-height:0;padding-left:5px; padding-right:5px;padding-top:60px;padding-bottom:50px;">
										 <a href="https://www.facebook.com/amplifydvoices" target="_blank" title="Join us on Facebook" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-decoration:none;line-height:0;">
											<img alt="Facebook" style="border:none;display:block;line-height:0;" src="https://dl.dropboxusercontent.com/u/2022467/Amplifyd/icon-facebook.png" />
										</a>
										</td>
										 <td width="65" height="100%" align="center" valign="middle" bgcolor="#232629" style="line-height:0;padding-left:5px; padding-right:5px;padding-top:60px;padding-bottom:50px;">
										<a href="https://twitter.com/amplifyddotcom" target="_blank" title="Join us on Twitter" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-decoration:none;line-height:0;">
											<img alt="Twitter" style="border:none;display:block;line-height:0;" src="https://dl.dropboxusercontent.com/u/2022467/Amplifyd/icon-twitter.png" />
										</a>
										</td>
										 <td width="65" height="100%" align="center" valign="middle" bgcolor="#232629" style="line-height:0;padding-left:5px; padding-right:5px;padding-top:60px;padding-bottom:50px;">
											 <a href="https://plus.google.com/u/0/113217282161693429638" target="_blank" title="Join us on Google" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-decoration:none;line-height:0;">
											<img alt="Google" style="border:none;display:block;line-height:0;" src="https://dl.dropboxusercontent.com/u/2022467/Amplifyd/icon-google.png" />
										</a>
										</td>
										 <td width="65" height="100%" align="center" valign="middle" bgcolor="#232629" style="line-height:0;padding-left:5px; padding-right:5px;padding-top:60px;padding-bottom:50px;">
											 <a href="http://amplifyd.com/blog" target="_blank" title="Read our Blog" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-decoration:none;line-height:0;">
											<img alt="Blog" style="border:none;display:block;line-height:0;" src="https://dl.dropboxusercontent.com/u/2022467/Amplifyd/icon-blog.png" />
										</a>
										</td>
										 <td width="169" height="100%" valign="middle" style="line-height:0;" bgcolor="#232629">
										</td>
								</tr>
							</table>
						  </td>
					</tr>
					 </table>
				  </td>
				</tr>
				 <!-- End Footer 1 -->
				  <!-- Footer 2 -->
		   <tr>
			  <td width="100%" bgcolor="#232629" align="center">
				<table width="600" cellpadding="0" cellspacing="0" align="center">
					<tr>
						 <td width="600" align="center" valign="top" bgcolor="#232629">
								<table width="600" height="100%" cellpadding="0" cellspacing="0" align="center">
									<tr>
										<td width="100%" height="100%" align="center" valign="middle" bgcolor="#232629" style="line-height:0;padding-top:0px;padding-bottom:50px;">
										 <a href="http://amplifyd.com/" target="_blank" title="Visit Website" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-decoration:none;line-height:0;">
											<img alt="Amplifyd" style="border:none;display:block;line-height:0;" src="https://dl.dropboxusercontent.com/u/2022467/Amplifyd/logo-grey.png" />
										</a>
										</td>
								</tr>
							</table>
						  </td>
					</tr>
					</table>
			 </td>
			</tr>
				 <!-- End Footer 2 -->
				<!-- Footer 3 -->
			<tr>
			  <td width="100%" bgcolor="#1f2225" align="center">
				<table width="600" cellpadding="0" cellspacing="0" align="center">
				  <tr>
						 <td width="600" align="center" valign="top" bgcolor="#1f2225">
								<table width="600" height="100%" cellpadding="0" cellspacing="0" align="center">
									<tr>
										<td width="100%" height="35px" align="center" valign="middle" bgcolor="#1f2225" style="line-height:0;padding-top:5px;padding-bottom:0px;color:#8e959c;">
										 <a href="http://amplifyd.com/users/login" target="_blank" title="Login" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#8e959c;text-decoration:none;line-height:0;">
												Login
										</a>
										|
										<a href="http://amplifyd.com/becoming-a-caller" target="_blank" title="Become a Caller" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#8e959c;text-decoration:none;line-height:0;">
												Become a Caller  
										</a>
										|
										<a href="http://amplifyd.com/becoming-a-campaigner" target="_blank" title="Start a Campaign" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#8e959c;text-decoration:none;line-height:0;">
												Start a Campaign
										</a>
										|
										 <a href="http://amplifyd.com/campaigns" target="_blank" title="All Campaigns" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#8e959c;text-decoration:none;line-height:0;">
												All Campaigns
										</a>
										|
										 <a href="http://amplifyd.com/contact" target="_blank" title="Contact" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#8e959c;text-decoration:none;line-height:0;">
												Contact  
										</a>
										</td>
								</tr>
							</table>
						  </td>
					</tr>
					</table>
				</td>
			</tr>
				 <!-- End Footer 3 -->
			   </table>     
			</td>
		  </tr>
		</table>
		</body>
		</html>';
	}
	
}