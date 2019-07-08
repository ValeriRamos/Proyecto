<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index (){
        $products =Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado

    }
    public function create (){
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));//formulario de registro

    }
    public function store(Request $request){
                    //reistrar el nuevo producto en la bd


        $messages=[
        'name.required'=>'Es necesario ingresa un nombre para el producto',
        'name.min'=>'El nombre del producto debe tener al menos 3 caracteres',
        'description.required'=>'Es necesario ingresar  la decripción corta del producto',
        'description.max'=>'la descripción corta solo damite hasta 200 caracteres',
        'price.required'=>'el obligatorio definir este campo',
        'price.numeric'=>'Ingrese un precio válido',
        'price.min'=>'No se admiten valores negativos'


        ];

        $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0',


        ];


        $this ->validate($request, $rules, $messages);

        $product=new Product();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->long_description=$request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save(); //metodo que se encarga de inserrtar en la tabla de productos

        return redirect('/admin/products'); //rut para redirigir

    }

    public function edit ($id){
        $categories = Category::orderBy('name')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product','categories'));//formulario de registro
    }
    public function update(Request $request, $id){
                    //registrar el nuevo producto en la bd

        //dd($request->all());

        $product= Product::find($id);
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->long_description=$request->input('long_description');
        $product->category_id = $request->category_id;

        $product->save(); //metodo que se encarga de inserrtar en la tabla de productos

        return redirect('/admin/products'); //rut para redirigir

    }

    public function destroy ($id){

        $product= Product::find($id);
        $product->delete(); //metodo que se encarga de eliminar en la tabla de productos

        return back();//rut para redirigir

    }
}
