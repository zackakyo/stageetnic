
 @extends('layouts.base')


@section('title1', "Back-end")
@section('content')
@section('title2', "instance")
@section('content')
<div class="row" >
    @component('layouts.components.backendoptions')
    @endcomponent
    @component('instance.list', ['instances'=>$instances] )
    @endcomponent

    @if ($view === 1)
        @component('instance.create')
        @endcomponent
    @elseif($view === 2)
        @component('instance.edit', ['instance'=>$instance])
        @endcomponent
    @elseif($view === 3)
        @component('instance.confirm')
        @endcomponent
    @endif
    </div>
@endsection

