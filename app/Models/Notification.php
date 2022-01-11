<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory,
        Concerns\Notification\Relations;

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'title', 'body', 'type', 'is_read'
    ];
}
