<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $filable = ['name'];

    public function user(){
        return $this->belongsToMany(User::class, 'user_id', 'id');
    }
}
