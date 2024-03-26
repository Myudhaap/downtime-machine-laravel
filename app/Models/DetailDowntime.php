<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDowntime extends Model
{
    use HasFactory;


    protected $fillable = [
        'downtime_id',
        'type_downtime_id',
        'start_time',
        'end_time',
        'description',
    ];

    public function downtime(){
        return $this->belongsTo(Downtime::class);
    }

    public function typeDowntime(){
        return $this->belongsTo(TypeDowntime::class);
    }
}
