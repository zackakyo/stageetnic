            
            <main class="col-lg col-md border">
                <div class="single_service wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".5s">
            
                    <h2>Les versions de TYPO3 <a href="{{ route('typo3.create') }}" class="btn btn-info">Ajouter</a> </h2>

                        <table class="table" >
    <thead>
        <tr>
            <th>
                version courte
            </th>
            <th>
                version complète
            </th>
            <th colspan="2">
                Actions 
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($typo3s as $typo3)
        <tr>
            <td>
                {{ $typo3->version_courte }}  
            </td>
            <td>
                {{ $typo3->version_complete }}  
            </td>
            <td>
                <a href="{{ route('typo3.edit', $typo3->id) }}" class="btn btn-success" > modifier</a>
            </td>
            <td>
                <form method="post" class="form" action="{{ Route('typo3.destroy', $typo3->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" >Supprimer</button>
        </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3" class="" >Aucune version de typo3 n'est disponible</td>
            </tr>
        @endforelse
    </tbody>
</table>                                                                        
</div>
</main>