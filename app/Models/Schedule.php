<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}
