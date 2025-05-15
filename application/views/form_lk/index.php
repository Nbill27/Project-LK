<div class="content">
    <h2 class="mb-4">Form Input Surat</h2>
    <div class="card">
        <div class="card-body">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <?php echo form_open_multipart('form_lk'); ?> <!-- Sesuaikan form action -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nomor_surat" class="form-label">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?php echo set_value('nomor_surat'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="judul_surat" class="form-label">Judul Surat</label>
                            <input type="text" class="form-control" id="judul_surat" name="judul_surat" value="<?php echo set_value('judul_surat'); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori Surat</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Undangan" <?php echo set_select('kategori', 'Undangan'); ?>>Undangan</option>
                                <option value="Pengumuman" <?php echo set_select('kategori', 'Pengumuman'); ?>>Pengumuman</option>
                                <option value="Permintaan" <?php echo set_select('kategori', 'Permintaan'); ?>>Permintaan</option>
                                <option value="Lainnya" <?php echo set_select('kategori', 'Lainnya'); ?>>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pengirim" class="form-label">Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?php echo set_value('pengirim'); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Surat</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?php echo set_value('deskripsi'); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo set_value('tanggal_masuk'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lampiran" class="form-label">Lampiran (PDF/JPG/PNG, maks 2MB)</label>
                            <input type="file" class="form-control" id="lampiran" name="lampiran">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ajukan Surat</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>