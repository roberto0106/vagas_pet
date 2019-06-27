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
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Empresa</th>
                                <th>Vaga</th>
                                <th>Criada</th>
                                <th>Modificada</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vagas as $vagas)
                                <tr>
                                    <td> {{$vagas->id}} </td>
                                    <td> {{$vagas->company}} </td>
                                    <td> {{$vagas->vacancy}} </td>
                                    <td> {{$vagas->created_at}} </td>
                                    <td> {{$vagas->updated_at}} </td>
                                    <td>
                                        {!! Form::open(['route' => 'job_applications']) !!}
                                        {!! Form::hidden('id_vacancy', $vagas->id) !!}
                                        {!! Form::hidden('id_candidate', Auth::user()->id) !!}
                                        {!! Form::hidden('id_company', $vagas->id_company) !!}
                                        {!! Form::submit('Canidatar-se', array('class' => 'btn btn-success')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$vagas}}




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
