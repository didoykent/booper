<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Recording;
use App\Schedule;
use App\Message;
use App\Tutor;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;



class Student extends Model implements AuthenticatableContract
{

 use Authenticatable;


  protected $table = 'students';


  protected $fillable = ['en_name', 'kr_name', 'email', 'password', 'tutor_id', 'role', 'chatroute', 'conn_id' ];



  protected $hidden = ['password', 'remember_token'];



  public function message(){

    return $this->hasMany(Message::class);
  }

  public function tutor(){

    return $this->belongsTo(Tutor::class);
  }


}
