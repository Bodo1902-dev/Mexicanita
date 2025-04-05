@extends('layout.main_template')

@section('section_Main')
<h1 class="display-3">Actualizar {{$product->name_product}}</h1>

<div class="container text-center">
    <div class="row">
      <div class="col">


      </div>
      <div class="col">
        
<form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data"> <!-- Guardar en base de datos-->
    <h1>Formulario de registro</h1>
    @csrf
    @method('PATCH');

    <div class="container-sm">
        <label class="form-label">Nombre del Producto</label>
        <input type="text" class="form-control" placeholder="Ingresar" name="name_product" value="{{$product->name_product}}"><br>
        <label class="form-label">Marca</label>
        <select class="form-select" aria-label="Default select example" name="brand_id">
            <option value="1">Selecciona...</option>
            @foreach ($brands as $brand=>$id)
                 <option {{$product->brand_id ==$id ? 'selected':'Error perra'}} value="{{$id}}">{{$brand}}</option> 
            @endforeach

          </select>
      </div>
      <div class="container-sm">
        <label class="form-label">Cantidad</label>
        <input type="number" class="form-control" placeholder="Ingresar" name="stock" value="{{$product->stock}}">
      </div>
      <div class="container-sm">
        <label class="form-label">Precio Unitario</label>
        <input type="text" class="form-control" placeholder="Ingresar" name="unit_price" value="{{$product->unit_price}}">
      </div>
      <div class="container-sm">
        <label class="form-label">Imagen</label>
        <input type="file" class="form-control" id="formFile" placeholder="Ingresar" name="image">
      </div>
      <button type="submit" class="btn btn-success">Guardar</button>
</form>

      </div>
      <div class="col">

    
      </div>
    </div>
  </div>

@endsection