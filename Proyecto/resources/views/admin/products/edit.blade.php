@extends('layouts.app')

@section('body-class','product-page')

@section('title','Bienvenido a Perfums And Rose')

@section('content')
<div class="wrapper">
        <div class="header header-filter" style="background-image:url('{{asset('img/banner.jpg')}}')">

        </div>

		<div class="main main-raised">
			<div class="container">


	        	<div class="section ">
	                <h2 class="title text-center">Editar producto seleccionado</h2>

                <form action="{{url('/admin/products/'.$product->id.'/edit')}}" method="post">

                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio del producto</label>
                            <input type="number" step="0.01" class="form-control" name="price" value="{{$product->price}}">
                        </div>
                    </div>
                </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                        <label class="control-label">Descripción corta</label>
                                        <input type="text" class="form-control" name="description" value="{{$product->description}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Categoría del producto</label>
                                            <select class="form-control" name="category_id" >
                                                <option value="0">General</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}" @if($category->id == old('category_id', $product->category_id)) selected @endif>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                            </div>
                <textarea class="form-control" placeholder="descripción extensa del producto" rows="5" name="long_description" >{{$product->long_description}}</textarea>
                <button class="btn btn-primary">guardar cambios</button>
                    <a href="{{url('/admin/products')}}" class="btn btn-default">Cancelar Cambios</a>

                </form>

	            </div>



	        </div>

		</div>

        @include('includes.footer')

	</div>
@endsection
