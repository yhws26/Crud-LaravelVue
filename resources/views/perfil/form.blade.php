
<h1>{{ $modo }} perfil</h1>

<label for="fotoPerfil">Foto de Perfil</label>
@if(isset($perfil->fotoPerfil))
<img src="{{ asset('storage').'/'.$perfil->fotoPerfil }}" width="100" alt="">
@endif
<br>
<input type="file" name="fotoPerfil" id="fotoPerfil">
<br>
<label for="fotoLicencia">Foto de Licencia</label>
@if(isset($perfil->fotoLicencia))
<img src="{{ asset('storage').'/'.$perfil->fotoLicencia }}" width="100" alt="">
@endif
<br>
<input type="file" name="fotoLicencia" id="fotoLicencia">
<br>
<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" value="{{isset($perfil->Nombre)?$perfil->Nombre:''}}" id="Nombre">
<br>
<label for="Apellido">Apellido</label>
<input type="text" name="Apellido" value="{{isset($perfil->Apellido)?$perfil->Apellido:''}}" id="Apellido">
<br>
<label for="Cedula">Cedula</label>
<input type="number" name="Cedula" value="{{isset($perfil->Cedula)?$perfil->Cedula:''}}" id="Cedula">
<br>
<label for="fechaNacimiento">Fecha de Nacimiento</label>
<input type="date" name="fechaNacimiento" value="{{isset($perfil->fechaNacimiento)?$perfil->fechaNacimiento:''}}" id="fechaNacimiento"> 
<br>
<label for="numeroLicencia">Numero de Licencia</label>
<input type="number" name="numeroLicencia" value="{{isset($perfil->numeroLicencia)?$perfil->numeroLicencia:''}}" id="numeroLicencia">
<br>
<label for="fechaVencimiento">Fecha de Vencimiento</label>
<input type="date" name="fechaVencimiento" value="{{isset($perfil->fechaVencimiento)?$perfil->fechaVencimiento:''}}" id="fechaVencimiento">
<br>
<input type="submit" value="{{ $modo }} Datos">
<br>
<a href="{{ url('perfil/')}}">Regresar</a>
