@extends(\Config::get('stats.template'))

@section('content')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Les derniers visiteurs</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>IP</th>
                  <th>User</th>
                  <th>Device</th>
                  <th>Lang</th>
                  <th>User Agent</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($visits as $visit)
                  <tr>
                    <td>{{$visit->id}}</td>
                    <td>{{$visit->visitor->ip}}</td>
                    <td>
                        @if( $visit->robot )
                            Robot : {{ $visit->robot }}
                        @else
                            {{$visit->visitor->user ?$visit->visitor->user->name:'Inconnu'}}
                        @endif
                    </td>
                    <td>{{$visit->device}}</td>
                    <td>{{$visit->lang}}</td>
                    <td>{{$visit->useragent}}</td>
                  </tr>
                @endforeach
                
              </tbody>
            </table>
            {!! $visits->render() !!}
          </div>
          <h2 class="sub-header">Les derniers pages visitées</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>User</th>
                  <th>Path</th>
                  <th>Type</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pages as $page)
                  <tr>
                    <td>{{$page->id}}</td>
                    <td>
                        @if($page->visit->robot )
                            Robot : {{ $page->visit->robot }}
                        @else
                            {{$page->visit->visitor->user ?$page->visit->visitor->user->name:'Inconnu'}}
                        @endif
                    </td>
                    <td>{{$page->path}}</td>
                    <td></td>
                  </tr>
                @endforeach
                
              </tbody>
            </table>
            {!! $pages->render() !!}
          </div>
        </div>

@endsection
