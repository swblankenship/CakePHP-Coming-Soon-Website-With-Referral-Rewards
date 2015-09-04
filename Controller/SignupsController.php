<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Signups Controller
 *
 * @property Signup $Signup
 * @property PaginatorComponent $Paginator
 */
class SignupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('Form','Html',);
	public $components = array('Cookie');	
	
	//This email is sent when someone signs up
	//Adjust the message body and subject to fit your needs
	//keep $sharelink as is
	
	function email_signup($receiver = null, $code = null) {
        $share_link = FULL_BASE_URL.'/invite/'. $code;
        $message = 'Thanks!
									<br /><br />
							You successfully joined our community and locked in your special $2.50 caller rate. 
									<br /><br />
							Want to increase that to $3.50 a call?  Invite 10 friends to join Amplifyd with your unique share link below. Hurry though, this opportunity will not be available after we launch! Here\'s your share link:   
									<br />
							<a href="'. $share_link . '" >'. $share_link . '</a>
									<br /><br />
							If you want to help the Amplifyd project get off the ground, you can donate to our <a href="" >Indiegogo Campaign</a> - every bit helps bring this project to life!  
							You can also visit the campaign page to learn more about how Amplifyd works and see screenshots of the new site.
								<br /><br />
							We\'ll be annoucing our launch date and fundraising status on <a href="https://facebook.com/amplifydvoices" >Facebook</a> and <a href="https://twitter.com/amplifyddotcom" >Twitter</a> so make sure to like and follow us in order to get priority notification. 
									<br /><br />
							Thanks again, we really appreciate your support!
									<br /><br />
							';
        $email = new CakeEmail('sendgrid');
		$email->emailFormat('html');
        $email->to($receiver);
        $email->subject('Thank You For Joining Our Community');
        $email->send($message);
		
    }
	
	//This email is sent when the person that originally referred the current signup
	//You can use this to let the person know that someone signed up from their link and encourage them to keep sharing their link
	//Adjust the message body and subject to fit your needs
	//keep $sharelink as is
	function email_referrer($receiver = null, $invite_total = null, $code = null) {
        $share_link = FULL_BASE_URL.'/invite/'. $code;
		
		//For our coming soon incentive, we were increasing peoples call rates by 10 cents for every person that joined the site from their link
		//so the funciton below simply calculates their new rate.
		//add in your own function if you want
		$total_referrals = $invite_total;
		$current_rate = 2.50 + ($invite_total *  .10);
		if ($current_rate > 3.50) {
			$current_rate = 3.50;
		}
		
        $message = 'Nice work!  
								<br /><br />
							One of your friends just joined Amplifyd.  Your new caller rate is now $' . $current_rate . '0/per call. 
								<br /><br />
							Because of you, our public voice just got stronger and louder.
								<br /><br />
							Keep it up, here\'s your unique invite link again: 
								<br />
							<a href="'. $share_link . '" >'. $share_link . '</a>
								<br /><br />
							';
        $email = new CakeEmail('sendgrid');
		$email->emailFormat('html');
        $email->to($receiver);
        $email->subject('A Friend Just Joined');
        $email->send($message);
		
    }

public function index() {
		
		if (!empty($this->request->data)) {
			
			//Assign random string
			$data = $this->request->data;
			$code = $this->Signup->invite_code();
			$data['Signup']['invite_code'] = $code;
			
			if ($this->Signup->save($data)) {
				if ($this->Cookie->read('invite_code')) {
					$inviter = $this->Signup->find('first',array(
						'conditions' => array('Signup.invite_code' => $this->Cookie->read('invite_code')),
						'recursive' => -1));
					if (!empty($inviter)) {
						$inviter['Signup']['invite_total'] = $inviter['Signup']['invite_total'] + 1;
						if ($this->Signup->save($inviter, array('validate' => false))) {
							$this->Cookie->delete('invite_code');
							$this->email_referrer($inviter['Signup']['email'],$inviter['Signup']['invite_total'],$inviter['Signup']['invite_code']);
						}
					}			
				}
				$this->email_signup($data['Signup']['email'],$code);
				$this->redirect(array('controller' => 'signups', 'action' => 'share', $code));	
			} 			
			
		}
		
	}

public function invite($code = NULL) {
		if (!empty($code)) {
			$this->Cookie->write('invite_code', $code, false, '3 months');	
		}
		
		$this->redirect(array('controller' => 'signups', 'action' => 'index'));	
	}

public function share($code = NULL) {
		$this->set(compact('code'));
		 
	}
	
public function about() {
		
	}

}