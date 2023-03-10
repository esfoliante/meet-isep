<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'user_id'
    ];

}
