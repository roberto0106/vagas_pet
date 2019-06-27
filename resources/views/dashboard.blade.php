@extends('layouts.app')

@section('content')

<div class="container">

<div class="card-deck">
  <div class="card">
    <img src="{{ asset('img/vagas.jpg') }}" class="card-img-top" alt="..." style="height: 250px;">
    <div class="card-body">
      <h5 class="card-title"><a href="/vacancies">{{ $vagas->ocorrencias }} Vagas cadastradas.</a></h5>
      <p class="card-text">Encontre a vaga perfeita para seu perfil. Se candidate e acompanhe o processo seletivo!</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>

  <div class="card">
    <img src="{{ asset('img/candidatos.jpg') }}" class="card-img-top" alt="..." style="height: 250px;">
    <div class="card-body">
      <h5 class="card-title"><a href="/candidates">{{ $candidatos->ocorrencias }} Candidatos cadastrados.</a></h5>
      <p class="card-text">Encontre candidato ideal para sua vaga e faça contato!</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>

  <div class="card">
    <img src="{{ asset('img/imoveis.jpg') }}" class="card-img-top" alt="..." style="height: 250px;">
    <div class="card-body">
      <h5 class="card-title">0 Imóveis cadastrados.</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>




</div>

@endsection
