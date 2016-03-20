<?php 
namespace Athakim\Stats;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	
	protected $table= 'stats_pages';

	protected $fillable = ['path','visit_id'];


	public function visit()
	{
		return $this->belongsTo('Athakim\Stats\Visit');
	}

	
}