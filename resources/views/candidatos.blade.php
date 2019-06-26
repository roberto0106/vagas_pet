@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Dashboard</div>




        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Portifólio</th>
                <th scope="col">Criação</th>
                <th scope="col">Ultima Atualização</th>
                <th scope="col">Fazer Contato</th>
              </tr>
            </thead>
            <tbody>
             @foreach($candidatos as $candidato)
             <tr>
              <td> {{$candidato->id}} </td>
              <td> {{$candidato->nome}} </td>
              <td> {{$candidato->sobrenome}} </td>
              <td>
                 <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                         <div class="carousel-item active">
                             <img class="d-block w-100" src="{{ asset('storage/'.$candidato->portifolio_photo_1) }}" alt="First slide" class="img-thumbnail">
                         </div>
                         <div class="carousel-item">
                             <img class="d-block w-100" src="{{ asset('storage/'.$candidato->portifolio_photo_1) }}" alt="Second slide" class="img-thumbnail">
                         </div>
                         <div class="carousel-item">
                             <img class="d-block w-100" src="{{ asset('storage/'.$candidato->portifolio_photo_1) }}" alt="Third slide" class="img-thumbnail">
                         </div>
                     </div>
                 </div>
              </td>

              <td> {{$candidato->created_at}} </td>
              <td> {{$candidato->updated_at}} </td>

              <td> {{ Form::open(array('url' => '' . $candidato->id, 'class' => 'center-block')) }}
                  {{ Form::submit('Contatar', array('class' => 'btn btn-success')) }}
              {{ Form::close() }}</td>

              @endforeach
            </tbody>
          </table>




        </div>
      </div>
    </div>
  </div>
</div>
@endsection
