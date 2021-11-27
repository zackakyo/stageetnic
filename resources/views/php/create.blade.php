
        <div class="col-sm align-items-center justify-content-center">


<h2>Ajouter une version de php</h2>
<form method="post" class="form" action="{{ Route('php.store') }}">
        
@csrf
        
        <div class="form-group" >
                <label for="version">version</label>
                <input type="text" id="version" name="version" class="form-control" aria-placeholder="version" required  >
         </div>
        
        <button type="submit" class="btn btn-primary" >Ajouter</button>
</form>

</div>