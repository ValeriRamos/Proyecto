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
	                <h2 class="title">listado de Productos</h2>

					<div class="team">
						<div class="row">
                        <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-round">nuevo producto</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="col-md-2 text-center">Nombre</th>
                                        <th class="col-md-5 text-center">Descripción</th>
                                        <th class="text-center">Categoría</th>
                                        <th class="text-right">Precio</th>
                                        <th class="text-right">opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->category_name}}</td>
                                        <td class="text-right">{{$product->price}}</td>
                                        <td class="td-actions text-right">


                                          <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                                            {{csrf_field() }}
                                            {{method_field('DELETE')}}

                                          <a href="{{url('/products/'.$product->id)}}" target="_blank" type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" >
                                                <i class="fa fa-info"></i>
                                            </a>

                                            <a href="{{url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="editar producto" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{url('/admin/products/'.$product->id.'/images')}}" type="button" rel="tooltip" title="Imagenes del porducto" class="btn btn-info btn-warning btn-xs">
                                                    <i class="fa fa-image"></i>
                                                </a>
                                            <button type="submit" rel="tooltip" title="eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>

                                          </form>

                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="text-center">2</td>
                                        <td>John Doe</td>
                                        <td>Design</td>
                                        <td>2012</td>
                                        <td class="text-right">&euro; 89,241</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-user"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Edit Profile" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr> --}}
                                    @endforeach
                                </tbody>
                            </table>

                                {{$products->links()}}
						</div>
					</div>

	            </div>



	        </div>

		</div>

     @include('includes.footer')
	</div>
@endsection
