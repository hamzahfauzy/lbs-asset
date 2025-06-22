<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <title>Pencarian Lokasi Strategis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
    #map { height: 100vh; width:100%; }
    </style>
  </head>
  <body>
    <div class="container-fluid" style="padding-left:0">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="map" id="map"></div>
            </div>
            <div class="col-12 col-md-4">
                <form action="" id="searchForm">
                    <center>
                        <br>
                        <img src="/logo.png" alt="team-leader" width="200px"/>
                        <h2>Parameter Lokasi Strategis</h2>
                        <br>
                    </center>
                    <div class="form-group mb-2">
                        <label for="">Arus Lalu lintas</label>
                        <select name="lalu_lintas" id="" class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach([
                                'Sangat Ramai' => 'Sangat Ramai',
                                'Ramai' => 'Ramai',
                                'Sedang' => 'Sedang',
                                'Sepi' => 'Sepi',
                                'Sangat Sepi' => 'Sangat Sepi',
                            ] as $item): ?>
                            <option value="<?=$item?>" <?= isset($_GET['lalu_lintas']) && $_GET['lalu_lintas'] == $item ? 'selected=""' : ''?>><?=$item?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Keramaian</label>
                        <select name="keramaian" id="" class="form-control">
                            <option value="">Pilih</option>

                            <?php foreach([
                                'Zona Super Ramai' => 'Zona Super Ramai',
                                'Ramai' => 'Ramai',
                                'Biasa Aja' => 'Biasa Aja',
                                'Sepi' => 'Sepi',
                                'Tidak ada aktivitas' => 'Tidak ada aktivitas',
                            ] as $item): ?>
                            <option value="<?=$item?>" <?= isset($_GET['keramaian']) && $_GET['keramaian'] == $item ? 'selected=""' : ''?>><?=$item?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Zonasi</label>
                        <select name="zonasi" id="" class="form-control">
                            <option value="">Pilih</option>

                            <?php foreach([
                                'Zona Komersial Resmi' => 'Zona Komersial Resmi',
                                'Zona Komersial Biasa' => 'Zona Komersial Biasa',
                                'Zona Campuran' => 'Zona Campuran',
                                'Zona Terbatas' => 'Zona Terbatas',
                                'Zona Terlarang' => 'Zona Terlarang',
                            ] as $item): ?>
                            <option value="<?=$item?>" <?= isset($_GET['zonasi']) && $_GET['zonasi'] == $item ? 'selected=""' : ''?>><?=$item?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-block w-100">Submit</button>
                </form>

                <hr>

                <ul class="list-group list-group-flush">
                    <?php foreach($mediaIklan as $media): ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="/order?id=<?=$media['id']?>" style="text-decoration: none; color: black;">
                            <b><?=$media['nama_lokasi']?> - <?=$media['jenis']?> (<?=$media['ukuran']?>)</b><br>
                            <?= number_format($media['harga_sewa']) ?>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
    var lokasiIklan = <?=json_encode($lokasiIklan)?>;
    var map = L.map('map').setView([2.985152, 99.628889], 14);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    for (var i = 0; i < lokasiIklan.length; i++) {
        marker = new L.marker([lokasiIklan[i].lat, lokasiIklan[i].lng], {
            ...lokasiIklan[i]
        })
            .bindPopup(lokasiIklan[i].nama)
            .addTo(map);

        marker.on("click", function(e) {
            var marker = e.target;
            lokasiId = marker.options.id

            window.location.href = '/search?lokasi_id=' + lokasiId
        });
    }

    // var marker = L.marker([2.985152, 99.628889]).addTo(map);
    </script>
  </body>
</html>