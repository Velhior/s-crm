<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    public function category(){
        return $this->belongsTo('App\FAQCategory','faq_category_id');
      }
}
