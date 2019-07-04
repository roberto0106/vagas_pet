@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Portifólio do Candidato</div>

                    <div class="card-body">

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


