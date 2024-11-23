@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Questions</h1>
    @auth
      <a href="{{ route('quiz.create') }}" class="btn btn-success btn-lg">
        <i class="bi bi-plus-circle"></i> Créer une question
      </a>
    @endauth
  </div>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-4 mb-4">
    @foreach ($questions as $question)
      <div class="col">
        <div class="card border rounded-3 p-3 d-flex flex-column" style="min-height: 300px;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate" style="max-width: 280px;">{{ $question->title }}</h5>
            <ul class="list-unstyled mt-2 mb-3 flex-grow-1">
              @foreach ($question->answers as $answer)
                <li class="d-flex justify-content-between align-items-center mb-2 gap-4">
                  <span class="text-break text-muted">
                    {{ $answer->answer_text }}
                  </span>
                  <span class="badge {{ $answer->is_correct ? 'bg-success' : 'bg-danger' }} text-white">
                    {{ $answer->is_correct ? 'Correcte' : 'Incorrecte' }}
                  </span>
                </li>
              @endforeach
            </ul>

            <hr class="my-3">

            <div class="d-flex justify-content-start gap-2 mt-auto">
              <a href="{{ route('quiz.show', $question) }}" class="btn btn-info btn-sm">
                <i class="bi bi-eye"></i> Voir
              </a>
              @auth
                <a href="{{ route('quiz.edit', $question) }}" class="btn btn-warning btn-sm">
                  <i class="bi bi-pencil"></i> Modifier
                </a>
                <form action="{{ route('quiz.destroy', $question) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?')">
                    <i class="bi bi-trash"></i> Supprimer
                  </button>
                </form>
              @endauth
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-4">
    {{ $questions->links('pagination::bootstrap-5') }}
  </div>
@endsection
