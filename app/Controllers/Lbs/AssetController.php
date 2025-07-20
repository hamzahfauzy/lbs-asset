<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\Lbs\Desa;
use App\Models\Lbs\Lokasi;
use App\Models\Lbs\Pemilik;
use App\Libraries\Page;

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
            'nama' => [
                'label' => 'Nama Aset'
            ],
            'nama_pemilik' => [
                'label' => 'Pemilik'
            ],
            'alamat' => [
                'label' => 'Alamat'
            ],
            'jenis' => [
                'label' => 'Jenis'
            ],
            'status' => [
                'label' => 'Status'
            ],
        ];
    }

    protected function details()
    {
        return [];
    }

    protected function detailButton($data)
    {
        $role = session()->get('role');
        if($role == 'Camat' && $data['status'] == 'PENGAJUAN')
        {
            return '<a href="/asset/verifikasi/'.$data['id'].'" class="btn btn-info">Verifikasi</a>';
        }
        return '';
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
            'nama' => [
                'label' => 'Nama Aset',
                'type' => 'text',
            ],
            'alamat' => [
                'label' => 'Alamat',
                'type' => 'textarea',
            ],
            'jenis' => [
                'label' => 'Jenis',
                'type' => 'text',
            ],
            'gambar' => [
                'label' => 'Gambar',
                'type' => 'file',
            ],
            'data_lokasi' => [
                'label' => 'Data Lokasi',
                'type' => 'textarea',
            ],
        ];
    }

    protected function beforeInsert($data)
    {
        $img = $this->request->getFile('gambar');

        if ($img && ! $img->hasMoved()) {
            $data['gambar'] = 'uploads/' . $img->store();
        }

        return $data;
    }
    
    protected function beforeUpdate($data)
    {
        $img = $this->request->getFile('gambar');

        if ($img && ! $img->hasMoved()) {
            $data['gambar'] = 'uploads/' . $img->store();
        }

        return $data;
    }

    public function create()
    {
        $page = new Page;
        $page->setTitle('Tambah ' . $this->getTitle());
        $page->setSlug($this->getSlug());
        $page->setBreadcrumbs([
            [
                'label' => $this->getTitle(),
                'url' => '/'.$this->getSlug()
            ],
            [
                'label' => 'Tambah Data',
                'url' => false
            ],
        ]);

        return $page->render('lbs/asset/form', [
            'data' => [],
            'fields' => $this->fields(),
            'columns' => $this->columns()
        ]);
    }

    public function edit($id)
    {
        $data = $this->getModel()->find($id);

        $this->record = $data;

        $page = new Page;
        $page->setTitle('Edit ' . $this->getTitle());
        $page->setSlug($this->getSlug());
        $page->setBreadcrumbs([
            [
                'label' => $this->getTitle(),
                'url' => '/'.$this->getSlug()
            ],
            [
                'label' => 'Edit Data',
                'url' => false
            ],
            [
                'label' => $id,
                'url' => false
            ],
        ]);

        return $page->render('lbs/asset/form', [
            'data' => $data,
            'fields' => $this->fields()
        ]);
    }

    protected function getModel()
    {
        $model = new $this->model;
        $model->select('tb_lokasi.*, tb_desa.nama nama_desa, tb_pemilik.nama nama_pemilik')
            ->join('tb_desa', 'tb_desa.id=tb_lokasi.desa_id','left')
            ->join('tb_pemilik', 'tb_pemilik.id=tb_lokasi.pemilik_id','left')
            ;
        return $model;
    }

    function getDetail($id)
    {
        $data = $this->getModel()->where('tb_lokasi.id', $id)->first();

        echo json_encode([
            'status' => 'success',
            'data' => $data
        ]);
        die;
    }

    function search()
    {
        $desa = $_GET['desa'];
        $data = $this->getModel()->where('tb_lokasi.desa_id', $desa)->findAll();

        echo json_encode([
            'status' => 'success',
            'data' => $data
        ]);
        die;
    }

    function verifikasi($id)
    {
        (new Lokasi)->update($id, [
            'status' => 'TERVERIFIKASI'
        ]);

        return redirect()->to('/aset');
    }

}