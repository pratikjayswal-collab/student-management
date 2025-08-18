<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function classes(){
        return $this->belongsTo(Classes::class);
    }

    public function studentParent(){
        return $this->belongsToMany(StudentParent::class);
    }
}
