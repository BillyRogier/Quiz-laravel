<form action="{{ $action }}" method="POST" class="mt-4 p-4 border rounded shadow-sm bg-light">
  @csrf
  @if ($method === 'PUT')
    @method('PUT')
  @endif

  <div class="mb-4">
    <label for="title" class="form-label fw-bold">Texte de la question</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
      value="{{ old('title', $question->title ?? '') }}" placeholder="Entrez le texte de la question" required>
    @error('title')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  @php
    $answers = isset($question) ? $question->answers : collect([]);
  @endphp

  <h5 class="mb-3">Réponses</h5>
  <div class="row g-3">
    @for ($i = 0; $i < 4; $i++)
      @php
        $answer = $answers->get($i);
      @endphp
      <div class="col-md-6">
        <div class="form-group border rounded p-3 bg-white">
          <input type="hidden" name="answers[{{ $i }}][id]" value="{{ $answer->id ?? '' }}">
          <label for="answers[{{ $i }}][answer_text]" class="form-label">Réponse {{ $i + 1 }}</label>
          <input type="text" name="answers[{{ $i }}][answer_text]"
            class="form-control @error("answers.$i.answer_text") is-invalid @enderror"
            value="{{ old("answers.$i.answer_text", $answer->answer_text ?? '') }}"
            placeholder="Entrez la réponse {{ $i + 1 }}">
          @error("answers.$i.answer_text")
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          <div class="form-check mt-2">
            <input type="hidden" name="answers[{{ $i }}][is_correct]" value="0">
            <input type="checkbox" name="answers[{{ $i }}][is_correct]" value="1"
              class="form-check-input" id="correct-{{ $i }}"
              {{ old("answers.$i.is_correct", $answer->is_correct ?? false) ? 'checked' : '' }}>
            <label for="correct-{{ $i }}" class="form-check-label">Correcte</label>
          </div>
        </div>
      </div>
    @endfor
  </div>

  <div class="mt-4 text-end">
    <button type="submit" class="btn btn-primary">{{ $submitText }}</button>
  </div>
</form>
