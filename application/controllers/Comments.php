<?php

    class Comments extends CI_Controller {

        public function index()
        {
            $data['title'] = 'All Categories';
            $data['categories'] = $this->Category_model->get_categories();
            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function create($post_id)
        {
            $data['title'] = 'Create Category';
            $id = $this->input->post('id');
            $data['post'] = $this->Post_model->get_posts($id);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('body', 'Body', 'required');
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('posts/view', $data);
                $this->load->view('templates/footer');
            } else {                
                $this->Comment_model->create_comment($post_id);
                redirect('posts/'.$id);
            }
        }

    }