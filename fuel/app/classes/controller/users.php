<?php

class Controller_Users extends Controller_Template
{

	public function get_register($fieldset = null, $errors = null)
	{
		$auth = Auth::instance();
		$view = View::forge('users/register');

		if(empty($fieldset)){
			$fieldset = Fieldset::forge('register');
			Model_User::populate_register_fieldset($fieldset);
		}

		$view->set('reg', $fieldset->build(), false);
		if($errors) $view->set_safe('errors', $errors);
		$this->template->title = 'Register';
		$this->template->content = $view;
	}

	public function post_register(){
		$fieldset = Model_User::populate_register_fieldset(Fieldset::forge('register'));
		$fieldset->repopulate();
		$result = Model_User::validate_registration($fieldset, Auth::instance());

		if($result['e_found']){
			return $this->get_register($fieldset, $result['errors']);
		}

		Session::set_flash('success', 'User created.');
		Response::redirect('notes');
	}

	public function action_login()
	{
		$data["subnav"] = array('login'=> 'active' );
		$this->template->title = 'Users &raquo; Login';
		$this->template->content = View::forge('users/login', $data);
	}

	public function action_logout()
	{
		$data["subnav"] = array('logout'=> 'active' );
		$this->template->title = 'Users &raquo; Logout';
		$this->template->content = View::forge('users/logout', $data);
	}

}
