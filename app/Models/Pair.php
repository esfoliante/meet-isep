<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pair extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_user_id',
        'second_user_id'
    ];

    public function first_user() : BelongsTo {
        return $this->belongsTo(related: User::class, foreignKey: 'first_user_id');
    }

    public function second_user() : BelongsTo {
        return $this->belongsTo(related: User::class, foreignKey: 'second_user_id');
    }
}
