@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="mb-0"><i class="fa fa-flag me-2"></i> Times</h2>
                <a href="/oppossing_team/create"><button type="button" class="btn btn-success m-2">Cadastrar</button></a>
            </div>
            <hr>
            
            @if (count($oppossing_teams) > 0)
                <div class="table-responsive">
                    <table class="table text-start align-middle table-hover mb-0 datatables mt-2">
                        <thead>
                            <tr class="text-dark mb-2">
                                <th scope="col">Nome</th>
                                <th scope="col">Responsável</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Ativo</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($oppossing_teams as $oppossing_team)
                                <tr>
                                    <td>{{ucfirst($oppossing_team->name)}}</td>
                                    <td>{{ucfirst($oppossing_team->responsible)}}</td>
                                    <td>{{$oppossing_team->cell_phone}}</td>
                                    @if($oppossing_team->active == 1)
                                        <td class="text-primary">Sim</td>
                                    @else
                                        <td class="text-warning">Não</td>
                                    @endif
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href=""><button type="button" class="btn btn-sm btn-danger me-1"><i class="fas fa-trash-alt text-dark"></i></button></a>
                                            <a href="/oppossing_team/edit/{{ $oppossing_team->id }}"><button type="button" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit text-dark"></i></button></a>
                                            <a href="/oppossing_team/show/{{ $oppossing_team->id }}"><button type="button" class="btn btn-sm btn-primary me-1"><i class="fas fa-eye text-dark"></i></button></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Nenhum time cadastrado.</h6>
                </div>
            @endif
        </div>
    </div>
    <!-- Recent Sales End -->

@endsection