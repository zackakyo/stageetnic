            
            <main class="col-lg col-md border">
                <div class="single_service wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".5s">
            
                    <h2>Les versions de SOLR <a href="{{ route('solr.create') }}" class="btn btn-info">Ajouter</a> </h2>

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
        @forelse ($solrs as $solr)
        <tr>
            <td>
                {{ $solr->version }}  
            </td>
            <td>
                <a href="{{ route('solr.edit', $solr->id) }}" class="btn btn-success" > modifier</a>
            </td>
            <td>
                <form method="post" class="form" action="{{ Route('solr.destroy', $solr->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" >Supprimer</button>
        </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3" class="" >Aucune version de solr n'est disponible</td>
            </tr>
        @endforelse
    </tbody>
</table>                                                                        
</div>
</main>