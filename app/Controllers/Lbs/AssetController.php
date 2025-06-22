<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\Lbs\Desa;
use App\Models\Lbs\Lokasi;
use App\Models\Lbs\Pemilik;

class AssetController extends CrudController {

    protected $model = Lokasi::class;

    protected function getTitle()
    {
        return 'Asset';
    }

    protected function getSlug()
    {
        return 'aset';
    }

    protected function columns()
    {
        return [
            'nama_desa' => [
                'label' => 'Desa'
            ],
            'nama_pemilik' => [
                'label' => 'Pemilik'
            ],
            'alamat' => [
                'label' => 'Alamat'
            ],
        ];
    }

    protected function details()
    {
        return [];
    }

    protected function fields()
    {
        $desa = (new Desa())->findAll();
        $desaOptions = [0 => 'Pilih Desa'];
        foreach($desa as $item)
        {
            $desaOptions[$item['id']] = $item['nama'];
        }
        
        $pemilik = (new Pemilik)->findAll();
        $pemilikOptions = [0 => 'Pilih Pemilik'];
        foreach($pemilik as $item)
        {
            $pemilikOptions[$item['id']] = $item['nama'];
        }

        return [
            'desa_id' => [
                'label' => 'Desa',
                'type' => 'select',
                'options' => $desaOptions
            ],
            'pemilik_id' => [
                'label' => 'Pemilik',
                'type' => 'select',
                'options' => $pemilikOptions
            ],
            'alamat' => [
                'label' => 'Alamat',
                'type' => 'textarea',
            ],
            'data_lokasi' => [
                'label' => 'Data Lokasi',
                'type' => 'textarea',
            ],
        ];
    }

    protected function getModel()
    {
        $model = new $this->model;
        $model->select('tb_lokasi.*, tb_desa.nama nama_desa, tb_pemilik.nama nama_pemilik')
            ->join('tb_desa', 'tb_desa.id=tb_lokasi.desa_id')
            ->join('tb_pemilik', 'tb_pemilik.id=tb_lokasi.pemilik_id')
            ;
        return $model;
    }

}