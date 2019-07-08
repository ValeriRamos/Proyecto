@extends('layouts.app')

@section('body-class','landing-page')

@section('title','Bienvenido a '.config('app.name'))

@section ('styles')
<style>

.team .row .col-md-4{
    margin-bottom:40px;
}

.team.row > [class*='col-'] {
  display: flex;
  flex-direction: column;
}
.anim{
    animation-duration: 3s;
  animation-name: cambiar;
  animation-iteration-count: infinite;
  position:absolute; 
}
@keyframes cambiar {
    0%{ margin-top:0;}
    20%{ margin-top:0;}
    25%{margin-top:-50px;}
}




</style>
@endsection

@section('content')
<div class="wrapper">
        <div class="header header-filter" style="background-image:url('{{asset('img/banner.jpg')}}')">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						{{-- <h1 class="title">Write the best title for your page.</h1> --}}
	                    <h2 class="anim"> “El perfume anuncia la llegada de una mujer y alarga su marcha”</h2>
	                    <br/>
	                    {{-- <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
							<i class="fa fa-play"></i> Watch video
						</a> --}}
					</div>
                </div>
            </div>
        </div>

		<div class="main main-raised">
			<div class="container">
		    	<div class="section text-center section-landing">
	                <div class="row">
	                    <div class="col-md-8 col-md-offset-2">
	                        <h2 class="title">NUESTROS PRODUCTOS</h2>
	                        <h5 class="description">Con nuestras creaciones queremos darle valor a la fragancia, al aroma en sí, y promover la cultura olfativa mediante la clasificación de nuestras fragancias en familias olfativas. Esto te ayudará a encontrar la esencia que mejor se adapte a ti y a tu estilo de vida.</h5>
	                    </div>
	                </div>

					<div class="features">
						<div class="row">
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-primary">
										<i class="material-icons">chat</i>
									</div>
									<h4 class="info-title">Atendemos tus dudas</h4>
									<p>Atendemos r+apidamente cualquier consulta que tengas via. No estás sólo, si no que siempre estamos atentos a tus inquietudes.</p>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-success">
										<i class="material-icons">verified_user</i>
									</div>
									<h4 class="info-title">Pago seguro</h4>
									<p>Todo pedido que realices será confirmado a través de una llamada. Si no confias en los pagos en línea puedes pagar contra entrega el valor acordado.</p>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-danger">
										<i class="material-icons">fingerprint</i>
									</div>
									<h4 class="info-title">Información privada</h4>
									<p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a está información.</p>
								</div>
		                    </div>
		                </div>
					</div>
	            </div>

	        	<div class="section text-center">
	                <h2 class="title">Visita nuestras categorías</h2>

					<div class="team">
						<div class="row justify-content-center">
                            @foreach ($categories as $category)
							<div class="col-md-6">
			                    <div class="team-player">
                                        {{-- $product->images()->first()->image}} --}}
                                <img src="{{$category->featured_image_url}}" alt="Imagen representativa de la categoría {{$category->name}}" class="img-raised img-circle">
                                <h4 class="title">
                                    <a href="{{url('/categories/'.$category->id)}}">{{$category->name}} </a><br>
										<small class="text-muted">{{$category->category_name}}</small>
									</h4>
			                        <p class="description">{{$category->description}}</p>

			                    </div>
                            </div>
                            @endforeach

                        </div>


					</div>

	            </div>


	        
	        </div>

		</div>

        @include('includes.footer')

	</div>
@endsection
