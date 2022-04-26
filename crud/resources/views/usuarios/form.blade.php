@if(count($errors)>0)
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif



<form class="form-inline">
<div class="form-group">
  <div class="form-group mb-2">
  <label for="Correo">Correo</label>
    <input type="text" name="correo" value="{{isset($usuario->correo)?$usuario->correo:''}}" id="correo">
  </div>

  <button type="submit" class="btn btn-primary mb-2">Guardar</button>
</div>
</form>