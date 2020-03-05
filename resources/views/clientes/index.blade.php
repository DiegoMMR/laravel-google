@extends('layouts.app')
@section('title', 'Clientes')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Clientes
                    <a class="btn btn-success btn-sm float-right" href="{{ route('clientes.create') }}">Crear Cliente</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->ubicacion }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('clientes.show', $cliente->id) }}">Mostrar</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                        </td>
                        </tr>
                    @endforeach

                    </tbody>
                    </table>

                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
