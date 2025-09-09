<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Header extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model'); // Load model general_model
    }

    // Menampilkan semua data header
    public function index()
    {
        $data['headers'] = $this->general_model->get_all_headers(); // Ambil semua data header
        $this->load->view('templates/header');
        $this->load->view('header/index', $data);  // Menampilkan daftar header
        $this->load->view('templates/footer');
    }

    // Menampilkan form untuk menambahkan header
    public function add()
    {
        $this->load->view('templates/header');
        $this->load->view('header/add'); // Form untuk menambah header
        $this->load->view('templates/footer');
    }

    // Proses menyimpan header
    public function store()
    {
        $data = [
            'slug' => $this->input->post('slug'),
            'header_page' => $this->input->post('header_page'),
            'header_logo' => $this->input->post('header_logo'), // Jika logo diupload, sesuaikan
            'header_tittle' => $this->input->post('header_tittle'),
            'header_description' => $this->input->post('header_description'),
            'header_keywords' => $this->input->post('header_keywords')
        ];

        $this->general_model->insert_header($data); // Insert data header
        redirect('header'); // Redirect ke halaman daftar header
    }

    // Menampilkan form untuk mengedit header
    public function edit($id)
    {
        $data['header'] = $this->general_model->get_header_by_id($id); // Ambil data header berdasarkan ID
        if (!$data['header']) {
            show_404(); // Jika data tidak ditemukan, tampilkan halaman 404
        }

        $this->load->view('templates/header');
        $this->load->view('header/edit', $data);  // Form untuk mengedit header
        $this->load->view('templates/footer');
    }

    // Proses memperbarui data header
    public function update($id)
    {
        $data = [
            'slug' => $this->input->post('slug'),
            'header_page' => $this->input->post('header_page'),
            'header_logo' => $this->input->post('header_logo'), // Jika logo diupload, sesuaikan
            'header_tittle' => $this->input->post('header_tittle'),
            'header_description' => $this->input->post('header_description'),
            'header_keywords' => $this->input->post('header_keywords')
        ];

        $this->general_model->update_header($id, $data); // Update data header
        redirect('header'); // Kembali ke halaman daftar header setelah update
    }

    // Hapus header
    public function delete($id)
    {
        $this->general_model->delete_header($id); // Hapus header berdasarkan ID
        redirect('header'); // Kembali ke halaman daftar header setelah dihapus
    }
}
