@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0"><i class="fa fa-running me-2"></i>Cadastrar</h2>
                    <a href="/athlete/index"><button type="button" class="btn btn-primary m-2"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</button></a>
                </div>
                <form action="/athlete" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Nome</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Apelido</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="surname">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Celular</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="cell_phone">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Data de Nascimento</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="date_birth">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-4 pt-0">Ativo ?</legend>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="active" checked>
                                <label class="form-check-label" >
                                    Sim / Não
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

@endsection