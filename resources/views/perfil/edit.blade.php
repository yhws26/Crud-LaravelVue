Formulario de edicion de usuarios
<hr>

{{-- CRUD | Editar --}}
<form action=" {{url('/perfil/'.$perfil->id)}} " method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('perfil.form',['modo'=>'Editar'])

</form>

