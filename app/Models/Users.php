<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = "accounts";
    protected $filable = ["username", "password", "phone_num", "gender", "age"];
    public $timestamps = false;
}
