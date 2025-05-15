<div class="sidebar">
    <ul class="nav flex-column p-3">
        <li class="nav-item">
            <a class="nav-link <?php echo ($this->router->fetch_class() == 'admin' && $this->router->fetch_method() == 'index') ? 'active' : ''; ?>" href="<?php echo site_url('admin'); ?>">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($this->router->fetch_class() == 'admin' && $this->router->fetch_method() == 'kelola_pengguna') ? 'active' : ''; ?>" href="<?php echo site_url('admin/kelola_pengguna'); ?>">
                Kelola Pengguna
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($this->router->fetch_class() == 'admin' && $this->router->fetch_method() == 'laporan_sistem') ? 'active' : ''; ?>" href="<?php echo site_url('admin/laporan_sistem'); ?>">
                Laporan Sistem
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($this->router->fetch_class() == 'admin' && $this->router->fetch_method() == 'pengaturan') ? 'active' : ''; ?>" href="<?php echo site_url('admin/pengaturan'); ?>">
                Pengaturan
            </a>
        </li>
    </ul>
</div>

<style>
    .sidebar {
        background-color: #f8f9fa;
        height: 100vh;
        border-right: 1px solid #dee2e6;
    }

    .nav-link {
        color: #343a40;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease-in-out;
    }

    .nav-link:hover {
        background-color: #e2e6ea;
        border-radius: 5px;
        color: #0d6efd;
    }

    .nav-link.active {
        background-color: #0d6efd;
        color: white !important;
        border-radius: 5px;
    }

    .nav-link i {
        font-size: 1.1rem;
    }
</style>