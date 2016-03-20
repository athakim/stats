<?php

namespace Athakim\Stats\Middleware;

use Closure;
use Athakim\Stats\VisitorRepository;
use Athakim\Stats\VisitRepository;
use Athakim\Stats\PageRepository;
use Athakim\Stats\Agent;

class VisitorsMiddleware
{	
	protected $visitor;
    protected $visit;
    protected $page;
	protected $agent;

	public function __construct(VisitorRepository $visitor,
                                VisitRepository $visit,
                                PageRepository $page)
	{
		$this->visitor = $visitor;
        $this->visit = $visit;
        $this->page = $page;

	}

    public function handle($request, Closure $next)
    {
          //$request->session()->forget('visitor');
         //$request->session()->forget('IdentifyUser');
         // die();
         //\Auth::loginUsingId(1);
         //\Auth::logout();

    	$this->agent = new Agent();

    	if ( ! $request->session()->has('visitor') )
    	{
			$v = $this->visitor->saveVisitor($request);
			$request->session()->put('visitor',$v);
            $request->session()->put('IdentifyUser',(\Auth::check())?\Auth::user()->id:0);
            
            $visit = $this->visit->saveVisit($request,$this->agent, $request->session()->get('visitor'));
        }

        if (\Auth::check() && $request->session()->get('IdentifyUser')==0 ) {
           $this->visitor->modifyVisitor($request->session()->get('visitor'));
        }
        
        $page = $this->page->savePage($request,$request->session()->get('visitor'));

        return $next($request);
    }
}
