<?php

class Controller_Notes extends Controller_Template
{

	// Read all notes.

	public function action_read_all(){

		// Find all notes in the database.

		$notes = Model_Note::find('all');

		// Pass notes to the view.

		$view = View::forge('notes/read_all');
		$view->set('notes', $notes);
		$this->template->title = 'Notes';
		$this->template->content = $view;

	}

	// Read one note.

	public function action_read_one(){

		// Passes the id from the URL into a variable.

		$id = $this->param('id');

		// Uses the id to find the note in the database
		// Passes the note into a variable.

		$note = Model_Note::find($id);

		// Passes the note to the view.

		$this->template->title = 'Notes';
		$this->template->content = View::forge('notes/read_one', array('note' => $note));

	}

	// Create a note.

	public function action_create(){

		if (Input::post()){

			// Save form input to variable.

			$note = Model_Note::forge(array(
				'title' => Input::post('title'),
				'body' => Input::post('body'),
				));

			// Save variable to database.

			if ($note and $note->save()){
				Session::set_flash('success', 'You have created a note.');

				Response::redirect('notes');
			} else{
				Session::set_flash('error', 'Could not save note.');
			}

		}

		// Return view.

		$this->template->title = 'Create a Note';
		$this->template->content = View::forge('notes/create');

	}

	// Update a note.

	public function action_update(){

		// Passes the id from the URL into a variable.

		$id = $this->param('id');

		$note = Model_Note::find($id);

		if (Input::post()){
			$note->title = Input::post('title');
			$note->body = Input::post('body');

			if ($note->save()){
				Session::set_flash('success', 'You have updated the note.');
				Response::redirect('notes/');
			}
		}

		$this->template->title = 'Edit a Note';
		$this->template->content = View::forge('notes/update', array('note' => $note));

	}

	// Delete a note.

	public function action_delete(){

		$this->template->title = 'Delete';
		$this->template->content = View::forge('notes/delete');

	}

}
