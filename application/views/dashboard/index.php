<div class="content">
    <h2>Dashboard</h2>
    <div class="card">
        <div class="card-body">
            <p>Selamat datang di Sistem LK. Anda login sebagai <?php echo ucfirst($this->session->userdata('role')); ?>.</p>
            <p>Nama: <?php echo $this->session->userdata('nama'); ?></p>
        </div>
    </div>
</div>