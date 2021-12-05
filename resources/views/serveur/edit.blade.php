
<aside class="col-md col-lg border" role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="text-center text-white font-weight-bold" >Modifier</h2>
                <hr>
                <div class="form mb-3">
                        <div class="col-lg-8">
                                <form method="post" class="form" action="{{ Route('serveur.update', $serveur->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group" >
                                                <label for="nom" class="text-white font-weight-bold" >nom</label>
                                                <input type="text" id="nom"  name="nom" disabled="disabled" class="nom" aria-placeholder="nom" value="{{ $serveur->nom }}" required  >
                                        </div>
                                        <div class="form-group" >
                                                <label for="adresse_ip" class="text-white font-weight-bold" >adresse IP</label>
                                                <input type="text" id="adresse_ip"  name="adresse_ip" class="form-control" aria-placeholder="adresse IP" value="{{ $serveur->adresse_ip }}" required  >
                                        </div>
                                        <div class="form-group" >
                                                <label for="version_redhat" class="text-white font-weight-bold" >vs redhat</label>
                                                <input type="text" id="version_redhat"  name="version_redhat" class="form-control" aria-placeholder="vs redhat" value="{{ $serveur->version_redhat }}" required  >
                                        </div>
                                        <div class="form-group" >
                                                <label for="version_apache" class="text-white font-weight-bold" >vs apache</label>
                                                <input type="text" id="version_apache"  name="version_apache" class="form-control" aria-placeholder="vs apache" value="{{ $serveur->version_apache }}" required  >
                                        </div>
                                        <div class="form-group" >
                                                <label for="environnement" class="text-white font-weight-bold" >environnement</label>
                                                <input type="text" id="environnement"  name="environnement" class="form-control" aria-placeholder="environnement" disabled="disabled" value="{{ $serveur->environnement->abreviation }}" required  >
                                        </div>

                                        <fieldset class="form-group border p-3" >
                                            <legend class="w-auto text-white font-weight-bold px-2" >Version PHP</legend>
                                            @forelse (App\models\Php::all() as $php )
                                                <div class="form-check form-check-inline">
                                                    <input id="php-{{$php->id}}" type="checkbox"
                                                    @forelse ($serveur->phps as $sphp)
                                                    @if($php->id == $sphp->id) checked @endif
                                                    @empty
                                                    @endforelse
                                                    class="form-check-input" name="phps[]" value="{{$php->id}}">
                                                    <label for="php-{{$php->id}}" class="form-check-label text-white font-weight-bold" >{{$php->version}}</label>
                                                </div>
                                            @empty
                                                <p>
                                                    aucune version de php n'est disponible
                                                </p>
                                            @endforelse
                                        </fieldset>
                                        <fieldset class="form-group border p-3" >
                                            <legend class="w-auto text-white font-weight-bold px-2" >Version Mysql</legend>
                                            @forelse (App\models\Mysql::all() as $mysql )
                                                <div class="form-check form-check-inline">
                                                    <input id="mysql-{{$mysql->id}}" type="checkbox"
                                                    @forelse ($serveur->mysqls as $smysql)
                                                    @if($mysql->id == $smysql->id) checked @endif
                                                    @empty
                                                    @endforelse
                                                    class="form-check-input" name="mysqls[]" value="{{$mysql->id}}">
                                                    <label for="mysql-{{$mysql->id}}" class="form-check-label text-white font-weight-bold" >{{$mysql->version}}</label>
                                                </div>
                                            @empty
                                                <p>
                                                    aucune version n'est disponible
                                                </p>
                                            @endforelse
                                        </fieldset>
                                        <fieldset class="form-group border p-3" >
                                            <legend class="w-auto text-white font-weight-bold px-2" >Version Solr</legend>
                                            @forelse (App\models\Solr::all() as $solr )
                                                <div class="form-check form-check-inline">
                                                    <input id="solr-{{$solr->id}}" type="checkbox"
                                                    @forelse ($serveur->solrs as $ssolr)
                                                    @if($solr->id == $ssolr->id) checked @endif
                                                    @empty
                                                    @endforelse
                                                    class="form-check-input" name="solrs[]" value="{{$solr->id}}">
                                                    <label for="solr-{{$php->id}}" class="form-check-label text-white font-weight-bold" >{{$solr->version}}</label>
                                                </div>
                                            @empty
                                                <p>
                                                    aucune version de solr n'est disponible
                                                </p>
                                            @endforelse
                                        </fieldset>
                                        <div class="form-group">
                                                <button type="submit" class="btn btn-warning mb-4" >Mettre à jour</button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>

</aside²>
