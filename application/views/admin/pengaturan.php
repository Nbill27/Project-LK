<div class="content">
    <h2><?php echo $title; ?></h2>
    <p>Halaman untuk mengatur konfigurasi sistem, seperti tema atau izin akses.</p>
    <div class="card">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="theme" class="form-label">Tema</label>
                    <select class="form-select" id="theme" name="theme">
                        <option value="light">Light</option>
                        <option value="dark">Dark</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            </form>
        </div>
    </div>
</div>