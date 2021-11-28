
 @extends('layouts.base')


@section('title1', "Back-end")
@section('content')
@section('title2', "SOLR")
@section('content')
<div class="row" >
    @component('layouts.components.backendoptions')
    @endcomponent
    @component('solr.list', ['solrs'=>$solrs] )
    @endcomponent

    @if ($view === 1)
        @component('solr.create')
        @endcomponent
    @elseif($view === 2)
        @component('solr.edit', ['solr'=>$solr])
        @endcomponent
    @elseif($view === 3)
        @component('solr.confirm')
        @endcomponent
    @endif
    </div>
@endsection

