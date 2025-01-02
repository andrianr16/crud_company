<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SeedData extends CI_Controller
{
    public function seed_companies()
    {
        $data = [
            [
                'company_name' => 'Company A',
                'kota' => 'Jakarta',
                'provinsi' => 'DKI Jakarta',
                'address' => 'Jl. Sudirman No.1',
                'industry' => 'Teknologi',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'createby' => 'admin',
                'createdate' => date('Y-m-d H:i:s'),
            ],
            [
                'company_name' => 'Company B',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'address' => 'Jl. Asia Afrika No.15',
                'industry' => 'Manufaktur',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'createby' => 'admin',
                'createdate' => date('Y-m-d H:i:s'),
            ]
        ];

        foreach ($data as $row) {
            $this->db->insert('tb_company', $row);
        }

        echo "Data awal berhasil dimasukkan.";
    }
}
