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
	                <h2 class="title text-center">Editar categoría seleccionado</h2>

                <form action="{{url('/admin/categories/'.$category->id.'/edit')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">Imagen de la categoría</label>
                        <input type="file"  name="image" >
                        @if ($category->image)
                        <p class="help-blok">Subir si desea reemplazar la
                        <a href="{{asset('/images/categories/'.$category->image)}}" target="_blank"> imagen actual
                        </a></p>
                        @endif
            </div>

                </div>
                <textarea class="form-control" placeholder="Descripción corta" rows="5" name="description" >{{$category->description}}</textarea>
                <button class="btn btn-primary">guardar cambios</button>
                    <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar Cambios</a>

                </form>

	            </div>



	        </div>

		</div>

        @include('includes.footer')

	</div>
@endsection
