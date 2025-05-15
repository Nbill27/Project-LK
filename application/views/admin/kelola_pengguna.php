<div class="content">
    <h2><?php echo $title; ?></h2>
    <p>Halaman untuk mengelola pengguna sistem. Anda dapat menambah, mengedit, atau menghapus pengguna.</p>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary">Tambah Pengguna Baru</button>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Admin Utama</td>
                        <td>Admin</td>
                        <td><button class="btn btn-sm btn-warning">Edit</button> <button class="btn btn-sm btn-danger">Hapus</button></td>
                    </tr>
                    <!-- Tambahkan data dinamis dari database di sini -->
                </tbody>
            </table>
        </div>
    </div>
</div>