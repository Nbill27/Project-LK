<div class="content">
    <h2><?php echo $title; ?></h2>
    <p>Selamat datang di Dashboard Admin. Di sini Anda dapat melihat ringkasan sistem.</p>
    <div class="card">
        <div class="card-body">
            <h5>Ringkasan</h5>
            <ul>
                <li>Jumlah Pengguna: <?php echo $user_count; ?></li>
                <li>Jumlah Surat: <?php echo $surat_count; ?></li>
                <li>Status Sistem: Aktif</li>
            </ul>
        </div>
    </div>
</div>