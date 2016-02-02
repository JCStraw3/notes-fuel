<?php

class Controller_Notes extends Controller_Template
{

	// View all notes.

	public function get_read_all(){

		// Find all notes in the database.

		$notes = Model_Note::find('all');

		// Pass notes to the view.

		$view = View::forge('notes/read_all');
		$view->set('notes', $notes);
		$this->template->title = 'Notes';
		$this->template->content = $view;

	}

	// View one note.

	public function get_read_one(){

		// Passes the id from the URL into a variable.

		$id = $this->param('id');

		// Uses the id to find the note in the database
		// Passes the note into a variable.

		$note = Model_Note::find($id);

		// Pass the note to the view.

		$view = View::forge('notes/read_one');
		$view->set('note', $note);
		$this->template->title = 'Notes';
		$this->template->content = $view;

	}

	// View create note.

	public function get_create(){

		// Return view.

		$view = View::forge('notes/create');
		$this->template->title = 'Create a Note';
		$this->template->content = $view;

	}

	// Create a note in the database.

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

	}

	// View update a note.

	public function get_update(){

		// Passes the id from the URL into a variable.

		$id = $this->param('id');

		// Finds the note in the databas using the id.

		$note = Model_Note::find($id);

		// Return view.

		$view = View::forge('notes/update');
		$view->set('note', $note);
		$this->template->title = 'Edit a Note';
		$this->template->content = $view;

	}

	// Update a note in the database.

	public function action_update(){

		// Passes the id from the URL into a variable.

		$id = $this->param('id');

		// Finds the note in the databas using the id.

		$note = Model_Note::find($id);

		// Saves note to database.

		if (Input::post()){
			$note->title = Input::post('title');
			$note->body = Input::post('body');

			if ($note->save()){
				Session::set_flash('success', 'You have updated the note.');
				Response::redirect('/notes');
			}
		}

	}

	// Delete a note.

	public function action_delete($id){

		// $id = $this.param('id');

		$note = Model_Note::find($id);

		if($note){
			$note->delete();
			Session::set_flash('success', 'Deleted note.');
		} else {
			Session::set_flash('error', 'Could not delete note.');
		}

		Response::redirect('/notes');

	}

}
