<form action="<?= base_url('update/peminjaman') ?>" method="post" id="editPeminjamanForm">
    <!-- Form fields will go here -->
        <?= csrf_field() ?>
        <div class="card-body">
        
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="form-group">
                <label>Daftar Member</label>
                <select name="member_id" class="form-control">
                    <option value="">Pilih Member</option>
                    <?php foreach ($list_members as $member): ?>
                        <option value="<?= $member['id_member'] ?>" <?php if(isset($detail_peminjaman) && $detail_peminjaman['id_member'] == $member['id_member']) echo "selected"; ?>><?= $member['name_member'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Daftar Buku</label>
                <select name="book_id" class="form-control">
                    <option value="">Pilih Buku</option>
                    <?php foreach ($list_books as $book): ?>
                        <option value="<?= $book['id_book'] ?>" <?php if(isset($detail_peminjaman) && $detail_peminjaman['id_book'] == $book['id_book']) echo "selected"; ?>><?= $book['title_book'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Peminjaman</label>
                <input type="date" name="loan_date" class="form-control" placeholder="Masukkan tanggal peminjaman" value="<?= isset($detail_peminjaman) ? $detail_peminjaman['tgl_pinjam'] : '' ?>">
            </div>
            <div class="form-group">
                <label>Tanggal Pengembalian</label>
                <input type="date" name="return_date" class="form-control" placeholder="Masukkan tanggal pengembalian" value="<?= isset($detail_peminjaman) ? $detail_peminjaman['tgl_harus_kembali'] : '' ?>">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="updateButton">Simpan</button>
            </div>
        </div>
</form>
