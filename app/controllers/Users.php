<?php

class Users extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model("User");
        $this->noteModel = $this->model("Note");
    }

    public function register()
    {
        //Check for post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Process form

            //Init data
            $data = [
                'firstname' => Sanitize::flush(Input::get('firstname')),
                'lastname' => Sanitize::flush(Input::get('lastname')),
                'email' => Sanitize::flush(Input::get('email')),
                'password' => Sanitize::flush(Input::get('password')),
                'confirm_password' => Sanitize::flush(Input::get('confirm_password')),
                'firstname_err' => '',
                'lastname_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if ($this->userModel->findUser($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate Name
            if (empty($data['firstname'])) {
                $data['firstname_err'] = 'Please enter your firstname';
            }
            if (empty($data['lastname'])) {
                $data['lastname_err'] = 'Please enter your lastname';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate password confirmation
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } elseif ($data['password'] !== $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated
                // Hash password
                $data['password'] = Hash::make($data['password']);
                // Register User
                if ($this->userModel->register($data)) {
                    Session::flash('Register_Success', 'You are registered and can now log in!');
                    Redirect::to('users/login');
                } else {
                    Session::flash('status', 'Oops! Something went wrong!');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }
        } else {
            //Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //Load view
            $this->view('users/register', $data);
        }
    }


    public function login()
    {
        //Check for post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Process form

            //Init data
            $data = [
                'email' => Sanitize::flush(Input::get('email')),
                'password' => Sanitize::flush(Input::get('password')),
                'email_err' => '',
                'password_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter your password';
            }

           // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                if ($this->userModel->findUser($data['email'])) {
                    // Attempt to log user in
                    if ($this->userModel->login($data['email'], $data['password'])) {
                        Session::put('userid', $this->userModel->user()->id);
                        Session::put('firstname', $this->userModel->user()->firstname);
                        Redirect::to('notes');
                    }else{
                        // Set password error index
                        $data['password_err'] = 'Password incorrect';
                        // Load view with errors
                        $this->view('users/login', $data);
                    }
                }else{
                    // Set email error index
                    $data['email_err'] = 'User does not exist';
                    // Load view with errors
                    $this->view('users/login', $data);
                }
            }else{
                //Load view with errors
                $this->view('users/login', $data);
             }
        }else{

            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            $this->view('users/login', $data);
        }
    }



    public function logout()
    {
        Session::delete('userId');
        Session::delete('userEmail');
        Session::delete('username');
        Session::destroy();
        Redirect::to('users/login');
    }

    public function isLoggedIn()
    {
        if (Session::exists('userId')) {
            return true;
        } else {
            return false;
        }
    }
}
