<?php

class  Note{
    private $db;
    private $data;

    public function __construct()
    {
        $this->db = new Database;
    }

    // View all notes
    public function getAllNotes($id){
        //Query
        $this->db->query("SELECT * FROM notes WHERE userId = :id");
        // Bind Values
        $this->db->bind(':id', $id);
        // Return values
        $row = $this->db->resultSet();
        if ($this->db->rowCount() > 0) {
            return $row;
        }
    }

    //View single note
    public function getNote($id){
        // Query
        $this->db->query("SELECT * FROM notes WHERE id = :id");
        //Bind values
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        }else{
            return false;
        }
    }

    // Create new note
    public function create($data = array()){
        // Query
        $this->db->query("INSERT INTO notes (title, userId, note) VALUES (:title,:userId, :note)");
        // Bind data values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':userId', Session::get('userid'));
        $this->db->bind(':note', $data['note']);
        // Execute
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

    // Delete note
    public function delete($id){
        // Query
        $this->db->query("DELETE FROM notes WHERE id = :id");
        // Bind Values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

    // Edit note
    public function update($id, $data = array()){
        // Query
        $this->db->query("UPDATE notes SET title = :title, userId = :userId, note = :note WHERE id = :id");
        // Bind Values
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':userId', $data['userId']);
        $this->db->bind(':note', $data['note']);
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

    // Search for note
    public function search($query){
        // Query
        $this->db->query("SELECT * FROM notes");
        $row = $this->db->resultSet();
        if ($this->db->rowCount() > 0) {
            return $row;
        }else{
            return array();
        }
    }


}
