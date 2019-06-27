@extends('layouts.app')

@section('content')



<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Editar Vaga</div>

				<div class="card-body">

					{!! Form::open(['route' => 'updatevaga']) !!}

					{!! Form::label('vaga','Vaga:') !!}<br>
					<input type="text" name="vaga" value="{{ $vaga->vaga }}" disabled>
					{!! Form::hidden('id', $vaga->id) !!}
					{!! Form::hidden('vaga', $vaga->vaga) !!}
					<hr>

					{!! Form::label('descricao','Descrição:') !!}<br>
					<textarea name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$vaga->descricao}}</textarea>

					<hr>

					{{ Form::submit('Alterar', array('class' => 'btn btn-success')) }}

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>


@endsection