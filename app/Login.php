<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{

	public $timestamps = false;
	protected $fillable = [
		'name','email','password'
	];
	protected $primaryKey ='user_id';
	protected $table = 'users';
}