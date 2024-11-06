<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected function casts(): array
    {
        return [
            'completed' => 'boolean',
        ];
    }
}
