<?php


class User
{
    private $data;
    private $user;

    public function __construct()
    {
        $this->data = new Database;
    }

    // RegisterUser
    public function register($data = array())
    {
        $this->data->query("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
        // Bind Values
        $this->data->bind(':firstname', $data['firstname']);
        $this->data->bind(':lastname', $data['lastname']);
        $this->data->bind(':email', $data['email']);
        $this->data->bind(':password', $data['password']);
        // Execute
        if ($this->data->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login User
    public function login($email, $password)
    {
        $this->data->query("SELECT * FROM users WHERE email = :email");
        $this->data->bind(':email', $email);
        $this->user = $this->data->single();
        $DBpassword = $this->user->password;
        if (Hash::check($password, $DBpassword)) {
             return true;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUser($email)
    {
        $this->data->query("SELECT * FROM users WHERE email = :email");
        $this->data->bind(':email', $email);
        $row = $this->data->single();
        // Check row
        if ($this->data->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Return user data
    public function user(){
        return $this->user;
    }

    
}
