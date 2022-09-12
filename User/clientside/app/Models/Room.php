<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    public $table= 'rooms';
    public $primaryKey= 'id';
    public $incrementing= 'true';
    public $keyType= 'int';
    public $timestapms= 'true';


    use HasFactory;
}
