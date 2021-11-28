
 @extends('layouts.base')


@section('title1', "Ecran 1 : Accueil")
@section('title2', "Liste des sites ")
    
@section('content')

<main class="col-md col-lg border " role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">

<table border="1px" class="col-sm" >
	<thead>
		<tr>
			<th scope="col">Environnement</th>
			<th scope="col">Serveur</th>
			<th scope="col">Instance</th>  
			<th scope="col">Site</th>  
			<th scope="col">En production</th>  
			<th scope="col">Création</th>  
		</tr>
	</thead>
	<tbody>
		@forelse($environnements as $env)
			<tr>
				<td>{{$env->abreviation}}</td>
				<td>aaaaa</td>
				<td> <a href="{{ Route('instance.index', 1) }}">détails de l'instance</a> </td>
				<td> <a href="/site/">détails site</a> </td>
				<td>aaaaa</td>
				<td>aaaaa</td>
			</tr>	
		@empty
			aucun environnement n'est disponible 
		@endforelse
	</tbody>
</table>

</div>
        </div>               
    </div>
</main>
@endsection


