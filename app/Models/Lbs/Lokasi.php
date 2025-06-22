<?php

namespace App\Models\Lbs;

use CodeIgniter\Model;

class Lokasi extends Model {

    protected $table = 'tb_lokasi';
    protected $allowedFields = ['desa_id','pemilik_id','nama','alamat','data_lokasi'];

}