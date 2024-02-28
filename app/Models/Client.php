<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['id','first_name', 'last_name', 'contact', 'email','gender','dob', 'street_no', 'street_address', 'city', 'status'];
}
