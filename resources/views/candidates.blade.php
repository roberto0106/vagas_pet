@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Configurações
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/new_vacancies') }}" class="btn btn-primary">Criar nova vaga</a>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Filtros
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Todos</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">Avaliados</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Mais Próximo</label>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-8">

                @foreach($candidatos as $candidato)
                    <div class="row">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <ul class="list-group">
                                            <li class="list-group-item text-center">
                                                <img src="{{ asset('storage/'. $candidato->photo) }}" alt=""
                                                     style="width: 90px; height: 90px; border: 1px solid #666666"
                                                     class="rounded-circle">
                                            </li>
                                            <li class="list-group-item text-center">
                                                {{ $candidato->id }} - {{ $candidato->name }}
                                            </li>
                                            <li class="list-group-item text-center">
                                                <a href="{{ route('public_galery',['id'=>$candidato->id]) }}" class="btn btn-outline-info">Portifólio</a>
                                            </li>
                                            <li class="list-group-item text-center">
                                                <a href="" class="btn btn-outline-primary">Convidar</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5 class="card-title">{{$candidato->name}}</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{$candidato->id}}</li>
                                            <li class="list-group-item">{{$candidato->name}}</li>
                                            <li class="list-group-item">{{$candidato->created_at}}</li>
                                            <li class="list-group-item">{{$candidato->updated_at}}</li>
                                        </ul>
                                        <p class="card-text">This is a longer card with supporting text below as a
                                            natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last
                                                updated {{$candidato->updated_at}}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                @endforeach
            </div>

        </div>
    </div>



@endsection
