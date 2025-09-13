<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to the login page
            redirect('login');
        }
        $this->load->model('General_model');
        $this->load->library('upload');
    }

    // Display all blogs
    public function index()
    {
        $data['blogs'] = $this->General_model->get('tb_blog');
        $data['title'] = 'Blog Management';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('blogs/blogs', $data);
        $this->load->view('templates/footer');
    }

    // Add a new blog (AJAX)
    public function add()
    {
        if ($this->input->is_ajax_request()) {
            // Image upload configuration
            $config['upload_path'] = './assets/images/blog/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $this->upload->initialize($config);

            // Handle Thumbnail Upload
            $thumbnail = '';
            if ($this->upload->do_upload('blog_img_thumbnails')) {
                $thumbnail_data = $this->upload->data();
                $thumbnail = $thumbnail_data['file_name'];
            }

            // Handle Header Image Upload
            $header = '';
            if ($this->upload->do_upload('blog_img_header')) {
                $header_data = $this->upload->data();
                $header = $header_data['file_name'];
            }

            // Insert data into the database
            $data = array(
                'blog_slug' => $this->input->post('blog_slug'),
                'blog_date' => $this->input->post('blog_date'),
                'blog_tittle' => $this->input->post('blog_tittle'),
                'blog_img_thumbnails' => $thumbnail,
                'blog_img_header' => $header,
                'blog_short' => $this->input->post('blog_short'),
                'blog_desc' => $this->input->post('blog_desc'),
                'blog_created' => date('Y-m-d H:i:s'),
            );
            $this->General_model->insert('tb_blog', $data);

            echo json_encode(['status' => 'success', 'message' => 'Blog added successfully']);
        } else {
            // Fallback for non-AJAX requests (if needed)
            redirect('blogs');
        }
    }

    // Edit a blog (AJAX)
    public function edit($blog_id)
    {
        if ($this->input->is_ajax_request()) {
            // Image upload configuration
            $config['upload_path'] = './assets/images/blog/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $this->upload->initialize($config);

            $data['blog'] = $this->General_model->get_where_one('tb_blog', 'blog_id', $blog_id);

            // Handle Thumbnail Upload (if any)
            $thumbnail = $data['blog']->blog_img_thumbnails; // retain the existing thumbnail if not uploaded
            if ($this->upload->do_upload('blog_img_thumbnails')) {
                $thumbnail_data = $this->upload->data();
                $thumbnail = $thumbnail_data['file_name'];
            }

            // Handle Header Image Upload (if any)
            $header = $data['blog']->blog_img_header; // retain the existing header image if not uploaded
            if ($this->upload->do_upload('blog_img_header')) {
                $header_data = $this->upload->data();
                $header = $header_data['file_name'];
            }

            // Update data in the database
            $update_data = array(
                'blog_slug' => $this->input->post('blog_slug'),
                'blog_date' => $this->input->post('blog_date'),
                'blog_tittle' => $this->input->post('blog_tittle'),
                'blog_img_thumbnails' => $thumbnail,
                'blog_img_header' => $header,
                'blog_short' => $this->input->post('blog_short'),
                'blog_desc' => $this->input->post('blog_desc'),
                'blog_created' => date('Y-m-d H:i:s'),
            );
            $this->General_model->update('tb_blog', $update_data, 'blog_id', $blog_id);

            echo json_encode(['status' => 'success', 'message' => 'Blog updated successfully']);
        } else {
            // Fallback for non-AJAX requests (if needed)
            redirect('blogs');
        }
    }

    // Delete a blog
    public function delete($blog_id)
    {
        $this->General_model->delete('tb_blog', 'blog_id', $blog_id);
        $this->session->set_flashdata('success', 'Blog deleted successfully');
        redirect('blogs');
    }
}
