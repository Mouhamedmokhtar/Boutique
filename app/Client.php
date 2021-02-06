<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Client extends Model
{
    protected $fillable = ['name', 'commande' ,'phone', 'user_id'];

	public function user() 
	{
		return $this->belongsTo('App\User');
	}
	
}            