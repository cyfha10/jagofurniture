<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    private $table = 'tb_about';
    private $pk    = 'about_id';
    private $upload_path = 'assets/images/'; // ganti sesuai struktur proyekmu

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('General_model', 'gm');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'upload']);
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to the login page
            redirect('login');
        }

        if (!is_dir(FCPATH . $this->upload_path)) {
            @mkdir(FCPATH . $this->upload_path, 0755, true);
        }
    }

    // View About data
    public function index()
    {
        // Get the first (or only) record of the 'tb_about' table
        $data['about'] = $this->gm->get('tb_about');
        $data['title'] = 'About Management';
        $data['about_row'] = $this->gm->get_where_one($this->table, $this->pk, (int)1);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('about/about', $data);
        $this->load->view('templates/footer');
    }

    // Update About Data
    public function update()
    {
        // Check if form is submitted
        if ($this->input->post()) {
            // Validate form fields here if necessary
            $this->form_validation->set_rules('about_tittle', 'About Tittle', 'required');
            $this->form_validation->set_rules('about_sub', 'About Sub', 'required');
            $this->form_validation->set_rules('about_desc_1', 'Description 1', 'required');
            // Add other validation rules here as needed

            if ($this->form_validation->run() == FALSE) {
                // If validation fails, reload the page with validation errors
                $this->index();
            } else {
                // Handle image upload
                $data = array(
                    'about_tittle' => $this->input->post('about_tittle'),
                    'about_sub' => $this->input->post('about_sub'),
                    'about_desc_1' => $this->input->post('about_desc_1'),
                    'about_desc_2' => $this->input->post('about_desc_2'),
                    'about_desc_3' => $this->input->post('about_desc_3'),
                    'about_alamat' => $this->input->post('about_alamat'),
                    'about_whatsapp' => $this->input->post('about_whatsapp'),
                    'about_desc_footer' => $this->input->post('about_desc_footer')
                );

                // Handle image uploads
                if ($_FILES['about_img_header']['name']) {
                    $config['upload_path'] = FCPATH . $this->upload_path;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = 2048; // 2MB

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('about_img_header')) {
                        $upload_data = $this->upload->data();
                        $data['about_img_header'] = $this->upload_path . $upload_data['file_name'];
                    } else {
                        // Handle image upload error
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }

                if ($_FILES['about_img_1']['name']) {
                    $config['upload_path'] = FCPATH . $this->upload_path;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = 2048; // 2MB

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('about_img_1')) {
                        $upload_data = $this->upload->data();
                        $data['about_img_1'] = $this->upload_path . $upload_data['file_name'];
                    }
                }

                if ($_FILES['about_img_2']['name']) {
                    $config['upload_path'] = FCPATH . $this->upload_path;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = 2048; // 2MB

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('about_img_2')) {
                        $upload_data = $this->upload->data();
                        $data['about_img_2'] = $this->upload_path . $upload_data['file_name'];
                    }
                }

                $about_id = $this->input->post('about_id');
                $where = array('about_id' => $about_id);
                $updated = $this->gm->update('tb_about', $data, 'about_id', $about_id);

                if ($updated) {
                    // Redirect to the About page or show a success message
                    redirect('about');
                } else {
                    // Handle update failure
                    $this->session->set_flashdata('error', 'Failed to update about information.');
                    $this->index();
                }
            }
        }
    }
}
