@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">



    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Já tem Cadastro</div>

                        <form action="{{ route('login') }}" id="contact_form" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email ou Telefone</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp"  required="">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Senha</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"  aria-describedby="emailHelp" name="password" required="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror

                            </div>


                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">Login</button>
                            </div>
                        </form>
                        <br>
                        <a href="{{ route('password.request') }}">Esqueceu sua Senha?</a>   <br> <br>

                        <button type="submit" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i> Entre com Facebook </button>

                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Entre com  Google </a>

                    </div>
                </div>


                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Não tem Cadastro?</div>

                        <form action="{{ route('register') }}" id="contact_form" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome Completo</label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Digite o Nome completo " name="name" required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  aria-describedby="emailHelp" placeholder="Digite seu Telefone " required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="Digite seu Email " required="">
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Senha</label>
                                <input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Digite sua Senha " name="password" required="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirme a Senha</label>
                                <input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Confirme sua Senha " name="password_confirmation" required="">
                            </div>





                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">Cadastrar</button>
                            </div>
                        </form>

                    </div>
                </div>







            </div>
        </div>
        <div class="panel"></div>
    </div>

@endsection
