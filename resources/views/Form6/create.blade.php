@extends('layouts.app')
@extends('layouts.nav')

@section('nav')
@endsection
@section("content")
	<div class="container white">
		<h1>Completar Formulario(Report)</h1>
		<!--formulario-->
		{!! Form::open(['url'=> '/form6/'.$form6->id, 'method'=>'POST']) !!}
		<div class="form-group">
			 <div class="form-group{{ $errors->has('id_info') ? ' has-error' : '' }}">
				{{Form::select('id_info', $bases, null, ['class'=>'form-control', 'placeholder'=>'Titulo '] )}}
					@if ($errors->has('id_info'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('id_info') }}</strong>
	                    </small>
	                @endif
	        </div>
			<div class="form-group{{ $errors->has('Tema1','Tema2','Tema3','Tema4') ? ' has-error' : '' }}">
			
				{{Form::select('Tema1', [ 'NSGA - II' => 'NSGA - II', 'SORENSEN' => 'SORENSEN'], null, ['class' => 'btn btn-default dropdown-toggle', 'placeholder'=>'Tema1 '] )}}
					@if ($errors->has('Tema1'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('Tema1') }}</strong>
	                    </small>
	                @endif

				{{Form::select('Tema2', [ 'NSGA - II' => 'NSGA - II', 'SORENSEN' => 'SORENSEN'], null, ['class' => 'btn btn-default dropdown-toggle', 'placeholder'=>'Tema2 '] )}}
					@if ($errors->has('Tema2'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('Tema2') }}</strong>
	                    </small>
	                @endif

	            {{Form::select('Tema3', [ 'NSGA - II' => 'NSGA - II', 'SORENSEN' => 'SORENSEN'], null, ['class' => 'btn btn-default dropdown-toggle', 'placeholder'=>'Tema3 '] )}}
					@if ($errors->has('Tema3'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('Tema3') }}</strong>
	                    </small>
	                @endif
	            {{Form::select('Tema4', [ 'NSGA - II' => 'NSGA - II', 'SORENSEN' => 'SORENSEN'], null, ['class' => 'btn btn-default dropdown-toggle', 'placeholder'=>'Tema4 '] )}}
					@if ($errors->has('Tema4'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('Tema4') }}</strong>
	                    </small>
	                @endif
	        </div>
        	<div class="form-group{{ $errors->has('Algorithms_Tecnologies') ? ' has-error' : '' }}">
	            {{Form::text('Algorithms_Tecnologies', $form6->Algorithms_Tecnologies, ['class'=>'form-control', 'placeholder'=>'Algorithms/Tecnologies '])}}
	                @if ($errors->has('Algorithms_Tecnologies'))
	                    <small class="text-danger">
		                    <strong>{{ $errors->first('Algorithms_Tecnologies') }}</strong>
	                    </small>
	                @endif
        	</div>
     
		</div>
		<div class="form-group text-right">
			<a href="{{url('/infobase/'.$form6->id_info.'/edit')}}">Regresar al listado de Articulos</a>
			<input type="submit"  value="Enviar" class="btn btn-success">
		</div>
			{!! Form::close() !!}
	</div>
@endsection