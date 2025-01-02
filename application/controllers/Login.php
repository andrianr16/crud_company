<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function authenticate()
    {
        $company_name = $this->input->post('company_name');
        $password = $this->input->post('password');

        $company = $this->Company_model->check_login($company_name, $password);

        if ($company) {
            $this->session->set_userdata([
                'company_name' => $company->company_name,
                'logged_in' => true,
            ]);
            redirect('admin/Dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login gagal! Periksa kembali nama perusahaan atau kata sandi Anda.</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['company_name', 'logged_in']);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah logout.</div>');
        redirect('login');
    }
}
