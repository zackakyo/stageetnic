
 @extends('layouts.base')


@section('title1', "Ecran 4 : extension")
@section('title2', "Détails d'une extension ")
    
@section('content')

<main class="col-md col-lg border " role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
<table border="1px" class="col-sm" >
            <thead>
                <tr>
                    <th scope="col"> environnement  </th>
                    <th scope="col"> non de l'instance  </th>
                    <th scope="col"> version de l'extension dans l'instance  </th>
                    <th scope="col"> extension actif   </th>
                    <th scope="col">a jour </th>
                </tr>
            </thead>
					<tbody>
						<tr>
							<td> xxxxxxx  </td>
							<td> <a href="/instance/">qoimmd</a> </td>
							<td> 5.0.1 </td>
							<td> oui / non </td>
							<td> oui / non </td>
						</tr>	
                    </tbody>
</table>

</div>
        </div>               
    </div>
</main>
 @endsection


