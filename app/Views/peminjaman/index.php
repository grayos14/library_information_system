<?= $this->extend('layouts/template') ?>

<?= $this->section('header') ?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><?php echo $title; ?></h1>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- The Modal -->
 
<div class="modal" id="formModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="card" id="peminjamanCard">
    <div class="card-header">
        <h3 class="card-title">Riwayat Peminjaman</h3>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="card-tools">
            <a href="<?= base_url('create/transaction') ?>" class="btn btn-primary btn-sm" id="addBtn" data-toggle="modal" data-target="#formModal">
                <i class="fas fa-plus"></i> Pengajuan Peminjaman
            </a>
        </div>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="peminjamanTable">
        </table>
    </div>
</div>
<?= $this->endsection() ?>

<?= $this->section('js')?>
<script>
    function requestAjax(urlParams, methodParams='GET', dataType='html', successFunction=null, dataParams=null) {
        $.ajax({
            url: urlParams,
            method: methodParams,
            data: dataParams,
            dataType: dataType, //html or json
            success: function(data) {
                if(successFunction != null && typeof successFunction === 'function') successFunction(data);
                else $("#peminjamanTable").html(data);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + ": " + error);
            }
        });
    }

    
    $(document).ready(function() {
        requestAjax("<?= base_url('list/transactions/table'); ?>");

        
        $('#peminjamanCard').on('click', '#addBtn', function(e) {
            e.preventDefault();
            const urlParams = "<?= base_url('ajax/create/transaction') ?>";
            requestAjax(urlParams, 'GET', 'html', function(response) {
                $('#formModal .modal-title').html('Form Pengajuan Peminjaman');
                $('#formModal .modal-body').html(response);
                $('#formModal').modal('show');
            });
        });
        
        $('#formModal').on('click', '#saveButton', function(e) {
            e.preventDefault();
            const urlParams = "<?= base_url('create/transaction') ?>";
            const formData = $('#peminjamanForm').serialize();
            requestAjax(urlParams, 'POST', 'json', function(response) {
                if(response.code == 200) {
                    alert(response.message);
                    $('#formModal').modal('hide');
                    requestAjax("<?= base_url('list/transactions/table'); ?>");
                }
            }, formData);
        });
    
        $('#peminjamanTable').on('click', '.editBtn', function(e) {
            e.preventDefault();
            const urlParams = $(this).attr('href');
            requestAjax(urlParams, 'GET', 'html', function(response) {
                $('#formModal .modal-title').html('Form Edit Peminjaman');
                $('#formModal .modal-body').html(response);
                $('#formModal').modal('show');
            });
        }); 
        
        $('#formModal').on('click', '#updateButton', function(e) {
            e.preventDefault();
            const urlParams = "<?= base_url('update/transaction') ?>";
            const formData = $('#editPeminjamanForm').serialize();
            requestAjax(urlParams, 'POST', 'json', function(response) {
                if(response.code == 200) {
                    alert(response.message);
                    $('#formModal').modal('hide');
                    requestAjax("<?= base_url('list/transactions/table') ?>");
                }
            }, formData);
        });

        $('#peminjamanTable').on('click', '.deleteBtn', function(e) {
            e.preventDefault();
            const isConfirmed = confirm('Apakah user yakin akan menghapus data ini?');
            if(isConfirmed == true) {
                const urlParams = $(this).closest('form').attr('action');
                requestAjax(urlParams, 'POST', 'json', function(response){
                    if(response.code==200) {
                        alert(response.message);
                        requestAjax("<?= base_url('list/transactions/table'); ?>");
                    }
                });
            }
        });
    });
</script>

<?= $this->endSection()?>
