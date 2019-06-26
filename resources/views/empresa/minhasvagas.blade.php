@extends('layouts.app')

@section('content')


<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-12">
			<a href="{{ url('nova_vaga') }}" class="btn btn-lg btn-primary">+</a>
		</div>
	</div>
	
	<hr>

	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="list-group">
				@foreach ($minhasvagas as $vaga)
				<a href="#" class="list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">{{ $vaga->id }} -  {{ $vaga->vaga }}</h5>
						<small>Criada em: {{ $vaga->created_at }}</small>
					</div>

					<div class="alert alert-secondary" role="alert">
						{{ $vaga->descricao }}
					</div>

					<small>Ultima modificação: {{ $vaga->updated_at }}</small><br><br>

						<h6 class="mb-1">0 Candidatos interessados</h5>
						<h6 class="mb-1">0 Candidatos entrevistados</h5>


					<div class="btn-group" role="group" aria-label="Basic example">



						{!! Form::open(['route' => 'viewupdatevaga']) !!} 
						{!! Form::hidden('id', $vaga->id) !!}
						<input type="submit" name="editarvaga" value="Editar" class="btn btn-outline-primary" style="margin: 5px;">
						{!! Form::close() !!}


						{!! Form::open(['route' => 'deletevaga']) !!} 
						{!! Form::hidden('id', $vaga->id) !!}
						<input type="submit" name="apagarvaga" value="Apagar" class="btn btn-outline-danger" style="margin: 5px;">
						{!! Form::close() !!}


					</div>

				</a>
				<hr>
				@endforeach
			</div>
		</div>
	</div>

</div>





@endsection