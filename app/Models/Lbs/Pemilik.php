<?php

namespace App\Models\Lbs;

use CodeIgniter\Model;

class Pemilik extends Model {

    protected $table = 'tb_pemilik';
    protected $allowedFields = ['nama','alamat','no_hp'];

}