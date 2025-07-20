<?= $this->extend('layouts/app') ?>

<?= $this->section('pageTitle') ?>
<?= $page_title ?>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<style>
#map { height: 480px; }
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
var map = L.map('map').setView([2.918901151692474, 99.54929623605567], 17);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 24,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = L.marker([2.918901151692474, 99.54929623605567], {
    draggable: true,
    autoPan: true
}).addTo(map);

var areaList = <?=json_encode($polygon)?>;

areaList.forEach(area => {
    const polygon = L.polygon(area.coordinates, {
        color: 'green',
        fillOpacity: 0.4
    })
    .bindPopup(area.content)
    .addTo(map);

    // Event click pada polygon
    polygon.on('click', function(e) {
        // Contoh data yang dikirim

        // Request ke server pakai fetch
        fetchDetail(area.id)
    });
});

function fetchDetail(id){
    fetch('/asset/detail/' + id)
        .then(response => response.json())
        .then(response => {
            const data = response.data
            console.log('Response dari server:', data);
            // Bisa update popup atau marker sesuai respon
            document.querySelector('#map-content').innerHTML = `<table class="table">
                <tr>
                    <td>
                    <b>Nama Desa</b><br>
                    ${data.nama_desa}
                    </td>
                </tr>
                <tr>
                    <td>
                    <b>Nama pemilik</b><br>
                    ${data.nama_pemilik}
                    </td>
                </tr>
                <tr>
                    <td>
                    <b>Jenis</b><br>
                    ${data.jenis}
                    </td>
                </tr>
                <tr>
                    <td>
                    <b>Alamat</b><br>
                    ${data.alamat}
                    </td>
                </tr>
                <tr>
                    <td>
                    <b>Gambar</b><br>
                    <img src="${data.gambar}" width="100%">
                    </td>
                </tr>
            `
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function cari(){
    const id = document.querySelector('#asset').value
    const asset = areaList.find(area => area.id === id);
    map.setView(asset.coordinates[0], 18);
    fetchDetail(id)
}

function loadAsset(){

    // Request ke server pakai fetch
    const queryParams = 'desa='+document.querySelector('#desa').value // +'&nama='+document.querySelector('#nama').value
    fetch('/asset/search/?' + queryParams)
    .then(response => response.json())
    .then(response => {
        const data = response.data
            // map.setView([data.lat, data.lng], 17);

            // marker = L.marker([data.lat, data.lng], {
            //     draggable: true,
            //     autoPan: true
            // }).addTo(map);
        document.querySelector('#asset').innerHTML = '<option value="">- Pilih -</option>'
        data.forEach(d => {
            document.querySelector('#asset').innerHTML += '<option value="'+d.id+'">'+d.nama+'</option>'
        })
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 mb-3">
        
    </div>
    <div class="col-12 col-md-9">
        <div class="d-flex mb-3" style="gap:15px">
            <select name="desa" id="desa" class="form-control" onchange="loadAsset()">
                <option value="">- Semua Desa -</option>
                <?php foreach($desa as $d): ?>
                <option value="<?=$d['id']?>"><?=$d['nama']?></option>
                <?php endforeach ?>
            </select>
            
            <select name="asset" id="asset" class="form-control" onchange="cari()">
                <option value="">- Pilih -</option>
            </select>
        </div>
        <div class="alert alert-danger d-none" id="asset-not-found">
            Maaf! Aset tidak ditemukan
        </div>
        <div class="card">
            <div class="card-body">
                <div class="map" id="map"></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-body" id="map-content">
                <h2>Pilih Lokasi untuk menampilkan Detail</h2>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>