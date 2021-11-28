
<aside class="col-md col-lg border" role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="text-center text-white font-weight-bold" >Modifier</h2>
                <hr>
                <div class="form mb-3">
                        <div class="col-lg-8">
                                <form method="post" class="form" action="{{ Route('typo3.update', $typo3->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group" >
                                                <label for="version_courte" class="text-white font-weight-bold" >version courte</label>
                                                <input type="text" id="version_courte"  name="version_courte" class="form-control" aria-placeholder="version courte" value="{{ $typo3->version_courte }}" required  >
                                        </div>
                                        <div class="form-group" >
                                                <label for="version_complete" class="text-white font-weight-bold" >version complete</label>
                                                <input type="text" id="version_complete"  name="version_complete" class="form-control" aria-placeholder="version complete" value="{{ $typo3->version_complete }}" required  >
                                        </div>
                                        <div class="form-group">                                    
                                                <button type="submit" class="btn btn-warning mb-4" >Mettre à jour</button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>

</aside²>