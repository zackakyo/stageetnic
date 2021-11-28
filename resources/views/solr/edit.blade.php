
<aside class="col-md col-lg border" role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="text-center text-white font-weight-bold" >Modifier</h2>
                <hr>
                <div class="form mb-3">
                        <div class="col-lg-8">
                                <form method="post" class="form" action="{{ Route('solr.update', $solr->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group" >
                                                <label for="version" class="text-white font-weight-bold" >version</label>
                                                <input type="text" id="version"  name="version" class="form-control" aria-placeholder="version" value="{{ $solr->version }}" required  >
                                        </div>
                                        <div class="form-group">                                    
                                                <button type="submit" class="btn btn-warning mb-4" >Mettre à jour</button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>

</aside²>