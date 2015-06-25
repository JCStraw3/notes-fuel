<?php

class Controller_Users extends Controller_Template
{

// Register a user.

	// Get register form and show to user.

	public function get_register($fieldset = null, $errors = null)
	{

		// Init auth; pass view to variable.

		$auth = Auth::instance();
		$view = View::forge('users/register');

		// Populate empty form from model.

		if(empty($fieldset)){
			$fieldset = Fieldset::forge('register');
			Model_User::populate_register_fieldset($fieldset);
		}

		// Return view.

		$view->set('reg', $fieldset->build(), false);
		if($errors) $view->set_safe('errors', $errors);
		$this->template->title = 'Register';
		$this->template->content = $view;
	}

	// Post register form data to database.

	public function post_register(){

		// Grab populated form and pass into a variable.

		$fieldset = Model_User::populate_register_fieldset(Fieldset::forge('register'));
		$fieldset->repopulate();
		$result = Model_User::validate_registration($fieldset, Auth::instance());

		// Show error.s

		if($result['e_found']){
			return $this->get_register($fieldset, $result['errors']);
		}

		// Redirect.

		Session::set_flash('success', 'User created.');
		Response::redirect('notes');
	}

// Log in a user.

	public function action_login()
	{
		$data["subnav"] = array('login'=> 'active' );
		$this->template->title = 'Users &raquo; Login';
		$this->template->content = View::forge('users/login', $data);
	}

// Log out a user.

	public function action_logout()
	{
		$data["subnav"] = array('logout'=> 'active' );
		$this->template->title = 'Users &raquo; Logout';
		$this->template->content = View::forge('users/logout', $data);
	}

}
