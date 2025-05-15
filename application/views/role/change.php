<div class="content">
    <h2>Change Role</h2>
    <div class="card">
        <div class="card-body">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <p>Current Role: <?php echo $this->Role_model->get_current_role($this->session->userdata('id')); ?></p>
            <?php if (empty($roles)): ?>
                <p>Tidak ada role yang tersedia untuk Anda.</p>
            <?php else: ?>
                <?php echo form_open('role/change'); ?>
                    <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                    <div class="mb-3">
                        <label for="role" class="form-label">Pilih Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Role</button>
                <?php echo form_close(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>