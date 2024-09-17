<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['name', 'sername', 'phone', 'email', 'country'];
    public $timestamps = false;
    use HasFactory;
}
