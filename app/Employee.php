<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'id', 'First_name', ' Last_name','img','Job','User_id','Status','Location'
    ];
    public function user(){
        return $this->belongsto(User::class);
    }

}
