
            <main class="col-lg col-md border">
                <div class="single_service wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".5s">

                    <h2 class="text-white">Les versions de serveur </h2>

                        <table class="table table-striped text-white" >
    <thead>
        <tr>
            <th>
                Nom
            </th>
            <th>
                IP
            </th>
            <th>
                redhat
            </th>
            <th>
                Apache
            </th>
            <th>
                EnvironnemenT
            </th>
            <th >
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($serveurs as $serveur)
        <tr>
            <td>
                {{ $serveur->nom }}
            </td>
            <td>
                {{ $serveur->adresse_ip }}
            </td>
            <td>
                {{ $serveur->version_redhat }}
            </td>
            <td>
                {{ $serveur->version_apache }}
            </td>
            <td>
                {{ $serveur->environnement->abreviation }}
            </td>
            {{-- <td>
                @if($serveur->typo3->version_courte)
                    {{ $serveur->typo3->version_courte }}
                @else
                    unk
                @endif
            </td> --}}
            <td>
                <a href="{{ route('serveur.edit', $serveur->id) }}" class="btn btn-warning" > modifier</a>
            </td>
            {{-- <td>
                <form method="post" class="form" action="{{ Route('serveur.destroy', $serveur->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" >Supprimer</button>
        </form>
            </td> --}}
        </tr>
        @empty
            <tr>
                <td colspan="3" class="" >Aucune version de serveur n'est disponible</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</main>
