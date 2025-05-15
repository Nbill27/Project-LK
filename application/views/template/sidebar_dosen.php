<!-- Tambahkan di <head> kalau belum -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

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

<div class="sidebar">
    <ul class="nav flex-column p-3">
        <li class="nav-item">
            <a class="nav-link <?php echo ($this->router->fetch_class() == 'dashboard') ? 'active' : ''; ?>" href="<?php echo site_url('dashboard'); ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($this->router->fetch_class() == 'role' && $this->router->fetch_method() == 'change') ? 'active' : ''; ?>" href="<?php echo site_url('role/change'); ?>">
                <i class="bi bi-arrow-repeat"></i> Change Role
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($this->router->fetch_class() == 'form_lk') ? 'active' : ''; ?>" href="<?php echo site_url('form_lk'); ?>">
                <i class="bi bi-journal-text"></i> Form Surat
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-geo-alt"></i> Tracking LK
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-clock-history"></i> History
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-diagram-3"></i> Struktur
            </a>
        </li>

        <?php if (isset($current_role) && $current_role == 'Dekan'): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->router->fetch_class() == 'dekan' && $this->router->fetch_method() == 'dashboard') ? 'active' : ''; ?>" href="<?php echo site_url('dekan/dashboard'); ?>">
                    <i class="bi bi-clipboard-data"></i> Laporan Dekan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-check-circle"></i> Approval Kegiatan
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>