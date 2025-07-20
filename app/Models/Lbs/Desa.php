<?php

namespace App\Models\Lbs;

use CodeIgniter\Model;

class Desa extends Model {

    protected $table = 'tb_desa';
    protected $allowedFields = ['nama','lat','lng'];

}