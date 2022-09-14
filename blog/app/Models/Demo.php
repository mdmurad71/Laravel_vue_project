<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    public $table= 'demo';
    public $primaryKey= 'id';
    public $incrementing= 'true';
    public $keyType= 'int';
    public $timestapms= 'true';
}
