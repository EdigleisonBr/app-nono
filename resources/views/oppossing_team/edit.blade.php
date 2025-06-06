@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="mb-3 bg-white rounded p-1">
                    <h3 class="mb-0">
                        @if($oppossing_team->image == NULL)
                            <img src="/assets/img/empty.png" class="mb-1" style="width: 60px; height: 60px;">
                        @else
                            <img src="/assets/img/{{$oppossing_team->image}}" class="mb-1" style="width: 60px; height: 60px;">
                        @endif
                        {{$oppossing_team->name}}
                    </h3>
                </div>
                <form action="/oppossing_team/update/{{$oppossing_team->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Nome</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="{{$oppossing_team->name}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Imagem</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="image" value="{{$oppossing_team->image}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Responsável</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="responsible" value="{{$oppossing_team->responsible}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Celular</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="cell_phone" data-mask="00000-0000" value="{{$oppossing_team->cell_phone}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-4 pt-0">Ativo ?</legend>
                        <div class="col-sm-8">
                            <div class="form-check">
                                @if($oppossing_team->active)
                                    <input class="form-check-input" type="checkbox" name="active" checked>
                                    <label class="form-check-label" >
                                        Sim
                                    </label>
                                @else
                                    <input class="form-check-input" type="checkbox" name="active">
                                    <label class="form-check-label" >
                                        Não
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-warning">Editar</button>
                        <a href="/oppossing_team/index"><button type="button" class="btn btn-primary m-2"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

@endsection