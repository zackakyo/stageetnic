            
            <main class="col-lg col-md border">
                <div class="single_service wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".5s">
            
                    <h2>Les versions de MYSQL <a href="{{ route('mysql.create') }}" class="btn btn-info">Ajouter</a> </h2>

                        <table class="table" >
    <thead>
        <tr>
            <th>
                version 
            </th>
            <th colspan="2">
                Actions 
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mysqls as $mysql)
        <tr>
            <td>
                {{ $mysql->version }}  
            </td>
            <td>
                <a href="{{ route('mysql.edit', $mysql->id) }}" class="btn btn-success" > modifier</a>
            </td>
            <td>
                <form method="post" class="form" action="{{ Route('mysql.destroy', $mysql->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" >Supprimer</button>
        </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3" class="" >Aucune version de mysql n'est disponible</td>
            </tr>
        @endforelse
    </tbody>
</table>                                                                        
</div>
</main>