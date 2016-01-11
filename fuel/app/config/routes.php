<?php

return array(
	'_404_'   => 'welcome/404',    // The main 404 route

	'register' => 'users/register',
	
	'_root_' => 'notes/read_all',
	'notes/create' => 'notes/create',
	'notes/edit/:id' => 'notes/update/',
	'notes/:id' => 'notes/read_one/',
);