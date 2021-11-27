
 @extends('layouts.base')


@section('title', "Ecran 1 : liste des sites")
    
@section('left')
<table border="1px" class="col-sm" >
	<caption>Details de chaque site:</caption>
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
				<td> <a href="{{ Route('instance.index') }}">détails de l'instance</a> </td>
				<td> <a href="/site/">détails site</a> </td>
				<td>aaaaa</td>
				<td>aaaaa</td>
			</tr>	
		@empty
			aucun environnement n'est disponible 
		@endforelse
	</tbody>
</table>
@endsection


