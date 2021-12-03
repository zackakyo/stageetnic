
 @extends('layouts.base')


@section('title1', "Back-end")
@section('content')
@section('title2', "PHP")
@section('content')
<div class="row" >
    @component('layouts.components.backendoptions')
    @endcomponent
    @component('php.list', ['phps'=>$phps] )
    @endcomponent

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
    </div>
@endsection

