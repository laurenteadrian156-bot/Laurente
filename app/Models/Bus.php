<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PDO;

class Bus extends Model
{

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function getCurrentOccupantsAttribute(){
        return $this->schedule()->count();
    }

    public function getIsFullyBookAttribute()
    {

        return $this->current_occupants >= $this->max_occupants;
            //return boolean, if its greater it return true, else false
            //this the shortcut to the long one, i reallly still have alot to lern about
        //effienciet and clean code, i cant believe i use if else if this retrun teh same
        // true or false
    }
}
