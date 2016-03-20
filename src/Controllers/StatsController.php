<?php
namespace Athakim\Stats\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use App\Http\Controllers\Controller;

use Athakim\Stats\VisitorRepository;
use Athakim\Stats\VisitRepository;
use Athakim\Stats\PageRepository;

class StatsController extends Controller
{
	protected $visitorRepo;
	protected $perPage =20;

	function __construct(VisitorRepository $visitorRepo,
							VisitRepository $visitRepo,
							PageRepository $pageRepo)
	{
		$this->visitorRepo = $visitorRepo;
		$this->visitRepo = $visitRepo;
		$this->pageRepo = $pageRepo;
	}

	function index(Request $request)
	{
		$visits = $this->visitRepo->paginate($this->perPage);
		$pages = $this->pageRepo->paginate($this->perPage);

		return view('stats::index',compact('visits','pages'));
	}

	public function test()
	{
		$stats = ' test ';


		return view('stats::test',compact('stats'));
	}
}