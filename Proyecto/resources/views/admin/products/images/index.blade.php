@extends('layouts.app')

@section('body-class','product-page')

@section('title','imagenes de productos')

@section('content')
<div class="wrapper">
        <div class="header header-filter" style="background-image:url('{{asset('img/banner.jpg')}}')">

        </div>

		<div class="main main-raised">
			<div class="container">

	        	<div class="section text-center">
                <h2 class="title">Imagenes del producto "{{$product->name}}"</h2>

                    <div class="panel panel-default">
                        <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            {{csrf_field() }}
                            <input type="file" name="photo" required>
                            <button type="submit"  class="btn btn-primary btn-round">subir nueva imagen</button>
                            <a href="{{url('admin/products')}}" class="btn btn-default btn-round">volver al listado</a>
                        </form>
                    </div>
                </div>

                <hr>
                    <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <img src="{{$image->url}}" width="250">
                                    <form method="post" action="">

                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                                    <input type="hidden" name="image_id" value="{{$image->id}}">


                            <button type="submit"  class="btn btn-danger btn-round">eliminar imagen</button>

                           @if($image->featured)
                                <button  type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada actualmente">
                                    <i class="material-icons">favorite</i>
                                </button>
                           @else
                                <a href="{{url('/admin/products/'.$product->id.'/images/select/'.$image->id)}}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">favorite</i>
                                </a>
                            @endif
                        </form>

                                </div>
                            </div>
                        </div>

                    @endforeach
                    </div>
	            </div>
	        </div>
		</div>

     @include('includes.footer')
	</div>
@endsection
