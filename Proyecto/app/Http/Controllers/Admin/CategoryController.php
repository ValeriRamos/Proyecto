<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;

class CategoryController extends Controller
{
    public function index (){
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories')); //listado

    }
    public function create (){
        return view('admin.categories.create');//formulario de registro

    }
    public function store(Request $request){
                    //reistrar el nuevo producto en la bd
        $messages=[
        'name.required'=>'Es necesario ingresa un nombre para la categoria ',
        'name.min'=>'El nombre de la categoría debe tener al menos 3 caracteres',
        'description.max'=>'la descripción corta solo damite hasta 200 caracteres',
        ];

        $rules=[
            'name'=>'required|min:3',
            'description'=>'max:250',
        ];

        $this ->validate($request, $rules, $messages);
        //registrar nueva categoria en la base de datos
      $category = Category::create($request->only('name','description'));

      if($request->hasFile('image')){

            //guarda im nuestro proyecto
            $file=$request->file('image');
            $path = public_path(). '/images/categories';
            $fileName =uniqid(). $file->getClientOriginalName();
            $moved = $file ->move($path, $fileName);



            //update

            if($moved){
                $category->image = $fileName;
                $category->save();

            }

      }

        return redirect('/admin/categories'); //rut para redirigir

    }

    public function edit (Category $category){

        return view('admin.categories.edit')->with(compact('category'));//formulario de registro
    }
    public function update(Request $request,Category $category){
                    //registrar el nuevo producto en la bd

        //dd($request->all());
        $messages=[
            'name.required'=>'Es necesario ingresa un nombre para la categoria ',
            'name.min'=>'El nombre de la categoría debe tener al menos 3 caracteres',
            'description.max'=>'la descripción corta solo damite hasta 200 caracteres',
            ];

            $rules=[
                'name'=>'required|min:3',
                'description'=>'max:250',
            ];

       $category->update($request->only('name','description'));

       if($request->hasFile('image')){

        //guarda im nuestro proyecto
        $file=$request->file('image');
        $path = public_path(). '/images/categories';
        $fileName =uniqid(). $file->getClientOriginalName();
        $moved = $file ->move($path, $fileName);



        //update
        if($moved){
            $previousPath =$path . '/'. $category->image;
            $category->image = $fileName;
            $saved= $category->save();

            if($saved)
                 File::delete($previousPath);

        }

  }

        return redirect('/admin/categories'); //rut para redirigir

    }

    public function destroy (Category $category){
        $category->delete(); //metodo que se encarga de eliminar en la tabla de productos

        return back();//rut para redirigir

    }

}
