<?php 
namespace Athakim\Stats;

use Athakim\Stats\Page;

class PageRepository 
{
	
	public function savePage($request,$visit)
	{
		return Page::create([
			'path' =>$request->path(),
			'visit_id' => $visit			
			]);
	}


	/*
	*
	*/
	public function getAll()
	{
		return Page::orderBy('created_at','DESC')->all();
	}

	/*
	*
	*/
	public function paginate( $page = 20)
	{
		return Page::orderBy('created_at','DESC')->paginate($page);
	}
}