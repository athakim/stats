<?php 
namespace Athakim\Stats;

use Athakim\Stats\Visit;

class VisitRepository 
{
	/*
	*
	*/
	public function saveVisit($request , $agent ,$visitor)
	{

		$visit = Visit::create([
			'user_id' => (\Auth::check())?\Auth::user()->id:0,
			'useragent'=> $agent->platform() .' - ' .$agent->browser(),
			'robot' => $agent->robot(),
			'device' => $agent->device(),
			'visitor_id' =>$visitor,
			]);

		return $visit->id;
	}

	
	/*
	*
	*/
	public function getAll()
	{
		return Visit::orderBy('created_at','DESC')->all();
	}

	/*
	*
	*/
	public function paginate( $page = 20)
	{
		return Visit::orderBy('created_at','DESC')->paginate($page);
	}

	
}