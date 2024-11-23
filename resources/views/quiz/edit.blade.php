@extends('layout')

@section('content')
  <h1>Modifier la question</h1>

  @include('quiz._form', [
      'action' => route('quiz.update', $question),
      'method' => 'PUT',
      'question' => $question,
      'submitText' => 'Mettre à jour',
  ])
@endsection
