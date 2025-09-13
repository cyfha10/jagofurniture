<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Socialmedia extends CI_Controller
{
    private $table = 'tb_socialmedia';
    private $pk    = 'socialmedia_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('General_model', 'gm');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session']);
    }

    // LIST
    public function index()
    {
        $data['title'] = 'Social Media Management';
        $data['rows'] = $this->gm->get_one_sort($this->table, [], $this->pk, 'DESC');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('socialmedia/socialmedia', $data);
        $this->load->view('templates/footer');
    }

    // LIST + buka modal edit
    public function update($id)
    {
        $data['title'] = 'Social Media Management';
        $data['rows'] = $this->gm->get_one_sort($this->table, [], $this->pk, 'DESC');
        $data['row']  = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if (!$data['row']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('socialmedia');
            return;
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('socialmedia/socialmedia', $data);
        $this->load->view('templates/footer');
    }

    // CREATE (dipanggil dari modal Add)
    public function add()
    {
        if ($this->input->method() !== 'post') {
            redirect('socialmedia');
            return;
        }

        $name = $this->security->xss_clean($this->input->post('socialmedia_name', true));
        $link = $this->security->xss_clean($this->input->post('socialmedia_link', true));

        if ($this->gm->insert($this->table, [
            'socialmedia_name' => $name,
            'socialmedia_link' => $link
        ])) {
            $this->session->set_flashdata('success', 'Social media berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('socialmedia');
    }

    // UPDATE (dipanggil dari modal Edit)
    public function update_socialmedia($id)
    {
        if ($this->input->method() !== 'post') {
            redirect('socialmedia');
            return;
        }

        $row = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if (!$row) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('socialmedia');
            return;
        }

        $name = $this->security->xss_clean($this->input->post('socialmedia_name', true));
        $link = $this->security->xss_clean($this->input->post('socialmedia_link', true));

        if ($this->gm->update_where($this->table, [
            'socialmedia_name' => $name,
            'socialmedia_link' => $link
        ], [$this->pk => (int)$id])) {
            $this->session->set_flashdata('success', 'Social media berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data.');
        }
        redirect('socialmedia');
    }

    // DELETE
    public function delete($id)
    {
        $row = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if ($row) {
            $this->gm->delete($this->table, $this->pk, (int)$id);
            $this->session->set_flashdata('success', 'Social media terhapus.');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
        }
        redirect('socialmedia');
    }
}
