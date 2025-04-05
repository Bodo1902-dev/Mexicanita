@extends('layout.main_template')

@section('section_Main')
<h1 class="display-3">Catalogo de dulces mexicanos </h1>
<table class="table">
    <thead>
         <th>Nombre del producto</th>
            <th>Marca</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
            <th>Fecha</th>
    </thead>     
        <tbody>
            @foreach ($products as $p )
            <tr>
                <td>{{$p->name_product}}</td>
                <td>{{$p->brand_id}}</td>
                <td>{{$p->stock}}</td>
                <td>{{$p->unit_price}}</td>
                <td><img src="/img/products/{{$p->image}}" width="80" alt="products" ></td>
                <td>
            <a class="btn btn-secondary" href="{{route("products.show",$p)}}"><i class="fa-sharp fa-solid fa-circle-info"></i> Detalles</a>
            <a class="btn btn-warning" href="{{route("products.edit",$p)}}"><i class="fa-sharp fa-solid fa-pen-to-square"></i> Editar</a>
            <a type="button" class="btn btn-danger" href="{{route("products.delete",$p)}}"><i class="fa-solid fa-trash-can"></i> Eliminar</a>
            {{--  <form action="{{route('products.destroy',$p)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">
                 <i class="fa-sharp fa-solid fa-trash"></i> Eliminar
                </button>
                
            </form>--}}
                
            </td> 
            <td>{{$p->created_at->format('d/M/Y H:i a')}}</td> 
            </tr>
            @endforeach
        </tbody>
    
</table>
{{$products->links()}} 

@endsection