<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use  HasFactory;

    protected $table = 'users';
    protected $guarded = false;

    public function positions(){
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
