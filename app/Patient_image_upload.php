<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_image_upload extends Model
{
     protected $table= 'Patient_image_upload';




   public function getCreatedAtAttribute($date)
      {
          return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
      }


 }