<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\Lbs\Pemilik;

class PemilikController extends CrudController {

    protected $model = Pemilik::class;

    protected function getTitle()
    {
        return 'Pemilik';
    }

    protected function getSlug()
    {
        return 'pemilik';
    }

    protected function columns()
    {
        return [
            'nama' => [
                'label' => 'Nama'
            ],
            'alamat' => [
                'label' => 'Alamat'
            ],
            'no_hp' => [
                'label' => 'No HP'
            ],
        ];
    }

    protected function details()
    {
        return [];
    }

    protected function fields()
    {
        return [
            'nama' => [
                'label' => 'Nama',
                'type' => 'text'
            ],
            'alamat' => [
                'label' => 'Alamat',
                'type' => 'textarea'
            ],
            'no_hp' => [
                'label' => 'No. HP',
                'type' => 'text'
            ],
        ];
    }

}