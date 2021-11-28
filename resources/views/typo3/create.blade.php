
<aside class="col-md col-lg border mb-3 " role="main" >
        <div class="single_service wow fadeInUp mb-3" data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="text-center text-white font-weight-bold" >Ajouter</h2>
                <hr>
                <div class="form mb-3">
                        <div class="col-lg-8">
                                <form method="post" class="form" action="{{ Route('typo3.store') }}">
                                        @csrf
                                        <div class="form-group" >
                                                <label for="version_courte" class="text-white font-weight-bold" >version courte</label>
                                                <input type="text" id="version_courte" name="version_courte" class="form-control" aria-placeholder="version courte" required  >
                                        </div>
                                        <div class="form-group" >
                                                <label for="version_complete" class="text-white font-weight-bold" >version complete</label>
                                                <input type="text" id="version_complete" name="version_complete" class="form-control" aria-placeholder="version_complete" required  >
                                        </div>
                                        
                                        <div class="form-group">                                    
                                                <button type="submit" class="btn btn-success mb-4" >Ajouter</button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>

</aside²>
