<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conducta extends Model
{
      protected $table = 'conducta';
      protected $primaryKey='id';
      protected $fillable = ['id','IDINDICADOR','NIE','CONCEPTO','periodotrimestral_id'];
      public $timestamps = false;
}
