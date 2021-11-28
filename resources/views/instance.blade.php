
 @extends('layouts.base')

@section('title1', "Ecran 2 : instance")
@section('title2', "Détails d'une instance")
    
@section('content')
<div class="row text-center" >
	<a href="{{ Route('instance.show', 1) }}" class="btn btn-primary col" > <p> Extensions </p></a>
	<a href="{{ Route('instance.show', 2) }}" class="btn btn-primary col" > <p> Sites</p></a>
</div>
<div class="row" >

	<main class="col-md col-lg border " role="main" >
		<div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
@if ($pge == 1)	
<h3 class="text-center">EXtensions</h3>
<table border="1px" class="col-sm" >
            <thead>
                <tr>
                    <th scope="col">  nom de l'extension </th>
                    <th scope="col">Version</th>
                    <th scope="col">actif</th>  
                    <th scope="col">Ter</th>  
                </tr>
            </thead>
			<tbody>
				
				@forelse($extensions as $ext)
					<tr>
						<td> <a href="{{ Route('extension.index') }}"> {{ $ext->nom }} </a> </td>
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
<table border="1px" class="col-sm" >
            <thead>
                <tr>
                    <th scope="col">  nom du domaine  </th>
                    <th scope="col">en production</th>
                    <th scope="col">Date création pg Accueil</th> 
                </tr>
            </thead>
					<tbody>
						<tr>
							<td> <a href="{{ Route('site.index') }}" >aaaaaa</a> </td>
							<td> oui / non </td>
							<td> <a href="">12 / 05/ 2015 </a> </td>
						</tr>	
                    </tbody>
				</th>
			</tr>
		</table>
@endif
</div>
</main>
@endsection