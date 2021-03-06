@extends('layouts.app')
@extends('layouts.nav')

@section('nav')
@endsection
@section("content")
	<div class="container white">
		<h1>Nuevo Articulo</h1>
		<!--formulario-->
			{!! Form::open(['url'=> '/infobase/'.$base->id, 'method'=>'POST']) !!}
		<div class="form-group">
			
			<div class="form-group{{ $errors->has('id_Art') ? ' has-error' : '' }}">
	            {{Form::text('id_Art', $base->id_Art, ['class'=>'form-control', 'placeholder'=>'Id del Articulo:'])}}
	                @if ($errors->has('id_Art'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('id_Art') }}</strong>
	                    </small>
	                @endif
        	</div>
			<div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
	            {{Form::text('titulo', $base->titulo, ['class'=>'form-control', 'placeholder'=>'Titulo:'])}}
	                @if ($errors->has('titulo'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('titulo') }}</strong>
	                    </small>
	                @endif
        	</div>
        	<div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
				{{Form::text('year', $base->year, ['class'=>'form-control', 'placeholder'=>'year...'])}}
					@if ($errors->has('year'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('year') }}</strong>
	                    </small>
	                @endif
	        </div>
			
			

	        <div class="form-group{{ $errors->has('id_revista') ? ' has-error' : '' }}">
				{{Form::select('id_revista', $revistas, null, ['class'=>'form-control', 'placeholder'=>'Revista: '] )}}
					@if ($errors->has('id_revista'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('id_revista') }}</strong>
	                    </small>
	                @endif
	        </div>
	        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
				{{Form::select('tipo', ['' => 'Seleccione un tipo: ', 'Application' => 'Application', 'Energy Source' => 'Energy Source', 'Report' => 'Report', 'Review' => 'Review', 'Theorist' => 'Theorist', 'Tool' => 'Tool'], null, ['class'=>'form-control'])}}
					@if ($errors->has('tipo'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('tipo') }}</strong>
	                    </small>
	                @endif
	        </div>
			
		</div>
		<div class="form-group text-right">
			<a href="{{url('/infobase')}}">Regresar al listado de Articulos</a>
			<input type="submit"  value="Enviar" class="btn btn-success">
		</div>
			{!! Form::close() !!}
	</div>
@endsection