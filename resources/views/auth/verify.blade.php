@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark card-header-big">Falta pouco agora! Precisamos que vc valide o seu email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Reenviamos para você um e-mail de validação
                        </div>
                    @endif

                    <div class="alert alert-dark" role="alert">
                        Antes de utilizar os recursos da aplicação, por favor, valide sua conta pelo link enviado por email. <br>
                        Caso não tenha recebido o e-mail de verificação, clique no link a seguir. <br>
                        <hr>
                    
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><strong>Reenviar Link de Validação</strong></button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
