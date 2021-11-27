
 @extends('layouts.base')


@section('title', "Ecran 2 : instance")
    
@section('left')
<table border="1px" class="col-sm" >
			<caption>liste des extensions : onglet 1 </caption>
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



<hr>

        
<table border="1px" class="col-sm" >
			<caption>liste des sites : onglet 2 </caption>
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

		@endsection
