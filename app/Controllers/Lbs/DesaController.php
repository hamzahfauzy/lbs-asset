<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\Lbs\Desa;
use App\Libraries\Page;

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
            'lat' => [
                'label' => 'Latitute'
            ],
            'lng' => [
                'label' => 'Longitude'
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
            'lat' => [
                'label' => 'Latitute',
                'type' => 'text',
            ],
            'lng' => [
                'label' => 'Longitude',
                'type' => 'text',
            ],
        ];
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

        return $page->render('lbs/desa/form', [
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

        return $page->render('lbs/desa/form', [
            'data' => $data,
            'fields' => $this->fields()
        ]);
    }

}