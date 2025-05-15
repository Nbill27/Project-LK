<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - LK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
        }
        .navbar {
            background-color:rgb(18, 116, 214);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }
        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-brand:hover {
            color: #e9ecef;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
            font-size: 1rem;
            padding: 10px 15px;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color:rgb(220, 222, 223);
            background-color: #495057;
        }
        .dropdown-menu {
            background-color:rgb(52, 58, 64);
            border: none;
        }
        .dropdown-item {
            color: #ffffff;
            padding: 8px 20px;
        }
        .dropdown-item:hover {
            color: #17a2b8;
            background-color: #495057;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 70px;
            left: 0;
            width: 250px;
            background-color:rgb(219, 222, 224);
            transition: width 0.3s;
        }
        .sidebar .nav-link {
            color:rgb(8, 8, 8);
            padding: 10px 15px;
        }
        .sidebar .nav-link:hover {
            color: #17a2b8;
            background-color:rgb(58, 139, 219);
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            min-height: calc(100vh - 70px);
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                top: 60px; /* Sesuaikan dengan tinggi navbar mobile */
            }
            .content {
                margin-left: 200px;
            }
            .navbar {
                height: 60px; /* Tinggi navbar mobile */
            }
            .navbar-brand {
                font-size: 1.2rem;
            }
            .navbar-nav .nav-link {
                padding: 8px 10px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>">
                <i class="bi bi-book"></i> LK System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('dashboard'); ?>"><i class="bi bi-house"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-bell"></i> Notifikasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> <?php echo $this->session->userdata('nama'); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="<?php echo site_url('profile'); ?>"><i class="bi bi-person"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Body Content -->
    </body>
</html>