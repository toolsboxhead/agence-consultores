<x-platform title="Tabla">
    <div>
        <form action="{{ route('datosview') }}" method="POST">
            @csrf
            <label for="nombreUsuario">Codigo de Usuario</label>
            <input type="text" name="nombreUsuario" id="nombreUsuario">
            <button type="submit">Enviar</button>

        </form>
        <h1>Datos del Usuario1</h1>
        <ul>
            @if (isset($datos))
                @foreach ($datos as $dato)
                    <li>Codigo : {{ $dato->co_usuario }},</li>
                    <li>Nombre : {{ $dato->no_usuario }}</li>
                @endforeach
            @else
                <p>No hay datos disponibles actualmente.</p>
            @endif

        </ul>
        {{--     {{ $datos['nombre'] }}
        </ul>
        <ul>{{ $datos['correo'] }}</ul> --}}

    </div>
</x-platform>
