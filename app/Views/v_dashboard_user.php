<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Selamat Datang, <?= esc($username) ?>!</h2>

<!-- Dashboard Promosi Bengkel -->
<div class="row">
    <!-- Promo Servis Mobil -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
            <img src="<?= base_url()?>NiceAdmin/assets/img/car-service.jpg" class="card-img-top" alt="Promo Servis Mobil">
            <div class="card-body">
                <h5 class="card-title">Diskon Servis Mobil Lengkap!</h5>
                <p class="card-text">Dapatkan <strong>diskon 25%</strong> untuk servis mobil lengkap hanya sampai <strong>31 Mei 2025</strong>. Servis meliputi oli, rem, aki, dan lainnya.</p>
                <a href="#" class="btn btn-primary">Lihat Detail</a>
            </div>
        </div>
    </div>

    <!-- Promo Ganti Oli -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
            <img src="<?= base_url()?>NiceAdmin/assets/img/motoservice.jpg" class="card-img-top" alt="Promo Ganti Oli">
            <div class="card-body">
                <h5 class="card-title">Ganti Oli Gratis Cek Rem!</h5>
                <p class="card-text">Ganti oli sekarang dan dapatkan <strong>gratis pengecekan rem</strong> serta konsultasi ringan terkait kondisi mesin kendaraan Anda.</p>
                <a href="#" class="btn btn-success">Ambil Promo</a>
            </div>
        </div>
    </div>
</div>

<!-- Info Bengkel -->
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title">Kenapa Pilih Bengkel Kami?</h5>
                <ul class="mb-0">
                    <li>Teknisi berpengalaman & bersertifikat</li>
                    <li>Harga transparan, tanpa biaya tersembunyi</li>
                    <li>Garansi servis hingga 30 hari</li>
                    <li>Tempat tunggu nyaman dan ber-AC</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
