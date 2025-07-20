<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\User;

class PenggunaController extends CrudController {

    protected $model = User::class;

    protected function getTitle()
    {
        return 'Pengguna';
    }

    protected function getSlug()
    {
        return 'pengguna';
    }

    protected function columns()
    {
        return [
            'email' => [
                'label' => 'NIK'
            ],
            'name' => [
                'label' => 'Nama'
            ],
            'role' => [
                'label' => 'Peran'
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
            'name' => [
                'label' => 'Nama',
                'type' => 'text'
            ],
            'email' => [
                'label' => 'NIK',
                'type' => 'text'
            ],
            'password' => [
                'label' => 'Password',
                'type' => 'password',
                'value' => ''
            ],
            'role' => [
                'label' => 'Peran',
                'type' => 'select',
                'options' => [
                    'Penduduk' => 'Penduduk',
                    'Admin' => 'Admin',
                    'Camat' => 'Camat',
                ]
            ],
        ];
    }

    public function beforeInsert($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $data;
    }
    
    public function beforeUpdate($data)
    {
        if(!empty($data['password']))
        {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        else
        {
            unset($data['password']);
        }

        return $data;
    }

}