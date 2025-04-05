<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(3);
        // $products=Product::get();
        return view('admin/products/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $brands = Brand::get('id','brand');//para obtener los datos de un modelo o tabla
        $brands = Brand::pluck('id','brand');//obtener datos especificos de un modelo o tabla
        // dd($brands);//verificar que los datos que se extraen son correctos
     return view('admin/products/create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $request->validate([ //validacion directa
            'name_product'=>'required|min:5|max:50',
            'brand_id'=>'required|integer',
            'stock'=>'required|integer',
            'unit_price'=>'required|decimal:2,4',
            'image'=>'required'

        ]);

        //guardar imagen antes de generar el registro en la base de datos 
        $data=$request->all(); //guardamos los datos en una variable para manipularlos
        //condicion si el campo imagen tiene informacion 
        if (isset($data["image"])) {
            //cambiar el nombre del archivo que se guardará

            $data["image"]=$filename=time().".".$data["image"]->extension();
            //guardar el nombre original de la imagen
            $request->image->move(public_path("img/products"),$filename);

        }
        
        Product::create($data);
        return to_route('products.index')-> with ('success','Producto Registrado');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin/products/show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands =Brand::Pluck('id','brand');
        return view('admin/products/edit',compact('product','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {

        // $request->validate([ //validacion directa
        //     'name_product'=>'required|min:5|max:50',
        //     'brand_id'=>'required|integer',
        //     'stock'=>'required|integer',
        //     'unit_price'=>'required|decimal:2,4',
        //     'image'=>'required'

        // ]);

            $data=$request->all();

            if (isset($data["image"])) {
            $data["image"]=$filename=time().".".$data["image"]->extension();
            $request->image->move(public_path("img/products"),$filename);
              }
                
     $product->update($data);//actualizar en la bd a traves del modelo
     return to_route('products.index')-> with ('success','Producto Actualizado');
    
    }

    public function delete(Product $product){
        echo view('admin/products/delete',compact('product'));

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')-> with ('notsuccess','Producto Eliminado');

    }
}
