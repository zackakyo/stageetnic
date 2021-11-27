
<div class="col-sm align-items-center justify-content-center">


<h2>Modifier une version php </h2>
<form method="post" class="form" action="{{ Route('php.update', $php->id) }}">
        
@method('PATCH')
@csrf
        
        <div class="form-group" >
                <label for="version">version</label>
                <input type="text" id="version" name="version" class="form-control" placeholder="version" value="{{ $php->version }}" required  >
         </div>
        
        <button type="submit" class="btn btn-primary" >Mettre à jour</button>
</form>

</div>