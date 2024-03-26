<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'type_downtime_id',
        'date',
        'start_time',
        'end_time',
        'description'
    ];

    public function machine(){
        return $this->belongsTo(Machine::class);
    }

    public function typeDowntime(){
        return $this->belongsTo(TypeDowntime::class);
    }
}
