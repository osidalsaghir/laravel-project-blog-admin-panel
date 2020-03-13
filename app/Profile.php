<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  
    protected $fillable = [
        'user_id', 'avatar', 'name' , 'facebook','twitter','github','about',
    ];

    public function user(){
        return $this->hasOne('App\User');
    }
}
