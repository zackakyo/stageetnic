
            <main class="col-lg col-md border">
                <div class="single_service wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".5s">

                    <h2 class="text-white">Gestion des instances </h2>

                        <table class="table table-striped text-white" >
    <thead>
        <tr>
            <th>
                Nom
            </th>
            <th>
                url backend
            </th>
            <th>
                typo3
            </th>
            <th>
                serveur
            </th>
            <th>
                Base de donnees
            </th>
            <th >
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($instances as $instance)
        <tr>
            <td>
                {{ $instance->nom }}
            </td>
            <td>
                {{ $instance->url_backend }}
            </td>
            <td>
                {{ $instance->typo3_id ? $instance->typo3->version_courte : "unk" }}
            </td>
            <td>
                {{ $instance->serveur->nom }}
            </td>
            <td>
                {{ $instance->base_de_donnees_id ? $instance->base_de_donnee->nom : "" }}
            </td>
            {{-- <td>
                @if($instance->typo3->version_courte)
                    {{ $instance->typo3->version_courte }}
                @else
                    unk
                @endif
            </td> --}}
            <td>
                <a href="{{ route('instanceb.edit', $instance->id) }}" class="btn btn-warning" > modifier</a>
            </td>
            {{-- <td>
                <form method="post" class="form" action="{{ Route('instanceb.destroy', $instance->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" >Supprimer</button>
        </form>
            </td> --}}
        </tr>
        @empty
            <tr>
                <td colspan="3" class="" >Aucune version de instance n'est disponible</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</main>
