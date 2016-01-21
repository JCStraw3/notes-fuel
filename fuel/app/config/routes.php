<?php

return array(
	'_root_' => 'welcome/index',
	'_404_'   => 'welcome/404',

	'register' => 'users/register',
	'login' => 'users/login',
	
	'notes' => 'notes/read_all',
	'notes/create' => 'notes/create',
	'notes/edit/:id' => 'notes/update',
	'notes/delete/:id' => 'notes/delete',
	'notes/:id' => 'notes/read_one',
);