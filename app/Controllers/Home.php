<?php

namespace App\Controllers;

use App\Libraries\Page;
use App\Models\Lbs\Lokasi;
use App\Models\Lbs\Pemilik;
use App\Models\Lbs\Desa;

class Home extends BaseController
{
    public function index(): string
    {
        return view('landing');
    }

    public function dashboard(): string
    {
        $page = new Page;
        $page->setTitle('Dashboard');
        $page->setBreadcrumbs([
            [
                'label' => 'Dashboard',
                'url' => false
            ]
        ]);

        $lokasi = (new Lokasi())->where('status','TERVERIFIKASI')->findAll();
        $polygon = [];
        foreach($lokasi as $l)
        {
            $lines = explode("\n", trim($l['data_lokasi']));
            $coordinates = [];
            foreach ($lines as $line) {
                $parts = array_map('trim', explode(',', $line));
                if (count($parts) === 2) {
                    $coordinates[] = [(float)$parts[0], (float)$parts[1]];
                }
            }

            $pemilik = (new Pemilik())->find($l['pemilik_id']);

            $polygon[] = [
                'id' => $l['id'],
                'content' => $pemilik['nama'] .' - ' . $pemilik['alamat'],
                'coordinates' => $coordinates
            ];
        }

        $desa = (new Desa)->findAll();
        
        return $page->render('home/dashboard', [
            'polygon' => $polygon,
            'desa' => $desa
        ]);
    }
}
