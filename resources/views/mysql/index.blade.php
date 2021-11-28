
 @extends('layouts.base')


@section('title1', "Back-end")
@section('content')
@section('title2', "MYSQL")
@section('content')
<div class="row" >
    @component('layouts.components.backendoptions')
    @endcomponent
    @component('mysql.list', ['mysqls'=>$mysqls] )
    @endcomponent

    @if ($view === 1)
        @component('mysql.create')
        @endcomponent
    @elseif($view === 2)
        @component('mysql.edit', ['mysql'=>$mysql])
        @endcomponent
    @elseif($view === 3)
        @component('mysql.confirm')
        @endcomponent
    @endif
    </div>
@endsection

