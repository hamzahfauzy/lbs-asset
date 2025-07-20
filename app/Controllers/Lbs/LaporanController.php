<?php

namespace App\Controllers\Lbs;

use App\Libraries\Page;
use App\Controllers\BaseController;

class LaporanController extends BaseController {

    function index(){
        $pemilik = (new \App\Models\Lbs\Pemilik)->countAll();
        $asset = (new \App\Models\Lbs\Lokasi)->countAll();
        $assetTerverifikasi = (new \App\Models\Lbs\Lokasi)->where('status','TERVERIFIKASI')->countAllResults();

        $assets = (new \App\Models\Lbs\Lokasi)->select('tb_lokasi.*, tb_desa.nama nama_desa, tb_pemilik.nama nama_pemilik')
            ->join('tb_desa', 'tb_desa.id=tb_lokasi.desa_id','left')
            ->join('tb_pemilik', 'tb_pemilik.id=tb_lokasi.pemilik_id','left')->findAll();

        $page = new Page;
        $page->setTitle('Laporan');
        $page->setBreadcrumbs([
            [
                'label' => 'Laporan',
                'url' => false
            ]
        ]);

        return $page->render('lbs/laporan', [
            'pemilik' => $pemilik,
            'asset' => $asset,
            'assetTerverifikasi' => $assetTerverifikasi,
            'assets' => $assets,
        ]);
    }

}