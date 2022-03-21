<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Upload extends Model
{
    public function get_upload()
    {
        return $this->db->table('upload')->get()->getResultArray();
    }

    public function save_submission($data)
    {
        return $this->db->table('upload')->insert($data);
    }
}
