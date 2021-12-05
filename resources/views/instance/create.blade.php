
<aside class="col-md col-lg border mb-3 " role="main" >
        <div class="single_service wow fadeInUp mb-3" data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="text-center text-white font-weight-bold" >Ajouter</h2>
                <hr>
                <div class="form mb-3">
                        <div class="col-lg-8">
                                <form method="post" class="form" action="{{ Route('serveur.store') }}">
                                        @csrf
                                        <div class="form-group" >
                                                <label for="version" class="text-white font-weight-bold" >version</label>
                                                <input type="text" id="version" name="version" class="form-control" aria-placeholder="version" required  >
                                        </div>

                                        <div class="form-group">
                                                <button type="submit" class="btn btn-success mb-4" >Ajouter</button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>

</aside²>
