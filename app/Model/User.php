<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
 
    public $table = 'user_admins';

    public $primaryKey = 'id';
}