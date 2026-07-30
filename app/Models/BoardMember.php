<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo_path',
        'sort_order',
    ];
}
