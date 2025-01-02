<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('company_name'))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silakan login untuk mengakses dashboard!</div>');
            redirect('login');
        }
        $this->load->model('Company_model');

        $this->load->library('pagination');

        $this->load->library('form_validation');
    }


    public function index()
    {
        // Ambil kata kunci pencarian
        $search_keyword = $this->input->get('search');

        // Pagination Configuration
        $config['base_url'] = base_url('admin/dashboard/index');
        $config['total_rows'] = $this->Company_model->count_all($search_keyword);  // Pastikan menggunakan count_all dari model yang sudah diperbarui
        $config['per_page'] = 10;  // Set jumlah data per halaman
        $config['uri_segment'] = 4;

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get data perusahaan dengan limit dan offset untuk pagination
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $companies = $this->Company_model->get_all_companies($config['per_page'], $page, $search_keyword);

        // Data untuk dikirim ke view
        $data = array(
            'title' => 'Dashboard - Manajemen Perusahaan',
            'page' => 'admin/dashboard',
            'companies' => $companies,
            'search_keyword' => $search_keyword,  // Kirim keyword pencarian
            'pagination' => $this->pagination->create_links()  // Pagination links
        );

        // Load view dengan data
        $this->load->view('admin/template/main', $data);
    }



    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Perusahaan',
            'page' => 'admin/add_company'
        );

        $this->load->view('admin/template/main', $data);
    }

    public function edit($id)
    {
        $company = $this->Company_model->get_company_by_id($id);

        if ($company) {
            $data = array(
                'title' => 'Edit Data Perusahaan',
                'page' => 'admin/edit_company',
                'company' => $company
            );

            $this->load->view('admin/template/main', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data tidak ditemukan!</div>');
            redirect('Dashboard');
        }
    }


    public function addData()
    {
        if ($this->input->post()) {
            $post = $this->input->post();

            // Mengatur data untuk disimpan, termasuk password yang di-hash dan createby yang otomatis
            $data = array(
                'company_name' => $post['company_name'],
                'kota' => $post['kota'],
                'provinsi' => $post['provinsi'],
                'address' => $post['address'],
                'industry' => $post['industry'],
                'password' => password_hash('password123', PASSWORD_BCRYPT), // Menambahkan password default yang di-hash
                'createby' => $this->session->userdata('company_name'),  // Nilai 'createby' otomatis diisi 'admin'
                'createdate' => date('Y-m-d H:i:s')
            );

            if ($this->Company_model->insert($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
                redirect('admin/Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan!</div>');
                redirect('admin/Dashboard/add');
            }
        } else {
            redirect('admin/Dashboard/add');
        }
    }


    public function updateData($id_company)
    {
        if ($this->input->post()) {
            $post = $this->input->post();

            // Mengambil data untuk diupdate
            $data = array(
                'company_name' => $post['company_name'],
                'industry' => $post['industry'],
                'provinsi' => $post['provinsi'],
                'kota' => $post['kota'],
                'address' => $post['address'],
                'updateby' => $this->session->userdata('company_name'), // Menggunakan company_name yang login
                'updatetime' => date('Y-m-d H:i:s')
            );

            // Memanggil model untuk update data
            if ($this->Company_model->update($id_company, $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data perusahaan berhasil diperbarui!</div>');
                redirect('admin/Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal memperbarui data perusahaan!</div>');
                redirect('admin/Dashboard/edit/' . $id_company);
            }
        } else {
            redirect('admin/Dashboard');
        }
    }



    public function delete($id)
    {
        if ($this->Company_model->delete($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
        }
        redirect('admin/Dashboard');
    }

    public function laporan_company()
    {
        // Mengambil data dari model untuk Provinsi dan Kota
        $data['provinsi_data'] = $this->Company_model->getCompanyByProvinsi();
        $data['kota_data'] = $this->Company_model->getCompanyByKota();

        $data['page'] = 'admin/laporan_company';

        // Mengirim data ke view
        $this->load->view('admin/template/main', $data);
    }
}
