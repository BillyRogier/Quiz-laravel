@extends('layout')

@section('content')
  <h1>Créer une question</h1>
  @include('quiz._form', [
      'action' => route('quiz.store'),
      'method' => 'POST',
      'question' => null,
      'submitText' => 'Créer',
  ])
@endsection
