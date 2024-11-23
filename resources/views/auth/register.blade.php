@extends('layout')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header text-center">
            <h4>S'inscrire</h4>
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                  required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                  required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmation du mot de passe :</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                  required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-success">S'inscrire</button>
              </div>
            </form>
            <p class="text-center mt-3">
              Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
