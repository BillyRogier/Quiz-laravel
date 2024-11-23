@extends('layout')

@section('content')
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1>{{ $question->title }}</h1>
      @auth
        <form action="{{ route('quiz.destroy', $question->id) }}" method="POST" class="ms-3">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?')">
            <i class="bi bi-trash"></i> Supprimer
          </button>
        </form>
      @endauth
    </div>

    <h2 class="text-muted mb-3">Réponses</h2>
    <div class="card border rounded-3 p-3">
      <div class="card-body">
        <ul class="list-unstyled">
          @foreach ($question->answers as $answer)
            <li class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">{{ $answer->answer_text }}</span>
              <span class="badge {{ $answer->is_correct ? 'bg-success' : 'bg-danger' }} text-white px-3 py-2">
                {{ $answer->is_correct ? 'Correcte' : 'Incorrecte' }}
              </span>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
