<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
    private $table = 'tb_testimoni';
    private $pk    = 'testimoni_id';
    private $upload_path = 'assets/images/testimoni/';

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

    // ===== READ LIST =====
    public function index()
    {
        $data['title'] = 'Testimoni Management';
        // Ambil semua testimoni (desc by id)
        $data['testimonis'] = $this->gm->get_one_sort($this->table, [], $this->pk, 'DESC');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('testimoni/testimoni', $data);
        $this->load->view('templates/footer');
    }

    // Buka list + modal edit untuk id tertentu
    public function update($id)
    {
        $data['title'] = 'Testimoni Management';
        $data['testimonis'] = $this->gm->get_one_sort($this->table, [], $this->pk, 'DESC');
        $data['testimoni']  = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if (!$data['testimoni']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('testimoni');
            return;
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('testimoni/testimoni', $data);
        $this->load->view('templates/footer');
    }

    // ===== CREATE =====
    public function add()
    {
        if ($this->input->method() !== 'post') {
            redirect('testimoni');
            return;
        }

        $rate  = $this->security->xss_clean($this->input->post('testimoni_rate', true));
        $desc  = $this->security->xss_clean($this->input->post('testimoni_desc', true));
        $name  = $this->security->xss_clean($this->input->post('testimoni_name', true));
        $place = $this->security->xss_clean($this->input->post('testimoni_place', true));

        // upload (opsional)
        $image_name = '';
        if (!empty($_FILES['image']['name'])) {
            $up = $this->_do_upload('image');
            if ($up['status']) $image_name = $up['file'];
            else {
                $this->session->set_flashdata('error', $up['error']);
                redirect('testimoni');
                return;
            }
        }

        $insert = [
            'testimoni_images' => $image_name,
            'testimoni_rate'   => $rate,
            'testimoni_desc'   => $desc,
            'testimoni_name'   => $name,
            'testimoni_place'  => $place,
        ];

        if ($this->gm->insert($this->table, $insert)) {
            $this->session->set_flashdata('success', 'Testimoni berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('testimoni');
    }

    // ===== UPDATE =====
    public function update_testimoni($id)
    {
        if ($this->input->method() !== 'post') {
            redirect('testimoni');
            return;
        }

        $row = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if (!$row) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('testimoni');
            return;
        }

        $rate  = $this->security->xss_clean($this->input->post('testimoni_rate', true));
        $desc  = $this->security->xss_clean($this->input->post('testimoni_desc', true));
        $name  = $this->security->xss_clean($this->input->post('testimoni_name', true));
        $place = $this->security->xss_clean($this->input->post('testimoni_place', true));
        $existing_image = $this->security->xss_clean($this->input->post('existing_image', true));

        $image_name = $existing_image;

        if (!empty($_FILES['image']['name'])) {
            $up = $this->_do_upload('image');
            if ($up['status']) {
                $image_name = $up['file'];
                // hapus lama
                if (!empty($existing_image) && file_exists(FCPATH . $this->upload_path . $existing_image)) {
                    @unlink(FCPATH . $this->upload_path . $existing_image);
                }
            } else {
                $this->session->set_flashdata('error', $up['error']);
                redirect('testimoni/update/' . $id);
                return;
            }
        }

        $update = [
            'testimoni_images' => $image_name,
            'testimoni_rate'   => $rate,
            'testimoni_desc'   => $desc,
            'testimoni_name'   => $name,
            'testimoni_place'  => $place,
        ];

        // gunakan update_where dari General_model
        if ($this->gm->update_where($this->table, $update, [$this->pk => (int)$id])) {
            $this->session->set_flashdata('success', 'Testimoni berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data.');
        }
        redirect('testimoni');
    }

    // ===== DELETE =====
    public function delete($id)
    {
        $row = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if ($row) {
            if (!empty($row->testimoni_images) && file_exists(FCPATH . $this->upload_path . $row->testimoni_images)) {
                @unlink(FCPATH . $this->upload_path . $row->testimoni_images);
            }
            $this->gm->delete($this->table, $this->pk, (int)$id);
            $this->session->set_flashdata('success', 'Testimoni terhapus.');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
        }
        redirect('testimoni');
    }

    // ===== Helper Upload =====
    private function _do_upload($field)
    {
        $config = [
            'upload_path'   => FCPATH . $this->upload_path,
            'allowed_types' => 'gif|jpg|jpeg|png|webp',
            'max_size'      => 2048, // KB
            'encrypt_name'  => true,
        ];
        $this->upload->initialize($config);
        if ($this->upload->do_upload($field)) {
            return ['status' => true, 'file' => $this->upload->data('file_name')];
        }
        return ['status' => false, 'error' => $this->upload->display_errors('', '')];
    }
}
