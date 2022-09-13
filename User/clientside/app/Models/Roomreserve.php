<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomreserve extends Model
{


    public $table= 'room_reserve';
    public $primaryKey= 'id';
    public $incrementing= 'true';
    public $keyType= 'int';
    public $timestapms= 'true';

    protected $fillable = [
        'name',
        'phone',
        'room_id',
        'check_in',
        'check_out',
        'device_token' // attriiteattribute added
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }


    use HasFactory;
}
