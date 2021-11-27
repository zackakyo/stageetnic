
        <div class="col-sm align-items-center justify-content-center text-center">
<h2>Les versions de PHP <a href="{{ route('php.create') }}" class="btn btn-info">Ajouter</a> </h2>
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
        @forelse ($phps as $php)
        <tr>
            <td>
                {{ $php->version }}  
            </td>
            <td>
                <a href="{{ route('php.edit', $php->id) }}" class="btn btn-success" > modifier</a>
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