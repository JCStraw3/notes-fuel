<?php

class Controller_Welcome extends Controller
{

	// Home page.

	public function action_index(){

		return Response::forge(View::forge('welcome/index'));

	}

	// 404 page.

	public function action_404(){

		return Response::forge(Presenter::forge('welcome/404'), 404);

	}

}