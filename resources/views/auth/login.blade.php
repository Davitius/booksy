@extends('layouts.main')

@section('content')
    <main class="login_register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="min-height: 100vh">
                    <div class="card" style="margin-top: 10em">
                        <div class="card-headeri">{{ __('ავტორიზაცია') }}</div>
                        <div class="card-bodyy">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-end">{{ __('ელ. ფოსტა') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="" style="background-color: red; padding: 2px 10px">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-end">{{ __('პაროლი') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="" role="alert"  style="background-color: red; padding: 2px 10px">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('დამიმახსოვრე') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 offset-md-4">
                                    <div class="AuthDiv mx-auto">
                                        <button type="submit" class="booksyBtn btn1">
                                            {{ __('ავტორიზაცია') }}
                                        </button>
{{--                                        @if (Route::has('password.request'))--}}
{{--                                            <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                                {{ __('დაგავიწყდა პაროლი?') }}--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>
@endsection
