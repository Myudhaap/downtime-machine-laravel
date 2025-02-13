<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "full_name",
        "phone",
        "email",
        "address",
        "birth_of_date",
        "isActive"
    ];

    protected $table = "employees";

    public function user(){
        return $this->belongsTo(User::class);
    }
}
