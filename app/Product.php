<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Product extends Model
{
   protected $fillable = ['name', 'detail' , 'prix','user_id','category_id'];

	public function user() 
	{
		return $this->belongsTo('App\User');
	}
		public function category() 
	{
				return $this->belongsTo('App\Category');

	}

}


