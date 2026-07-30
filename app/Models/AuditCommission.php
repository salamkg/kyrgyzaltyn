<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditCommission extends Model
{
    use HasFactory;

    protected $table = 'audit_commissions';

    protected $fillable = [
        'name',
        'position',
        'photo_path',
        'sort_order',
    ];
}
