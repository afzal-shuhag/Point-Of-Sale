<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eproduct extends Model
{
  public function category()
  {
    return $this->belongsTo(Ecategory::class,'category_id','id');
  }
}
