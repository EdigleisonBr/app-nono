@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0"><i class="fa fa-running me-2"></i>{{$athlete->name}}</h2>
                    <a href="/athlete/index"><button type="button" class="btn btn-primary m-2"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</button></a>
                </div>
                                 
                <div class="row mb-2">
                    <label class="col-sm-4 col-form-label">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="{{$athlete->name}}" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-4 col-form-label">Apelido</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="surname" value="{{$athlete->surname}}" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-4 col-form-label">Celular</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="cell_phone" value="{{$athlete->cell_phone}}" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-4 col-form-label">Data de Nascimento</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="date_birth" value="{{$athlete->date_birth}}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <legend class="col-form-label col-sm-4 pt-0">Ativo ?</legend>
                    <div class="col-sm-8">
                        <div class="form-check">
                            @if($athlete->active)
                                <input class="form-check-input" type="checkbox" name="active" checked disabled>
                                <label class="form-check-label" >
                                    Sim
                                </label>
                            @else
                                <input class="form-check-input" type="checkbox" name="active" disabled>
                                <label class="form-check-label" >
                                    Não
                                </label>
                            @endif
                        </div>
                    </div>
                </div>
                    
                
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

@endsection