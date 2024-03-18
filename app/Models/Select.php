<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Select extends Model
{
    use HasFactory;
    protected $table = 'selects';
    protected $fillable = [
        'easyPaisa_name',
        'easyPaisa_number',

    ];
}
