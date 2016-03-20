<?php 
namespace Athakim\Stats;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
	
	protected $table= 'stats_visits';

	protected $fillable = ['useragent','robot','device','lang','visitor_id'];


	public function visitor()
	{
		return $this->belongsTo('Athakim\Stats\Visitor');
	}

	public function pages()
	{
		return $this->hasMany('Athakim\Stats\Page');
	}
	
}