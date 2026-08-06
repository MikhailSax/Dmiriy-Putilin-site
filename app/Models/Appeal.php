<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'address', 'topic', 'message', 'files', 'status', 'status_history', 'registered_number',
    ];

    protected function casts(): array
    {
        return [
            'files' => 'array',
            'status_history' => 'array',
        ];
    }
}
