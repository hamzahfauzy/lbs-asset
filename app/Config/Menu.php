<?php

namespace App\Config;

class Menu {

    static function buildItem($label, $url = false, $slug = '', $icon = '', $controller = false, $roles = [])
    {
        $url = !$url ? "/$slug" : $url;
        return [
            'label' => $label,
            'icon'  => $icon,
            'slug' => $slug,
            'url' => $url,
            'controller' => $controller,
            'roles' => $roles
        ];
    }

    static function get()
    {
        return [
            static::buildItem('Desa', false, 'desa', 'fas fa-map-marker', 'Lbs\DesaController', ['Admin']),
            static::buildItem('Pemilik', false, 'pemilik', 'fas fa-users', 'Lbs\PemilikController', ['Admin']),
            static::buildItem('Aset', false, 'aset', 'fas fa-map-marker', 'Lbs\AssetController', ['Admin','Camat']),
            static::buildItem('Laporan', false, 'laporan', 'fas fa-file', 'Lbs\LaporanController', ['Admin','Camat']),
            static::buildItem('Pengguna', false, 'pengguna', 'fas fa-users', 'Lbs\PenggunaController', ['Admin']),
        ];
    }
}