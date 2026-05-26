<form action="<?= base_url('update/member') ?>" method="post" id="editMemberForm">
    <!-- Form fields will go here -->
        <?= csrf_field() ?>
        <div class="card-body">
        
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="form-group">
                <label>Nama Member</label>
                <input type="text" name="name_member" class="form-control" placeholder="Masukkan nama member" value="<?php echo $detail_member['name_member'];?>">
            </div>
            <div class="form-group">
                <label>Email Member</label>
                <input type="email" name="email_member" class="form-control" placeholder="Masukkan email member" value="<?php echo $detail_member['email_member'];?>">
            </div>
            <div class="form-group">
                <label>Contact</label>
                <input type="text" name="contact_member" class="form-control" placeholder="Masukkan contact member" value="<?php echo $detail_member['contact_member'];?>">
            </div>
            <div class="form-group">
                <label>Status Member</label>
                <input type="text" name="status_member" class="form-control" placeholder="Masukkan status member" value="<?php echo $detail_member['status_member'];?>">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
            </div>
        </div>
</form>