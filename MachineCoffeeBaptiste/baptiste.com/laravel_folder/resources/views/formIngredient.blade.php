<form action="{{route('PostIng')}}" method="POST" name="Formumlaire">
{{ csrf_field() }}

<!-- Form Name -->
    <legend>Ajout Ingrédients</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="boisson">Ajout Ingrédients</label>  
      <div class="col-md-12">
      <input id="ingredients" name="ingredients" type="text" placeholder="Nom Ingrédients" class="form-control input-md">
        
      </div>
    </div>

        <!-- Text input-->
    <div class="formulaireboisson">
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-12 control-label" for="codeboisson">Code</label>
          <div class="col-md-12">
          <input id="codeIngredient" name="codeIngredient" type="text" placeholder="Code de l'ingrédient" class="form-control input-md" required="">

          </div>
        </div>

    <!-- Text input-->
    <div class="formulaireboisson">
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-12 control-label" for="prixboisson">Prix</label>
          <div class="col-md-12">
          <input id="stockIngredient" name="stockIngredient" type="text" placeholder="Stock de l'ingrédient" class="form-control input-md" required="">

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