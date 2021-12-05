
<aside class="col-md col-lg border" role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="text-center text-white font-weight-bold" >Modifier</h2>
                <hr>
                <div class="form mb-3">
                        <div class="col-lg-8">
                                <form method="post" class="form" action="{{ Route('instanceb.update', $instance->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group" >
                                                <label for="nom" class="text-white font-weight-bold" >nom</label>
                                                <input type="text" id="nom"  name="nom" disabled class="nom" aria-placeholder="nom" value="{{ $instance->nom }}" required  >
                                        </div>
                                        <div class="form-group" >
                                                <label for="url_backend" class="text-white font-weight-bold" >url backend</label>
                                                <input type="text" id="url_backend"  name="url_backend" class="form-control" aria-placeholder="url backend" value="{{ $instance->url_backend }}" required  >
                                        </div>
                                        <div class="form-group" >
                                                <label for="serveur" class="text-white font-weight-bold" >vs serveur</label>
                                                <input type="text" id="serveur"  name="serveur" class="form-control" aria-placeholder="serveur" value="{{ $instance->serveur->nom }}" disabled   >
                                        </div>
                                        <div class="form-group" >
                                                <label for="db" class="text-white font-weight-bold" >base de données</label>
                                                <input type="text" id="db"  name="db" class="form-control" disabled aria-placeholder="db" value="{{ $instance->base_de_donnees_id ? $instance->base_de_donnee->nom : "" }}" }}" required  >
                                        </div>
                                            <div class="form-group mb-3">
                                                <label for="typo3" class="text-white font-weignt-bold">Version Typo3 :</label>
                                                <select id="typo3" name="typo3" class="form-select ">
                                                    @forelse ( App\models\Typo3::all() as $typo3 )
                                                        @if( isset($instance->typo3_id) && $instance->typo3->id == $typo3->id )
                                                        {{ $ok = "ok" }}
                                                        <option value="{{ $instance->typo3->id }}" selected class="">{{ $instance->typo3->version_courte }}</option>
                                                        @else
                                                            <option value="{{ $typo3->id }}" class="" selected="">{{ $typo3->version_courte }}</option>
                                                        @endif
                                                    @empty
                                                    <option value="" selected="selected" disabled="disabled" class="">Encoder les versions de typo3</option>
                                                    @endforelse
                                                    @if(!isset($ok))<option value="" selected disabled > choose a version </option> @endif
                                                </select>
                                        </div>

                                        <div class="form-group">
                                                <button type="submit" class="btn btn-warning mb-4" >Mettre à jour</button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>

</aside²>
