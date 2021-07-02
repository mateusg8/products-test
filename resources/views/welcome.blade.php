@extends('layouts.app')

@section('content')
    <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-4">Teste de CRUD produtos</h1>
        <a class="btn btn-primary" type="button" href="{{route('products.index')}}"> Produtos </a>
    </div>
@endsection
