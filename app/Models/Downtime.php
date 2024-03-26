<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'user_id',
        'date',
    ];

    protected $table = 'downtime';

    public function machine(){
        return $this->belongsTo(Machine::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detailDowntime(){
        return $this->hasMany(DetailDowntime::class);
    }
}
