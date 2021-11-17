@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark">Acesso Negado</div>

                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <ion-icon name="alert-circle-outline" class="align-middle"></ion-icon>
                        Você não tem permissão para acessar isso.
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
