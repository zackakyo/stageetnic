
 @extends('layouts.base')

@section('title1', "Ecran 2 : instance")
@section('title2', "Détails d'une instance")

@section('content')
<div class="row text-center font-weight-bold mx-1" >
	<a href="{{ url('instance', [$inst->id, 1]) }}" class="@if($pge==1) btn btn-primary text-white col @else btn btn-secondary btn-outline-success text-white col @endif" > <p> Extensions </p></a>
	<a href="{{ url('instance', [$inst->id, 2]) }}" class="@if($pge==2) btn btn-primary text-white col @else btn btn-secondary btn-outline-success text-white col @endif" > <p> Sites</p></a>
</div>
<div class="row" >

	<main class="col-md col-lg border " role="main" >
		<div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
@if ($pge == 1)
<h3 class="text-center">EXtensions</h3>
<table class="col-sm table text-white" >
            <thead>
                <tr>
                    <th scope="col">  nom de l'extension </th>
                    <th scope="col">Version</th>
                    <th scope="col">actif</th>
                    <th scope="col">Ter</th>
                </tr>
            </thead>
			<tbody>

				@forelse($inst->extensions as $ext)
					<tr>
						<td> <a href="{{ Route('extension.show', $ext->id ) }}" class="link text-warning"> {{ $ext->nom }} </a> </td>
						<td>{{$ext->version_ext}}</td>
						<td> @if($ext->actif) oui @else non @endif</td>
						<td> @if($ext->ter) oui @else non @endif </td>
					</tr>
				@empty
					<tr>
						<td colspan="4" >la table extension est vide </td>
					</tr>
				@endforelse
			</tbody>
		</table>

@elseif($pge == 2)
<h3 class="text-center" >sites</h3>
<table class="table text-white col-sm" >
            <thead>
                <tr>
                    <th scope="col">  nom du domaine  </th>
                    <th scope="col">en production</th>
                    <th scope="col">Date création pg Accueil</th>
                </tr>
            </thead>
					<tbody>
                        @forelse ($inst->sites as $site)
						<tr>
							<td> <a href="{{ Route('site.show', $site->id ) }}" class="link text-warning" >{{ $site->domaine }}</a> </td>
							<td> oui / non </td>
							<td> {{ $site->root_crdate }}  </td>
						</tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center" >cette instance ne contient aucun site</td>
                            </tr>
                        @endforelse
                    </tbody>
				</th>
			</tr>
		</table>
@endif
</main>
</div>
@endsection
