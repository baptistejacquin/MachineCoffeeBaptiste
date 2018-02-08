<form action="boissonRecette" method="POST" name="Formumlaire">
{{ csrf_field() }}

<!-- Form Name -->
    <legend>Ajout boissons</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="boisson">Ajout Boisson</label>  
      <div class="col-md-12">
      <input id="boisson" name="boisson" type="text" placeholder="Nom Boisson" class="form-control input-md" required="">
        
      </div>
    </div>

       <!-- Text input-->
    <div class="formulaireboisson">
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-12 control-label" for="codeboisson">Code</label>
          <div class="col-md-12">
          <input id="codeboisson" name="codeboisson" type="text" placeholder="Code de la boisson" class="form-control input-md" required="">

          </div>
        </div>

    <!-- Text input-->
    <div class="formulaireboisson">
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-12 control-label" for="prixboisson">Prix</label>
          <div class="col-md-12">
          <input id="prixboisson" name="prixboisson" type="text" placeholder="Prix de la boisson" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-12 control-label" for="valider"></label>
          <div class="col-md-12">
            <button class="btn btn-success" type="submit">Valider</button>
          </div>
        </div>
    </div>

</form>


