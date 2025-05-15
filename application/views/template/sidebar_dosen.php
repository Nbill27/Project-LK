<style>
    .sidebar {
        background-color: rgb(219, 222, 224);
        height: 100vh;
        position: fixed;
        top: 70px;
        left: 0;
        width: 250px;
        transition: transform 0.3s ease;
        z-index: 1000;
    }

    .sidebar.hidden {
        transform: translateX(-100%);
    }

    .sidebar .nav-link {
        color: rgb(8, 8, 8);
        padding: 10px 15px;
        display: flex;
        gap: 8px;
        align-items: center;
        font-weight: 500;
    }

    .sidebar .nav-link:hover {
        background-color: rgb(58, 139, 219);
        color: #17a2b8;
        border-radius: 5px;
    }

    .sidebar .nav-link.active {
        background-color: #0d6efd;
        color: white !important;
        border-radius: 5px;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
            top: 60px;
        }
    }
</style>

<div class="sidebar" id="sidebar">
    <ul class="nav flex-column p-3">
        <li class="nav-item">
            <a class="nav-link <?= ($this->router->fetch_class() == 'dashboard') ? 'active' : ''; ?>" href="<?= site_url('dashboard'); ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($this->router->fetch_class() == 'role' && $this->router->fetch_method() == 'change') ? 'active' : ''; ?>" href="<?= site_url('role/change'); ?>">
                <i class="bi bi-arrow-repeat"></i> Change Role
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($this->router->fetch_class() == 'form_lk') ? 'active' : ''; ?>" href="<?= site_url('form_lk'); ?>">
                <i class="bi bi-journal-text"></i> Form Surat
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-geo-alt"></i> Tracking LK</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-clock-history"></i> History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-diagram-3"></i> Struktur</a>
        </li>
        <?php if (isset($current_role) && $current_role == 'Dekan'): ?>
            <li class="nav-item">
                <a class="nav-link <?= ($this->router->fetch_class() == 'dekan' && $this->router->fetch_method() == 'dashboard') ? 'active' : ''; ?>" href="<?= site_url('dekan/dashboard'); ?>">
                    <i class="bi bi-clipboard-data"></i> Laporan Dekan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-check-circle"></i> Approval Kegiatan</a>
            </li>
        <?php endif; ?>
    </ul>
</div>
