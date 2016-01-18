<?php
namespace Athakim\Stats\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
* 
*/
class StatsController extends Controller
{
	
	function index(Request $request)
	{
		$stats = ' statsistiques ';

		return view('stats::index',compact('stats'));
	}
}