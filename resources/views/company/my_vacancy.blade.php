@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row justify-content-center">

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
                @if(count($minhasvagas)>0)
                    @foreach ($minhasvagas as $vaga)
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $vaga->id }} - {{ $vaga->vacancy }}</h5>
                                    <small>Criada em: {{ $vaga->created_at }}</small>
                                </div>

                                <div class="alert alert-secondary" role="alert">
                                    {{ $vaga->description }}
                                </div>

                                <small>
                                    Ultima modificação: {{ $vaga->updated_at }}
                                </small>
                                <br>
                                <br>

                                @if( $vaga->application->count() >0)

                                    <button type="button" class="btn btn-primary">
                                        {{ $vaga->application->count() }} Candidatos Interessados <i
                                            class="fas fa-eye"></i>
                                    </button>
                                @else
                                    <a href="" class="btn btn-outline-danger">
                                        {{ $vaga->application->count() }} Candidatos Interessados <i
                                            class="fas fa-exclamation-triangle"></i>
                                    </a>

                                @endif

                                <div class="btn-group" role="group" aria-label="Basic example">

                                    {!! Form::open(['route' => 'view_update_vacancy']) !!}
                                    {!! Form::hidden('id', $vaga->id) !!}
                                    <input type="submit" name="editarvaga" value="Editar"
                                           class="btn btn-outline-primary" style="margin: 5px;">
                                    {!! Form::close() !!}

                                    {!! Form::open(['route' => 'delete_vacancies']) !!}
                                    {!! Form::hidden('id', $vaga->id) !!}
                                    <input type="submit" name="apagarvaga" value="Apagar" class="btn btn-outline-danger"
                                           style="margin: 5px;">
                                    {!! Form::close() !!}

                                    {!! Form::open(['route' => 'view_update_vacancy']) !!}
                                    {!! Form::hidden('id', $vaga->id) !!}
                                    <input type="submit" name="publicarvaga" value="Publicar"
                                           class="btn btn-outline-info" style="margin: 5px;">
                                    {!! Form::close() !!}

                                    {!! Form::open(['route' => 'view_update_vacancy']) !!}
                                    {!! Form::hidden('id', $vaga->id) !!}

                                    <button type="submit" name="publicarvaga" class="btn btn-outline-success"
                                            style="margin: 5px;">
                                        <i class="fas fa-rocket"></i> Impulsionar
                                    </button>
                                    {!! Form::close() !!}

                                </div>
                                <hr>
                            </div>

                            @endforeach

                            @else
                                <h3>Sua empresa ainda não tem vagas cadastradas.
                                    <br> Clique no botão "+" para criar
                                    uma
                                    nova vaga.
                                </h3>
                            @endif
                        </div>

            </div>



@endsection
