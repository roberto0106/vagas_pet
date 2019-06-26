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
                  <div class="bd-example">
                      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active bg-dark text-white"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="1" class="bg-dark text-white"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="2" class="bg-dark text-white"></li>
                          </ol>
                          <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <img src="{{ asset('storage/'.$candidato->portifolio_photo_1) }}" class="d-block w-100" alt="...">
                                  <div class="carousel-caption d-none d-md-block">
                                      <h5 class="text-dark">First slide label</h5>
                                      <p class="text-dark">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                  <img src="{{ asset('storage/'.$candidato->portifolio_photo_1) }}" class="d-block w-100" alt="...">
                                  <div class="carousel-caption d-none d-md-block">
                                      <h5 class="text-dark">Second slide label</h5>
                                      <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                  <img src="{{ asset('storage/'.$candidato->portifolio_photo_1) }}" class="d-block w-100" alt="...">
                                  <div class="carousel-caption d-none d-md-block">
                                      <h5 class="text-dark">Third slide label</h5>
                                      <p class="text-dark">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                  </div>
                              </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev" style="background-color: black">
                              <span class="carousel-control-prev-icon text-primary" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next" style="background-color: black">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                          </a>
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
