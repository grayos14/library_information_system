<form action="<?= base_url('create/member') ?>" method="post" id="memberForm">
    <!-- Form fields will go here -->
        <?= csrf_field() ?>
        <div class="card-body">
        
            <div class="form-group">
                <label>Nama Member</label>
                <input type="text" name="name_member" class="form-control" placeholder="Masukkan nama member">
            </div>
            <div class="form-group">
                <label>Email Member</label>
                <input type="email" name="email_member" class="form-control" placeholder="Masukkan email member">
            </div>
            <div class="form-group">
                <label>Contact</label>
                <input type="text" name="contact_member" class="form-control" placeholder="Masukkan contact member">
            </div>
            <div class="form-group">
                <label>Status Member</label>
                <input type="text" name="status_member" class="form-control" placeholder="Masukkan status member">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="saveButton">Simpan</button>
            </div>
        </div>
</form>