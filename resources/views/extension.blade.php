
 @extends('layouts.base')


@section('title1', "Ecran 4 : extension")
@section('title2', "Détails d'une extension ")

@section('content')

<main class="col-md col-lg border " role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
<table  class="table text-white col-sm">
            <thead>
                <tr class="thead " >
                    <th scope="col"> environnement  </th>
                    <th scope="col"> non de l'instance  </th>
                    <th scope="col"> version de l'extension dans l'instance</th>
                    <th scope="col"> extension actif   </th>
                    <th scope="col">a jour </th>
                </tr>
            </thead>
					<tbody>
                        @forelse ($extension->instances as $inst )
                            <tr>
                                <td> {{$inst->serveur->environnement->abreviation }}  </td>
                                <td> <a href="{{ url('instance', [$inst->id, 1] ) }}" class="text-warning">{{ $inst->nom }}</a> </td>
                                <td> {{ $extension->version_ext }} </td>
                                <td> oui / non </td>
                                <td> oui / non </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" >
                                    pas de détails disponibles
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
</table>

</div>
        </div>
    </div>
</main>
 @endsection


