<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ttg extends Model
{
    use HasFactory;
    /**
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'description',
        'numberofplayers',
    ];
}
