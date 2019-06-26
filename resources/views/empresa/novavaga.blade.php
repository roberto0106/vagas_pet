@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Nova Vaga</div>

				<div class="card-body">

					{!! Form::open(['route' => 'createvaga']) !!}

					{!! Form::label('vaga','Vaga:') !!}<br>
					{!! Form::text('vaga', '', ['placeholder' => 'Preencha este campo'], ['class' => 'form-control']) !!}

					<hr>

					{!! Form::label('descricao','Descrição:') !!}<br>
					{!! Form::textarea('descricao', '', ['placeholder' => 'Descrição da Vaga:'], ['class' => 'form-control']) !!}

					<hr>

					{{ Form::submit('Cadastrar', array('class' => 'btn btn-danger')) }}

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>


@endsection