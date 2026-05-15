@extends('layouts.pem-public')

@section('title', 'Prueba de layout')

@section('content')
<div class="container-pem section-pad" style="text-align:center;">
    <h1 style="font-family:var(--pem-font-display);font-size:42px;color:var(--pem-navy);margin-bottom:16px;">
        Funciona 🎉
    </h1>
    <p style="color:var(--pem-gris);font-size:16px;">Si ves esto con la nav arriba y el footer abajo, el layout está listo.</p>
    <a href="#" class="btn btn-primary" style="margin-top:24px;">Botón primario</a>
    <a href="#" class="btn btn-outline" style="margin-top:24px;">Botón outline</a>
</div>
@endsection