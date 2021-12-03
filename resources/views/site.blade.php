
 @extends('layouts.base')


@section('title1', "Ecran 3 : site")
@section('title2', "Détails du site ")

@section('content')

<div class="row" >

<main class="col-md col-lg border " role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
<table class="table text-white col-sm">
            <thead class="">
                <tr>
                    <th scope="col">Domaine principal </th>
                    <th scope="col">  nom du site </th>
                    <th scope="col">Prefix site </th>
                    <th scope="col">id pag acceuil </th>
                    <th scope="col">nom pag accueil </th>
                    <th scope="col">En prod </th>
                    <th scope="col"> date création Pg Ac </th>
                </tr>
            </thead>
					<tbody>

						<tr>
							<td> {{ $site->domaine }} </td>
							<td> {{ $site->nom }} </td>
							<td> {{ $site->prefixe }} </td>
							<td>{{ $site->root_id }} </td>
							<td> {{ $site->nom }} </td>
							<td> oui / non  </td>
							<td> {{ $site->root_crdate }} </td>
						</tr>
                    </tbody>
    </table>
</div>
</main>
</div>

@endsection
