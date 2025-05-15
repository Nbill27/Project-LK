<div class="sidebar">
    <ul class="nav flex-column p-3">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
        </li>
        <?php if ($this->session->userdata('role') == 'dosen'): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('role/change'); ?>">Change Role</a>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" href="#">Menu 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Menu 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Menu 3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Menu 4</a>
        </li>
    </ul>
</div>