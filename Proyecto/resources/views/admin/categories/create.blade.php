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
                    <h2 class="title text-center">Registrar nueva Categoría</h2>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
                        </ul>
                    </div>
                    @endif

                <form action="{{url('/admin/categories')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">

                                    <label class="control-label">Imagen de la categoría</label>
                                <input type="file"  name="image" >


                    </div>
                </div>
                <textarea class="form-control" placeholder="Descripción de la categoría" rows="5" name="description">{{old('long_description')}}</textarea>
                <button class="btn btn-primary">registrar categoría</button>
                <a href="{{url('/admin/categories')}}" class="btn btn-default" >Cancelar</a>

                </form>

	            </div>



	        </div>

		</div>

        @include('includes.footer')
	</div>
@endsection
