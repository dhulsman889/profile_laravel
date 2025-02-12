<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    /**
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'description',
        'image',
        'link',
    ];
}
