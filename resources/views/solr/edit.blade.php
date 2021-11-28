
<aside class="col-md col-lg border " role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="text-center boxed-btn" >Modifier</h2>
                <hr>
                <div class="form border border-warning" >
                                <div class="col-lg-8">
                                <form method="post" class="form " action="{{ Route('solr.update', $solr->id) }}" novalidate="novalidate">
        
        @method('PATCH')
        @csrf
                <div class="form-group d-flex " >
                        <label for="version">version</label>
                        <input type="text" id="version" name="version" class="form-control" placeholder="version" value="{{ $solr->version }}" required  >
                 </div>   
                <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm btn_4 boxed-btn4 btn btn-primary">Mettre à jour</button>
                </div>
        </form>
                        </div>
                </div>
                        
        </div>
</aside²>