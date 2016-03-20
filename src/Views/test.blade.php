@extends(\Config::get('stats.template'))

@section('content')
<h1>Tests</h1>

{{ $stats }}
@endsection
