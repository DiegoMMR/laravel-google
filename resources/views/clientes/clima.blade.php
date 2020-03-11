@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{$cliente->nombre}}</div>

                <div class="card-body">

                    <b>Nombre: </b> {{$cliente->nombre}} <br>
                    <b>Ubicacion: </b> {{$cliente->ubicacion}} <br>
                    <b>Fecha: </b> {{ \Carbon\Carbon::now(new DateTimeZone('America/Guatemala'))->format('d/m/Y h:i a')}} <hr>
                    <b>Clima: </b> <span style="text-transform: capitalize;">{{ $clima->weather[0]->description }}</span> <br>
                    <b>Temperatura: </b> {{ $clima->main->temp - 273.15}}° C<br>
                    <b>Velocidad del viento: </b> {{ $clima->wind->speed  }} m/s<br>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
