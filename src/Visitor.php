<?php 
namespace Athakim\Stats;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
	
	protected $table= 'stats_visitors';

	protected $fillable = ['ip','user_id','last_visit'];


	public function user()
	{
		return $this->belongsTo('\App\User');
	}

	public function visits()
	{
		return $this->hasMany('Athakim\Stats\Visit');
	}
	
}