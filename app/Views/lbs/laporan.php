<?= $this->extend('layouts/app') ?>

<?= $this->section('pageTitle') ?>
<?= $page_title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
@media print
{    
    .sidebar, .main-header, nav, .page-header, .no-print, footer
    {
        display: none !important;
    }

    .main-panel {
        width: 100% !important;
    }

    .print-full {
        display: block !important;
        width:100% !important;
    }
}
</style>
<div class="row no-print mb-4">
    <div class="col-12">
        <button class="btn btn-success" onclick="window.print()">Print</button>
    </div>
</div>
<div class="row visible-print">
    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-body">
                <h4>Pemilik</h4>
                <h1><?=$pemilik?></h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-body">
                <h4>Aset</h4>
                <h1><?=$asset?></h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-body">
                <h4>Aset Terverifikasi</h4>
                <h1><?=$assetTerverifikasi?></h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-body">
                <h4>Aset Belum Terverifikasi</h4>
                <h1><?=$asset-$assetTerverifikasi?></h1>
            </div>
        </div>
    </div>
</div>
<div class="row print-full">
    <div class="col-12 col-md-6 print-full">
        <div class="card">
            <div class="card-body">
                <h4>Aset Terverifikasi</h4>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Desa</th>
                            <th>Aset</th>
                            <th>Pemilik</th>
                        </tr>
                        <?php $no=1; foreach($assets as $index => $asset): if($asset['status'] == 'PENGAJUAN') continue;?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$asset['nama_desa']?></td>
                            <td><?=$asset['nama']?></td>
                            <td><?=$asset['nama_pemilik']?></td>
                        </tr>
                        <?php $no++; endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 print-full">
        <div class="card">
            <div class="card-body">
                <h4>Aset Belum Terverifikasi</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Desa</th>
                            <th>Aset</th>
                            <th>Pemilik</th>
                        </tr>
                        <?php $no=1; foreach($assets as $index => $asset): if($asset['status'] != 'PENGAJUAN') continue;?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$asset['nama_desa']?></td>
                            <td><?=$asset['nama']?></td>
                            <td><?=$asset['nama_pemilik']?></td>
                        </tr>
                        <?php $no++; endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>