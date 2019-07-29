@extends('layouts.app')
@section('content')

    <div class="container">

        @if(Session::has('msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
         @endif


        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        My Application
                    </div>
                    <div class="card-body">
                        Algo
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Filtros
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Todas</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">Publicadas</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Com candidaturas</label>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Sem candidaturas</label>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Estatísticas
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-md-9">
                @if(isset($my_application))
                    @foreach ($my_application as $vaga)
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $vaga->id }} - {{ $vaga->vacancy->vacancy  }}</h5>
                                    <small>Criada em: {{ $vaga->created_at }}</small>
                                </div>
                                <div class="alert alert-secondary" role="alert">
                                    {{ $vaga->vacancy->description  }}
                                </div>
                                <small>
                                    Ultima modificação: {{ $vaga->updated_at }}
                                </small>
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    {!! Form::open(['route' => 'view_update_vacancy']) !!}
                                    {!! Form::hidden('id', $vaga->id) !!}
                                    <input type="submit" name="declinar" value="Declinar"
                                           class="btn btn-outline-danger" style="margin: 5px;">
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                @else
                    <h3>Voce não está candidatado a nenhuma vaga!
                        <br> Clique no botão "+" para ver as
                        novas vagas.
                    </h3>
                @endif

            </div>



@endsection
