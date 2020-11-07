<?php

class Main_controller extends CI_Controller
{

    //constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    //load index page
    public function index()
    {
        if (!empty($this->session->userdata['isLoggedIn'])) {
            redirect('dashboard');
        } else {
            $this->load->view('index_view');
        }
    }

    //goto homepage
    public function home()
    {
        redirect(base_url('index'));
    }

    //to load register page
    public function register()
    {
        if (!empty($this->session->userdata['isLoggedIn'])) {
            redirect('dashboard');
        } else {
            $this->load->view('register_view');
        }
    }

    //to load login page
    public function login()
    {
        if (!empty($this->session->userdata['isLoggedIn'])) {
            redirect('dashboard');
        } else {
            $this->load->view('login_view');
        }
    }

    //save user to the database
    public function saveUserToDB()
    {
        $this->form_validation->set_rules('full_name', 'Full Name: ', 'required');
        $this->form_validation->set_rules('username', 'Username: ', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'E-mail: ', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password: ', 'required');
        $this->form_validation->set_rules('gender', 'Gemder: ', 'required');


        //check if valid
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register_view');
        } else {
            //setting the file name for the database entry
            $profile = $_FILES['profile']['name'];
            if ($profile != '') {
                $profileExtention = @end(explode('.', $profile));
                $profileToLower = strtolower($profileExtention);
                $newProfileName = time() . '.' . $profileToLower;
                $profilePath = './upload/user' . $newProfileName;
                move_uploaded_file($_FILES['profile']['tmp_name'], $profilePath);
            } else {
                if ($this->input->post('gender') == 'Male') {
                    $newProfileName = 'avatar_male';
                } else if ($this->input->post('gender') == 'Female') {
                    $newProfileName = 'avatar_female';
                }
            }

            //save data to database
            $formArray = array();
            $formArray['full_name'] = $this->security->sanitize_filename($this->input->post('full_name'));
            $formArray['email'] = $this->security->sanitize_filename($this->input->post('email'));
            $formArray['username'] = $this->security->sanitize_filename($this->input->post('username'));
            $formArray['gender'] = $this->input->post('gender');
            $hashedPassword = $this->security->sanitize_filename($this->input->post('password'));
            $formArray['password'] = password_hash($hashedPassword, PASSWORD_DEFAULT);
            $formArray['profile'] = $newProfileName;
            $formArray['created_at'] = date('Y-m-d H:i:s');
            $formArray = $this->security->xss_clean($formArray);
            $this->Main_model->insertUserToDB($formArray);
        }

        // redirect to login after save
        redirect(base_url('login'));
    }


    //check the user credential for authorized login
    public function checkUserLogin()
    {

        if (!empty($this->session->userdata['isLoggedIn'])) {
            redirect('dashboard');
        } else {
            $this->form_validation->set_rules('username', 'Username: ', 'required');
            $this->form_validation->set_rules('password', 'Password: ', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login_view');
            } else {
                //getting the values of the input fields
                $login_username = $this->security->sanitize_filename($this->input->post('username'));
                $login_password = $this->security->sanitize_filename($this->input->post('password'));

                //check the user present in the database or not
                $returnedUser['user_id'] = $this->Main_model->checkUser($login_username);
                if (!empty($returnedUser['user_id'])) {
                    if (!empty(password_verify($login_password, $returnedUser['user_id']['password']))) {
                        $this->session->set_userdata('user_id', $returnedUser['user_id']['user_id']);
                        $this->session->set_userdata('isLoggedIn', true);
                        redirect('dashboard');
                    } else {
                        echo "<script>alert('Wrong Username or Password!!')</script>";
                        $this->load->view('login_view');
                    }
                }
            }
        }
    }


    //user dashboard
    public function dashboard()
    {
        if (!empty($this->session->userdata['isLoggedIn'])) {
            //getting userdata to display on the dashboard
            $returnedUserData['data'] = $this->Main_model->getUserData($this->session->userdata['user_id']);
            $this->load->view('dashboard_view', $returnedUserData);
        } else {
            redirect('login');
        }
    }


    //search and view all users
    public function searchUsers()
    {
        $returnedUsers['data'] =  $this->Main_model->getAllUsers();
        $this->load->view('searchUsers_view', $returnedUsers);
    }


    //user logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
