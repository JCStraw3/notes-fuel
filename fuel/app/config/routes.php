<?php

return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

	'register' => 'users/register',
	
	'notes' => 'notes/read_all',
	'notes/create' => 'notes/create',
	'notes/edit/:id' => 'notes/update/',
	'notes/:id' => 'notes/read_one/',
);