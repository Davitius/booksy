
@extends('layouts.main')

@section('content')
    <main class="login_register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="min-height: 100vh">
                    <div class="card" style="margin-top: 10em">
                        <div class="card-header">{{ __('დაადასტურეთ თქვენი ელფოსტის მისამართი') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('თქვენს ელ. ფოსტის მისამართზე გაიგზავნა ახალი დამადასტურებელი ბმული.') }}
                                </div>
                            @endif

                            {{ __('გთხოვთ, შეამოწმოთ თქვენი ელფოსტა დამადასტურებელი ბმულისთვის.') }}
                                <br>
                            {{ __('თუ არ მიგიღიათ ელფოსტა') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('ხელახლა გაგზავნა') }}</button>.
                            </form>
                        </div>
                    </div><!-- /.card -->
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>
@endsection
