<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmReserve extends Model
{
    public $table= 'cinfirm_reserve';
    public $primaryKey= 'id';
    public $incrementing= 'true';
    public $keyType= 'int';
    public $timestapms= 'true';

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
