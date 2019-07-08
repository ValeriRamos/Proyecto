@extends('layouts.app')

@section('body-class','product-page')

@section('title','Listado de productos')

@section('content')
<div class="wrapper">
        <div class="header header-filter" style="background-image:url('{{asset('img/banner.jpg')}}')">

        </div>

		<div class="main main-raised">
			<div class="container">

	        	<div class="section text-center">
	                <h2 class="title">listado de Categorías</h2>

					<div class="team">
						<div class="row">
                        <a href="{{url('admin/categories/create')}}" class="btn btn-primary btn-round">Nueva categoria</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="col-md-2 text-center">Nombre</th>
                                        <th class="col-md-5 text-center">Descripción</th>
                                        <th>Imagen</th>
                                        <th class="text-right">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center">{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                        <img src="{{$category->featured_image_url}}" height="50">
                                        </td>
                                        <td class="td-actions text-right">


                                          <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                                            {{csrf_field() }}
                                            {{method_field('DELETE')}}

                                            <a type="button" rel="tooltip" title="Ver categoria" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-info"></i>
                                            </a>

                                            <a href="{{url('/admin/categories/'.$category->id.'/edit')}}" rel="tooltip" title="editar categoria" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" rel="tooltip" title="eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>

                                          </form>

                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                                {{$categories->links()}}
						</div>
					</div>

	            </div>



	        </div>

		</div>

     @include('includes.footer')
	</div>
@endsection
