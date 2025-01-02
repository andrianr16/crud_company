<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company_model extends CI_Model
{
    protected $table = 'tb_company';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_companies($limit = 10, $start = 0, $search = '')
    {
        if (!empty($search)) {
            $this->db->like('company_name', $search);
        }
        return $this->db->get($this->table, $limit, $start)->result();
    }

    // Fungsi untuk menghitung total data perusahaan
    public function count_all($search = '')
    {
        if (!empty($search)) {
            $this->db->like('company_name', $search);
        }
        return $this->db->count_all_results($this->table);
    }

    public function get_company_by_id($id)
    {
        return $this->db->get_where('tb_company', ['id_company' => $id])->row();
    }

    public function get_company_by_name($company_name)
    {
        return $this->db->get_where('tb_company', ['company_name' => $company_name])->row();
    }


    public function insert($data)
    {
        return $this->db->insert('tb_company', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_company', $id);
        return $this->db->update('tb_company', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_company', $id);
        return $this->db->delete('tb_company');
    }

    public function getCompanyByProvinsi()
    {
        $this->db->select('provinsi, COUNT(*) as total');
        $this->db->group_by('provinsi');
        $query = $this->db->get('tb_company');
        return $query->result(); // Mengembalikan data provinsi dengan total perusahaan
    }

    public function getCompanyByKota()
    {
        $this->db->select('kota, COUNT(*) as total');
        $this->db->group_by('kota');
        $query = $this->db->get('tb_company');
        return $query->result(); // Mengembalikan data kota dengan total perusahaan
    }

    public function check_login($company_name, $password)
    {
        $this->db->where('company_name', $company_name);
        $company = $this->db->get('tb_company')->row();

        if ($company && password_verify($password, $company->password)) {
            return $company;
        }

        return false;
    }
}
