@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Portifólio do Candidato</div>

                    <div class="card-body">

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Galeria de fotos
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {!! Form::open(
                                        array(
                                        'route' => 'insert_new_photo',
                                        'class' => 'form',
                                        'files' => true)) !!}

                                        {!! Form::label('nome','Nome da Foto:') !!}

                                        {!! Form::text('sobrenome', ' ', ['placeholder' => 'Preencha este campo'], ['class' => 'form-control']) !!}

                                        <input type="file" name="photo">

                                        {{ Form::submit('Cadastrar', array('class' => 'btn btn-danger')) }}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <h5>Portifólio</h5>

                        @if(count($fotos) > 0)

                            <ul class="list-unstyled">

                                @foreach($fotos as $object)

                                    <li class="media">
                                        <a href="{{ asset('storage/'.$object->path_photo) }}">
                                            <img src="{{ asset('storage/'.$object->path_photo) }}" class="mr-3 img-thumbnail" alt="..." width="300px">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">List-based media object</h5>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                        </div>
                                    </li>

                                @endforeach
                            </ul>
                        @else
                            <h2>Nenhuma foto cadastrada</h2>
                        @endif


                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection


