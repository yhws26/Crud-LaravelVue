Mostrar listas de perfiles

@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif

<a href="{{ url('perfil/create')}}">Registrar nuevo perfil</a>

{{-- CRUD | Mostrar --}}
<table class="table table-light">

    <thead class="thread-light">
        <tr>
            <th>#</th>
            <th>Foto de Perfil</th>
            <th>Foto de Licencia</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Fecha de Nacimiento</th>
            <th>Numero de Licencia</th>
            <th>Fecha de Vencimiento</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach( $perfil as $usuario )
        <tr>
            <td> {{ $usuario->id }} </td>

            <td> 
            <img src="{{ asset('storage').'/'.$usuario->fotoPerfil }}" width="100" alt="">
            </td>

            <td>
            <img src="{{ asset('storage').'/'.$usuario->fotoLicencia }}" width="100" alt="">
            </td>

            <td> {{ $usuario->Nombre }} </td>
            <td> {{ $usuario->Apellido }} </td>
            <td> {{ $usuario->Cedula }} </td>
            <td> {{ $usuario->fechaNacimiento }} </td>
            <td> {{ $usuario->numeroLicencia }} </td>
            <td> {{ $usuario->fechaVencimiento }} </td>
            <td> 
            
            {{-- CRUD | Editar --}}
            <a href="{{ url('/perfil/'.$usuario->id.'/edit') }}">
                Editar
            </a>    
                
            | 

            {{-- CRUD | Borrar --}}
            <form action="{{ url('/perfil/'.$usuario->id ) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('Quieres borrar?')" 
                value="Borrar">
            
            </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>