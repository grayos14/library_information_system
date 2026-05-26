<?php

namespace App\Models;

use CodeIgniter\Model;

class PengembalianModel extends Model
{
    protected $table            = 'pengembalian';
    protected $primaryKey       = 'id_pengembalian';
    protected $useAutoIncrement = true; // created_at, updated_at
    protected $useSoftDeletes   = false; // deleted_at
    protected $allowedFields    = [
        'id_peminjaman',
        'tgl_kembali',
        'denda',
    ];

    // Dates
    protected $useTimestamps = false;
}
