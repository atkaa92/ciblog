<?php
    class Post_model extends CI_Model 
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_posts($id = false, $limit = false, $offset = false)
        {
            if ($limit) {
                $this->db->limit($limit, $offset);
            }
            if ($id === false) {
                $this->db->select('*, posts.id AS iid');
                $this->db->order_by('posts.id', 'DESC');
                $this->db->join('categories', 'categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            $query = $this->db->get_where('posts',['id' => $id ]);
            return $query->row_array();
        }

        public function create_post($post_img)
        {
            $slug = url_title($this->input->post('title'));
            $data = [
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
                'postimage' => $post_img,
                'user_id' => $this->session->userdata('user_id')
            ];
            return $this->db->insert('posts', $data);
        }

        public function delete_post($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }

        public function update_post($id)
        {
            $slug = url_title($this->input->post('title'));
            $data = [
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            ];
            $this->db->where('id', $id);
            return $this->db->update('posts', $data);
        }

        public function get_posts_by_category($id)
        {
            $this->db->select('*, posts.id AS iid');
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get_where('posts', ['categories.id' => $id]);
            return $query->result_array();
        }
    }