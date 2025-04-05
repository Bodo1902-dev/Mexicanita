@extends('layout.main_template')

@section('section_Main')

<h2 class="display-3">Detalles del producto</h2>

<h3>Producto: {{$product->name_product}} </h3>
<h3>Cantidad:{{$product->stock}} </h3>
<h3>Precio: {{$product->unit_price}}</h3>
<h3>Imagen: {{$product->image}} </h3>
{{-- todo mostrar imagen  --}}
<a type="submit" class="btn btn-info" href="{{route("products.index")}}">Regresar</a>

@endsection