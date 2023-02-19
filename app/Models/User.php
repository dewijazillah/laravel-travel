<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['id_user','nama','email','alamat','username','password','soft_delete'];
}
