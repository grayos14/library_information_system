<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'id_peminjaman';
    protected $useAutoIncrement = true; // created_at, updated_at
    protected $useSoftDeletes   = false; // deleted_at
    protected $allowedFields    = [
        'id_member',
        'id_book',
        'tgl_pinjam',
        'tgl_harus_kembali',
    ];

    // Dates
    protected $useTimestamps = false;
}
