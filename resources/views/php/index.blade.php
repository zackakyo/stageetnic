
 @extends('layouts.base')


@section('title', "CRUD des Versions de PHP")
    
@section('left')
    @component('php.list', ['phps'=>$phps] )
    
    @endcomponent
@endsection

@section('right')
    @if ($view === 1)
        @component('php.create')
        @endcomponent
    @elseif($view === 2)
        @component('php.edit', ['php'=>$php])
        @endcomponent
    @elseif($view === 3)
        @component('php.confirm')
        @endcomponent
    @endif
@endsection

