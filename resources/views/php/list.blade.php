            
            <main class="col-lg col-md border">
                <div class="single_service wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".5s">
            
                    <h2 class="text-white">Les versions de PHP <a href="{{ route('php.create') }}" class="btn btn-success btn-lg">Ajouter</a> </h2>

                        <table class="table table-striped text-white" >
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
        @forelse ($phps as $php)
        <tr>
            <td>
                {{ $php->version }}  
            </td>
            <td>
                <a href="{{ route('php.edit', $php->id) }}" class="btn btn-warning" > modifier</a>
            </td>
            <td>
                <form method="post" class="form" action="{{ Route('php.destroy', $php->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" >Supprimer</button>
        </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3" class="" >Aucune version de php n'est disponible</td>
            </tr>
        @endforelse
    </tbody>
</table>                                                                        
</div>
</main>