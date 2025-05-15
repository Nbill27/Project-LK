<div class="content">
    <h2 class="mb-4">Dashboard Kaprodi</h2>
    <div class="card mb-4">
        <div class="card-body">
            <h5>Selamat datang, <?php echo $nama; ?>!</h5>
            <p>Anda adalah Kaprodi. Berikut adalah ringkasan surat Anda:</p>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Surat Masuk</h5>
                    <p class="card-text"><?php echo $count_masuk; ?> Surat</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Surat Diproses</h5>
                    <p class="card-text"><?php echo $count_diproses; ?> Surat</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Surat Selesai</h5>
                    <p class="card-text"><?php echo $count_selesai; ?> Surat</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Surat Masuk -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Reminder Surat Masuk</h5>
        </div>
        <div class="card-body">
            <?php if (empty($surat_masuk)): ?>
                <p>Tidak ada surat masuk saat ini.</p>
            <?php else: ?>
                <ul class="list-group">
                    <?php foreach ($surat_masuk as $surat): ?>
                        <li class="list-group-item">
                            <h6><?php echo $surat->judul_surat; ?></h6>
                            <p><?php echo $surat->deskripsi; ?></p>
                            <small>Tanggal Masuk: <?php echo $surat->tanggal_masuk; ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <!-- Surat Diproses -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Surat Diproses</h5>
        </div>
        <div class="card-body">
            <?php if (empty($surat> <?php if (empty($surat_diproses)): ?>
                <p>Tidak ada surat yang sedang diproses.</p>
            <?php else: ?>
                <ul class="list-group">
                    <?php foreach ($surat_diproses as $surat): ?>
                        <li class="list-group-item">
                            <h6><?php echo $surat->judul_surat; ?></h6>
                            <p><?php echo $surat->deskripsi; ?></p>
                            <small>Tanggal Masuk: <?php echo $surat->tanggal_masuk; ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <!-- Surat Selesai -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Surat Selesai</h5>
        </div>
        <div class="card-body">
            <?php if (empty($surat_selesai)): ?>
                <p>Tidak ada surat yang telah selesai.</p>
            <?php else: ?>
                <ul class="list-group">
                    <?php foreach ($surat_selesai as $surat): ?>
                        <li class="list-group-item">
                            <h6><?php echo $surat->judul_surat; ?></h6>
                            <p><?php echo $surat->deskripsi; ?></p>
                            <small>Tanggal Masuk: <?php echo $surat->tanggal_masuk; ?> | Selesai: <?php echo $surat->tanggal_selesai; ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>