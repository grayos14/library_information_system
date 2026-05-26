<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table            = 'members';
    protected $primaryKey       = 'id_member';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true; // deleted_at
    protected $allowedFields    = [
        'name_member',
        'email_member',
        'contact_member',
        'status_member',
    ];

    // Dates
    protected $useTimestamps = true; // created_at, updated_at
}
