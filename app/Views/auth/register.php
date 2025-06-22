<?= $this->extend('layouts/app-minimum') ?>

<?= $this->section('content') ?>
<div class="container" style="padding-top: 100px;">
    <div class="row">
        <div class="col-12 col-lg-4 mx-auto">
            <h1 class="text-center"><?= getenv('app.name'); ?></h1>
            <h4 class="text-center"><?= getenv('app.tagline'); ?></h4>
            <div class="card mt-5">
                <form action="/register" method="post">
                    <div class="card-body">
                        <center><h2>Register</h2></center>
                        <?php if(session()->getFlashdata('msg')):?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" name="name" value="<?= set_value('name') ?>">
                        </div>
                        <div class="form-group">
                            <label for="email2">Email</label>
                            <input type="email" class="form-control" id="email2" placeholder="Masukkan Email" name="email" value="<?= set_value('email') ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password">
                        </div>
                    </div>
                    <div class="card-action text-center">
                        <button class="btn btn-primary w-100 mb-3">Submit</button>
                        Sudah punya akun ? Silahkan <a href="/login">Login</a>
                        <br>
                        <br>
                        <a href="#"><?= getenv('app.name'); ?> &copy; <?=date('Y') ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>