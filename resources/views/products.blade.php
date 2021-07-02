@extends('layouts.app')

@section('content')
    <products-component
        v-bind:items="{{  json_encode($products) }}">
    </products-component>
@endsection
