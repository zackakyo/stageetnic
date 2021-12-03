
 @extends('layouts.base')


@section('title1', "Ecran 1 : Accueil")
@section('title2', "Liste des sites ")

@section('content')

<main class="col-md col-lg border " role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">

<table class="table table-hover text-white col-sm" >
	<thead class="thead">
		<tr class="font-weight-bold">
			<th scope="col">Environnement</th>
			<th scope="col">Serveur</th>
			<th scope="col">Instance</th>
			<th scope="col">Site</th>
			<th scope="col">En production</th>
			<th scope="col">Création</th>
		</tr>
	</thead>
	<tbody>
		@forelse($sites as $site)
			<tr>

				<td>{{ $site->instance->serveur->environnement->abreviation }}</td>
				<td>{{ $site->instance->serveur->nom }}</td>
				<td> <a href="{{ url('instance', [$site->instance_id, 1] ) }}" class="link text-warning">{{ $site->instance->nom }}</a> </td>
				<td> <a href="{{ Route('site.show', $site->id ) }}" class="link text-white" >{{ $site->nom }}</a> </td>
				<td>aaaaa</td>
				<td>{{ $site->root_crdate }}</td>
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


