<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\Lbs\Desa;

class DesaController extends CrudController {

    protected $model = Desa::class;

    protected function getTitle()
    {
        return 'Desa';
    }

    protected function getSlug()
    {
        return 'desa';
    }

    protected function columns()
    {
        return [
            'nama' => [
                'label' => 'Nama'
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
                'type' => 'text',
            ],
        ];
    }

}