@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="mb-3">
                    <h3 class="mb-0">
                        <img src="../assets/img/empty.jpeg" class="mb-1" style="width: 50px; height: 50px;">
                        </i>Cadastrar Time
                    </h3>                    
                </div>
                <form action="/oppossing_team" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Nome</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" placeholder="Informe o nome do time">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Responsável</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="responsible" placeholder="Informe o nome do responsável">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Celular</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" data-mask="(00) 00000-0000" name="cell_phone" placeholder="(00) 00000-0000">
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
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                        <a href="/oppossing_team/index"><button type="button" class="btn btn-primary m-2"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</button></a>
                    </div>               
                </form>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

@endsection