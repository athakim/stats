<?php 
namespace Athakim\Stats;

use Athakim\Stats\Visitor;

class VisitorRepository 
{
	/*
	*
	*/
	public function saveVisitor($request)
	{
		$visitor = Visitor::where('ip',$request->ip())->first();

		if( !$visitor )
		{
			$visitor = Visitor::create([
				'ip' =>$request->ip(),
				'user_id' => (\Auth::check())?\Auth::user()->id:0,
				'last_visit' => \Carbon\Carbon::now(),
			]);
		}
		else
		{
			$visitor->last_visit = \Carbon\Carbon::now();
			$visitor->save();
		}

		return $visitor->id;
	}

	/*
	*
	*/
	public function modifyVisitor($id)
	{
		$v = Visitor::findOrFail($id);
		$v->user_id = \Auth::user()->id;
		$v->save();
	}

	/*
	*
	*/
	public function getAll()
	{
		return Visitor::orderBy('created_at','DESC')->all();
	}

	/*
	*
	*/
	public function paginate( $page = 20)
	{
		return Visitor::orderBy('created_at','DESC')->paginate($page);
	}

	/*
	*
	*/
	public function getVisitorById($id)
	{
		return Visitor::findOrFail($id);
	}

	/*
	*
	*/
	public function getVisitorByUserId($userId)
	{
		$visitor = Visitor::where('user_id',$userId)->first();

		if (! $visitor)
			throw new Exception("Error Processing Request", 1);
		return $visitor;
	}
}