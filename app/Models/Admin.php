<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   //use HasFactory;*/
//protected $fillable = [
     //   'title', 'description'
     // ];
	     //protected $table = 'admins_table';
		 protected $fillable = [
        'title', 'description','username','password','usertype','token'
      ];

}
