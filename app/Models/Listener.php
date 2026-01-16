<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listener extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'address',
        'img_path',
        'user_id'
    ];
}
