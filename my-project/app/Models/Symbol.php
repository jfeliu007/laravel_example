<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symbol extends Model
{
    use HasFactory;

    protected $fillable = ['symbol'];

    public function watchers(){
        return $this->belongsToMany(User::class);
    }
}
