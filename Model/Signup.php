<?php
App::uses('AppModel', 'Model');
/**
 * Signup Model
 *
 */
class Signup extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
					'message' => 'Please Enter a Valid Email Address',
					'allowEmpty' => false,
					'required' => false,
			),
			 'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'You Already Signed Up!',
            ),
		),
	);
	
	function invite_code() {
  		$random_hash = substr(md5(uniqid(rand(), true)), -5, 5);
		$letters = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
		shuffle($letters);
		$rand = '';
		foreach (array_rand($letters, 5) as $k) {$rand .= $letters[$k];}
		return $rand . $random_hash;		
   }
}
