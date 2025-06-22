<?= $this->extend('layouts/app') ?>

<?= $this->section('pageTitle') ?>
<?= $page_title ?>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<style>
#map { height: 380px; }
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
var map = L.map('map').setView([2.985152, 99.628889], 14);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = L.marker([2.985152, 99.628889], {
    draggable: true,
    autoPan: true
}).addTo(map);

marker.on("dragend", function(e) {
    var marker = e.target;
    var position = marker.getLatLng();
    // console.log(position.lat, position.lng)

    document.querySelector('[name=lat]').value = position.lat
    document.querySelector('[name=lng]').value = position.lng
});

// function onMapClick(e) {
//   marker = new L.marker(e.latlng, {draggable:'true'});
//   marker.on('dragend', function(event){
//     var marker = event.target;
//     var position = marker.getLatLng();
//     marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
//     map.panTo(new L.LatLng(position.lat, position.lng))
//   });
//   map.addLayer(marker);
// };

// map.on('click', onMapClick);
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <form action="" method="POST">
        <div class="card-body">
            <?= csrf_field() ?>
            
            <?= \App\Libraries\Form::generate($fields, $data) ?>

            <div class="map" id="map"></div>
        
        </div>
        
        <div class="card-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="<?= site_url($page_slug . (isset($_GET['filter']) ? '?'.http_build_query($_GET) : ''))?>" class="btn btn-warning">Kembali</a>    
        </div>
    </form>
</div>
<?= $this->endSection() ?>