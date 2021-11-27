
 @extends('layouts.base')


@section('title', "Ecran 4 : extension ")
    
@section('left')
<table border="1px" class="col-sm" >
			<caption>detail de l'extension </caption>
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
        </table

 @endsection


