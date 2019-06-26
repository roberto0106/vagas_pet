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
                              <td> {{$vagas->empresa}} </td>
                              <td> {{$vagas->vaga}} </td>
                              <td> {{$vagas->created_at}} </td>
                              <td> {{$vagas->updated_at}} </td>
                              <td> <a href="" class="btn btn-primary">Candidatar-se</a></td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>


              </div>
          </div>
      </div>
  </div>
</div>
@endsection
