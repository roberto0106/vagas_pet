@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Vagas</div>

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
                            @foreach($vagas as $vaga)
                                <tr>
                                    <td> {{$vaga->id}} </td>
                                    <td> {{$vaga->company}} </td>
                                    <td> {{$vaga->vacancy}} </td>
                                    <td> {{$vaga->created_at}} </td>
                                    <td> {{$vaga->updated_at}} </td>
                                    <td>
                                        @if(in_array($vaga->id,$candidaturas))

                                            <button class="btn btn-warning" disabled="true" id="{{$vaga->id}}">Já Candidatado</button>
                                        @else
                                            <button class="btn btn-success application" data-id="{{$vaga->id}}" id="{{$vaga->id}}">Candidatar-se</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(".application").on("click",function(){
                var id = $(this).data('id');
                var  textid = "#"+id;
                $.ajax({
                    method: "GET",
                    url: "/api/job_application/"+id,
                    contentType: "application/json; charset=utf-8",
                    beforeSend: function() {
                        $(textid).removeClass("application").attr("disabled", true);
                    }
                }).done(function(res){
                    console.log(res.error);
                    if(res.error == 'false'){
                        $(textid).removeClass("application").removeClass("btn-success").addClass("btn-warning").text("Já Candidatado");
                    }
                })
            });
        });
    </script>



@endsection


