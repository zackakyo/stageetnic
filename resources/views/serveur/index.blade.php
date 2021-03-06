
 @extends('layouts.base')


@section('title1', "Back-end")
@section('content')
@section('title2', "serveur")
@section('content')
<div class="row" >
    @component('layouts.components.backendoptions')
    @endcomponent
    @component('serveur.list', ['serveurs'=>$serveurs] )
    @endcomponent

    @if ($view === 1)
        @component('serveur.create')
        @endcomponent
    @elseif($view === 2)
        @component('serveur.edit', ['serveur'=>$serveur])
        @endcomponent
    @elseif($view === 3)
        @component('serveur.confirm')
        @endcomponent
    @endif
    </div>
@endsection

