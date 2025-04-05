@extends('layout.main_template')

@section('section_Main')
<h1 class="display-3">Formulario de registro de dulces</h1>

<div class="container text-center">
    <div class="row">
      <div class="col">


      </div>
      <div class="col">
        {{--  @dump($errors->get('name_product'))  --}}
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data"> <!-- Guardar en base de datos-->
    <h1>Formulario de registro</h1>
    @csrf
    <div class="container-sm">
        <label class="form-label">Nombre del Producto</label>
        <input type="text" class="form-control" placeholder="Ingresar" name="name_product" value="{{old('name_product')}}">
        @error('name_product') @include('fragments.errorsv') @enderror
        <label class="form-label">Marca</label>
        <select class="form-select" aria-label="Default select example" name="brand_id">
            <option value="1">Selecciona...</option>
            @foreach ($brands as $brand=>$id)
                 <option value="{{$id}}">{{$brand}}</option> 
            @endforeach

          </select>
          @error('brand_id') @include('fragments.errorsv') @enderror
      </div>
      <div class="container-sm">
        <label class="form-label">Cantidad</label>
        <input type="number" class="form-control" placeholder="Ingresar" name="stock"  value="{{old('stock')}}">
        @error('stock') @include('fragments.errorsv') @enderror
      </div>
      
      <div class="container-sm">
        <label class="form-label">Precio Unitario</label>
        <input type="text" class="form-control" placeholder="Ingresar" name="unit_price"  value="{{old('unit_price')}}">
        @error('unit_price') @include('fragments.errorsv') @enderror
      </div>
      <div class="container-sm">
        <label class="form-label">Imagen</label>
        <input type="file" class="form-control" id="formFile" placeholder="Ingresar" name="image" value="{{old('image')}}">
        @error('image') @include('fragments.errorsv') @enderror
      </div>
      <button type="submit" class="btn btn-success">Registrar</button>
</form>

      </div>
      <div class="col">

    
      </div>
    </div>
  </div>

@endsection