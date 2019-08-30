<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Status;
class Order extends Model
{
        //protected $table = 'orders';
        public function status(){
            return $this->belongsTo('App\Status');
          }
}
