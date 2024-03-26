<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDowntime extends Model
{
    use HasFactory;

    protected $table = "type_downtime";

    protected $fillable = [
        'name'
    ];

    public function detailDowntime(){
        return $this->hasMany(DetailDowntime::class);
    }
}
