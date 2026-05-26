<form action="<?= base_url('update/book') ?>" method="post" id="editBookForm">
    <!-- Form fields will go here -->
        <?= csrf_field() ?>
        <div class="card-body">
            
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan judul buku" value="<?php echo $detail_book['title_book'];?>">
            </div>
            <div class="form-group">
                <label>Kode Buku</label>
                <input type="text" name="kode" class="form-control" placeholder="Masukkan kode buku" value="<?php echo $detail_book['code_book'];?>">
            </div>
            <div class="form-group">
                <label>ISBN</label>
                <input type="text" name="isbn" class="form-control" placeholder="Masukkan ISBN buku" value="<?php echo $detail_book['isbn_book'];?>">
            </div>
            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" placeholder="Masukkan nama penulis" value="<?php echo $detail_book['author_book'];?>">
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control" placeholder="Masukkan nama penerbit" value="<?php echo $detail_book['publisher_book'];?>">
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" name="tahun_terbit" class="form-control" placeholder="Masukkan tahun terbit" value="<?php echo $detail_book['published_year'];?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan buku" value="<?php echo $detail_book['description_book'];?>">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
            </div>
        </div>
</form>