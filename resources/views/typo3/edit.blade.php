
<aside class="col-md col-lg border " role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="text-center boxed-btn" >Modifier</h2>
                <hr>
                <div class="form border border-warning" >
                                <div class="col-lg-8">
                                <form method="post" class="form " action="{{ Route('typo3.update', $typo3->id) }}" novalidate="novalidate">
        
        @method('PATCH')
        @csrf
                <div class="form-group d-flex " >
                        <label for="version_courte">version courte</label>
                        <input type="text" id="version_courte" name="version_courte" class="form-control" placeholder="version_courte" value="{{ $typo3->version_courte }}" required  >
                 </div>   
                <div class="form-group d-flex " >
                        <label for="version_complete">version complete</label>
                        <input type="text" id="version_complete" name="version_complete" class="form-control" placeholder="version complete" value="{{ $typo3->version_complete }}" required  >
                 </div>   
                <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm btn_4 boxed-btn4 btn btn-primary">Mettre à jour</button>
                </div>
        </form>
                        </div>
                </div>
                        
        </div>
</aside²>