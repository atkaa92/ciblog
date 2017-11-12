<?php

    class Users extends CI_Controller {

        public function register()
        {
            $data['title'] = 'Sign up';
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('password2', 'Confirm Password','matches[password]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            } else {     
                $md5_password = md5($this->input->post('password'));
                $this->User_model->register($md5_password);
                $this->session->set_flashdata('user_registered', 'You are now registered');
                redirect('users/login');
            }
        }

        public function check_username_exists($username)
        {
            $this->form_validation->set_message('check_username_exists', 'The Username is taken.');
            if ($this->User_model->check_username_exists($username)) {
                return true;
            }else{
                return false;
            }
        }

        public function check_email_exists($email)
        {
            $this->form_validation->set_message('check_email_exists', 'The Email is taken.');
            if ($this->User_model->check_email_exists($email)) {
                return true;
            }else{
                return false;
            }
        }

        public function login()
        {
            $data['title'] = 'Log In';
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            } else {
                $username = $this->input->post('username');     
                $md5_password = md5($this->input->post('password'));
                $user_id = $this->User_model->login($username, $md5_password);
                if ($user_id) {
                    $user_data =[
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    ];
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_logedin', 'You are now Loged In.');
                redirect('posts');
                } else {
                    $this->session->set_flashdata('user_loginfaild', 'Loged In failed.');
                    redirect('users/login');
                }
            }
        }

        public function logout()
        {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('user_id');
            $this->session->set_flashdata('logout_done', 'You are now loged out.');
            redirect('users/login');
        }
    }