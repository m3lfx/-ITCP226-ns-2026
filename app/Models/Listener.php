<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listener extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'fname',
        'lname',
        'address',
        'img_path',
        'user_id'
    ];
}
