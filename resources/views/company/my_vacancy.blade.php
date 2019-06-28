@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ url('/new_vacancies') }}" class="btn btn-lg btn-primary">+</a>
            </div>
        </div>

        <hr>

        <div class="row justify-content-center">
            <div class="col-md-12">

                @if(count($minhasvagas)>0)
                    <div class="list-group">
                        @foreach ($minhasvagas as $vaga)

                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $vaga->id }} - {{ $vaga->vacancy }}</h5>
                                <small>Criada em: {{ $vaga->created_at }}</small>
                            </div>

                            <div class="alert alert-secondary" role="alert">
                                {{ $vaga->description }}
                            </div>

                            <small>Ultima modificação: {{ $vaga->updated_at }}</small><br><br>

                            <h6 class="mb-1">

                                    {{ $vaga->application->count() }} Candidatos Interessados
{{--                                    @foreach($vaga->application as $story)--}}
{{--                                        <div>{{$story}}</div>--}}
{{--                                    @endforeach--}}

                            </h6>

                            <div class="btn-group" role="group" aria-label="Basic example">

                                {!! Form::open(['route' => 'view_update_vacancy']) !!}
                                {!! Form::hidden('id', $vaga->id) !!}
                                <input type="submit" name="editarvaga" value="Editar" class="btn btn-outline-primary"
                                       style="margin: 5px;">
                                {!! Form::close() !!}

                                {!! Form::open(['route' => 'delete_vacancies']) !!}
                                {!! Form::hidden('id', $vaga->id) !!}
                                <input type="submit" name="apagarvaga" value="Apagar" class="btn btn-outline-danger"
                                       style="margin: 5px;">
                                {!! Form::close() !!}

                            </div>
                            <hr>
                        @endforeach
                    </div>
                @else
                    <h3>Sua empresa ainda não tem vagas cadastradas. <br> Clique no botão "+" para criar uma nova vaga.
                    </h3>
                @endif

            </div>
        </div>

    </div>





@endsection
