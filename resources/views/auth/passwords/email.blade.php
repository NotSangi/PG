@extends('layout.principal')

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
@endsection

@section('info')
<div class="container-restablecimiento">
    <div class="row justify-content-center" style="width: 1200px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Restablecer Contraseña') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('Documento de Identidad') }}</label>

                            <div class="col-md-6">
                                <input id="document" type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document') }}" required autocomplete="document" autofocus>

                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="display: flex; flex-direction: column; align-items: center;">
                            <div class="col-md-6 offset-md-4" style="width: auto; margin: 0;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar enlace de restablecimiento') }}
                                </button>
                            </div>
                            <div style="margin-top: 20px;">
                                <p>Se enviará un enlace de restablecimiento a tu correo</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection