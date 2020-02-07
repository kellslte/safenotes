<?php

class Notes extends Controller{
    public function __construct(){
        $this->noteModel = $this->model("Note");
        $this->userModel = $this->model("User");
    }

    public function index(){

        if (Session::exists('userid')) {
            $data = [
                'title' => 'Your Notes',
                'notes' => $this->noteModel->getAllNotes(Session::get('userid'))
            ];

            $this->view("notes/note", $data);   
        }else{
            Redirect::to('users/login');
        }
    }

    public function show($id){
        $row = $this->noteModel->getNote($id);
        $data = [
            'title' => $row->title,
            'note' => $row->note,
            'time' => $row->createdAt
        ];
        $this->view('notes/shownote', $data);
    }

    public function addnote(){
        // Check for post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //process form

            //Init data
            $data = [
                'title' => Sanitize::flush(Input::get('title')),
                'note' => Sanitize::clean(Sanitize::flush(Sanitize::escape(Input::get('body')))),
                'title_err' => '',
                'note_err' => '',
            ];

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter a title';
            }

            if (empty($data['note'])) {
                $data['note_err'] = 'Please enter a note';
            }

            if (empty($data['title_err']) && empty($data['note_err'])) {
                // Create note
                if ($this->noteModel->create($data)) {
                    Session::flash('note_message', 'Note Added');
                    return Redirect::to('notes/note');
                }
            }else{
                // Return view with errors
            $this->view("notes/addnote", $data);
             }

        }else{

            $data = [
                'heading' => 'Create a note',
                'title' => '',
                'note' => '',
                'title_err' => '',
                'note_err' => '',
            ];

            $this->view('notes/addnote', $data);
        }
    }

    public function editnote($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Init data and sanitize
            $data = [
                'id' => $id,
                'heading' => 'Edit Note',
                'title' => Sanitize::flush(Sanitize::escape(Sanitize::clean(Input::get('title')))),
                'note' => Sanitize::clean(Sanitize::flush(Sanitize::escape(Sanitize::clean(Input::get('note'))))),
                'userId' => Session::get('userid'),
                'title_err' => '',
                'body_err' => ''
            ];

            // Validate Title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter a title';
            }

            // Validate data
            if (empty($data['note'])) {
                $data['note_err'] = 'Please enter a note';
            }

            // Make sure there are no errors
            if (empty($data['title_err']) && empty($data['note_err'])) {
                // Validated
                if ($this->noteModel->update($id, $data)) {
                    Session::flash('note_message', 'Note Edited Successfully');
                    Redirect::to('notes/note');
                } else {
                    Session::flash('note_message', 'Something went wrong!', 'alert alert-danger');
                    Redirect::to('notes/note');
                }
            } else {
                // Load view with errors
                $this->view('notes/editnote', $data);
            }
        } else {
            // Get post from model
            $note = $this->noteModel->getNote($id);
            //Check for post owner
            if ($note->userId != Session::get('userid')) {
                Redirect::to('notes/note');
            }
            $data = [
                'id' => $id,
                'heading' => 'Edit Note',
                'title' => $note->title,
                'note' => $note->note
            ];
            
            $this->view('notes/editnote', $data);
        }
    }

    public function delete($id){
            //process form
            if ($this->noteModel->delete($id)) {
                Session::flash('note_message', 'Note Deleted');
                Redirect::to('notes/note');
            }
    }


}