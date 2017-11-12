<?php

    class Posts extends CI_Controller {
        public function index($offset = 0)
        {
            $config['base_url'] = base_url().'posts/index/';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-link');
            $this->pagination->initialize($config);
            $data['title'] = 'All posts';
            $data['posts'] = $this->Post_model->get_posts(FALSE, $config['per_page'], $offset);
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }    
        
        public function view($id = null)
        {
            $data['post'] = $this->Post_model->get_posts($id);
            if (empty($data['post'])) {
                show_404();
            }
            $data['comments'] = $this->Comment_model->get_comments($id);
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        public function create(Type $var = null)
        {
            if(!$this->session->userdata('logged_in')){redirect('users/login');}
            $data['title'] = 'Create posts';
            $data['categories'] = $this->Category_model->get_categories();
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                $config['upload_path'] = './assets/images/posts';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '1000';
                $config['max_height'] = '1000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $errors = ['error' => $this->upload->display_errors()];
                    $post_img = 'noimage.jpg';
                } else {
                    $data = ['upload_data' => $this->upload->data()];
                    $post_img = $_FILES['userfile']['name'];
                }
                
                $this->Post_model->create_post($post_img);
                $this->session->set_flashdata('post_created', 'The post has been created');
                redirect('posts');
            }
        }

        public function delete($id)
        {
            if(!$this->session->userdata('logged_in')){redirect('users/login');}
            $this->Post_model->delete_post($id);
            $this->session->set_flashdata('post_delete', 'The post has been deleted');
            redirect('posts');
        }

        public function edit($id)
        {
            if(!$this->session->userdata('logged_in')){redirect('users/login');}
            $data['post'] = $this->Post_model->get_posts($id);
            if ($this->session->userdata('user_id') !=  $this->Post_model->get_posts($id)['user_id']) {
                redirect('posts');
            }
            $data['categories'] = $this->Category_model->get_categories();
            if (empty($data['post'])) {
                show_404();
            }
            $data['title'] = 'Edit posts';
            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update()
        {
            if(!$this->session->userdata('logged_in')){redirect('users/login');}
            $id = $this->input->post('id');
            $this->Post_model->update_post($id);
            $this->session->set_flashdata('post_updated', 'The post has been updated');
            redirect("posts/$id");
        }
    }
    