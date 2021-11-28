
 @extends('layouts.base')


@section('title1', "Back-end")
@section('content')
@section('title2', "TYPO3")
@section('content')
<div class="row" >
    @component('layouts.components.backendoptions')
    @endcomponent
    @component('typo3.list', ['typo3s'=>$typo3s] )
    @endcomponent

    @if ($view === 1)
        @component('typo3.create')
        @endcomponent
    @elseif($view === 2)
        @component('typo3.edit', ['typo3'=>$typo3])
        @endcomponent
    @elseif($view === 3)
        @component('typo3.confirm')
        @endcomponent
    @endif
    </div>
@endsection

