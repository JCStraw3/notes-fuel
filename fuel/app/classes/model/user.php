<?php

use Orm\Model;

class Model_User extends Model {

	protected static $_properties = array(
		'id',
		'name',
		'email',
		'password',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'users';

	public static function populate_register_fieldset(Fieldset $form){
		$form->add('name', 'Name:')->add_rule('required');
		$form->add('email', 'Email:')->add_rule('valid_email');
		$form->add('password', 'Choose Password:', array('type' => 'password'))->add_rule('required');
		$form->add('password2', 'Re-enter Password:', array('type' => 'password'))->add_rule('required');
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Register'));
		return $form;
	}

	public static function register(Fieldset $form){
		$form->add('name', 'Name:')->add_rule('required');
		$form->add('email', 'Email:')->add_rule('valid_email');
		$form->add('password', 'Choose Password:', array('type' => 'password'))->add_rule('required');
		$form->add('password2', 'Re-enter Password:', array('type' => 'password'))->add_rule('required');
		$form->add('submit', '', array('type' => 'submit', 'value' => 'Register'));
		return $form;
	}

	public static function validate_registration(Fieldset $form, $auth){
		$form->field('password')->add_rule('match_value', $form->field('password2')->get_attribute('value'));

		$val = $form->validation();
		$val->set_message('required', ':field is a required field');
		$val->set_message('valid_email', ':field must be a valid email');
		$val->set_message('match_value', 'The passwords must match');

		if($val->run()){
			$name = $form->field('name')->get_attribute('value');
			$email = $form->field('email')->get_attribute('value');
			$password = $form->field('password')->get_attribute('value');

			try{
				$user = $auth->create_user($name, $email, $password);
			} catch(Exception $e) {
				$error = $e->getMessage();
			}

			if(isset($user)){
				$auth->login($name, $password);
			} else {
				if(isset($error)){
					$li = $error;
				} else {
					$li = 'Could not create user';
				}

				$errors = Html::ul(array($li));
				return array('e_found' => true, 'errors' => $errors);
			}
		} else {
			$errors = $val->show_errors();
			return array('e_found' => true, 'errors' => $errors);
		}
	}

}