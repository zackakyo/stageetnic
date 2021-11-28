
<aside class="col-md col-lg border " role="main" >
        <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <h2 class="text-center boxed-btn" >Ajouter</h2>
                <hr>
                <div class="form" style="max-height: 10px;">
                                <div class="col-lg-8">

<form method="post" class="form" action="{{ Route('typo3.store') }}">
        
@csrf
        
        <div class="form-group" >
                <label for="version_courte">version courte</label>
                <input type="text" id="version_courte" name="version_courte" class="form-control" aria-placeholder="version courte" required  >
         </div>
        <div class="form-group" >
                <label for="version_complete">version complete</label>
                <input type="text" id="version_complete" name="version_complete" class="form-control" aria-placeholder="version complete" required  >
         </div>
        
        <button type="submit" class="btn btn-primary" >Ajouter</button>
</form>
</div>
                </div>
                        
        </div>
</aside²>




<div class="container text-center">
    <h1 class="display-2 mb-4"> @yield('title') </h1>
    
  </div>
</div>		<section id="gtco-who-we-are" class="bg-white">


<div class="container-fluid">
    <div class="row">
            @section('left')
            
            @show
    
            @section('right')
            
            @show
        
    </div>
</div>