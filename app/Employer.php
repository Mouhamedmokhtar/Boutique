<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Employer extends Model
{
    
    protected $fillable = ['name', 'embauchement' , 'commentaire','user_id'];

	public function user() 
	{
		return $this->belongsTo('App\User');
	}

}


