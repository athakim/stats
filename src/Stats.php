<?php
namespace Athakim\Stats;

use Illuminate\Http\Request;
use Athakim\Stats\Visit;
use Carbon\Carbon;


class Stats 
{

	/*
	*
	* VISITS
	*/

	public function getAllVists()
	{
		return Visit::orderBy('created_at','DESC')->all();
	}

	public function getVisits($perPage=20)
	{
		return Visit::orderBy('created_at','DESC')->paginate($perPage);
	}

	public function visits()
	{
		return Visit::all()->count();
	}

	public function getVisitsOfDay($d , $perPage=20)
	{	
		$d = preg_replace('/\//i','-',$d);
		$d = explode('-',$d);
		
		return Visit::whereDay('created_at','=',$d[0])
				->whereMonth('created_at','=',$d[1])
				->whereYear('created_at','=',$d[2])
					->paginate($perPage);
	}

	public function getVisitsOfMonth($d,$perPage=20)
	{	
		$d = preg_replace('/\//i','-',$d);
		$d = explode('-',$d);
		
		return Visit::whereMonth('created_at','=',$d[1])
					->whereYear('created_at','=',$d[2])
					->paginate($perPage);
		
	}


	public function getVisitsOfYear($d,$perPage=20)
	{	
		$d = preg_replace('/\//i','-',$d);
		$d = explode('-',$d);
		
		return Visit::whereYear('created_at','=',$d[2])
					->paginate($perPage);
		
	}

	/*
	*
	* VISITORS
	*/

	public function getAllVisitors()
	{
		return Visitor::orderBy('created_at','DESC')->get();
	}

	public function getVisitors($perPage=20)
	{
		return Visitor::orderBy('created_at','DESC')->paginate($perPage);
	}

	public function visitors()
	{
		return Visitor::all()->count();
	}

	public function getVisitorById($id)
	{
		return Visitor::findOrFail($id);
	}

	public function getVisitorByUserId($userId)
	{
		$visitor = Visitor::where('user_id',$userId)->first();

		if (! $visitor)
			throw new Exception("Error Processing Request", 1);
		return $visitor;
	}

	/*
	*
	* PAGES
	*/

	public function getAllPages()
	{
		return Page::orderBy('created_at','DESC')->get();
	}

	public function getPages( $perPage = 20)
	{
		return Page::orderBy('created_at','DESC')->paginate($perPage);
	}

	public function pages()
	{
		return Page::all()->count();
	}

}