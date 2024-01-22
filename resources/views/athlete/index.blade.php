@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="mb-0"><i class="fa fa-running me-2"></i> Atletas</h2>
                <a href="/athlete/create"><button type="button" class="btn btn-success m-2">Cadastrar</button></a>
            </div>
            <hr>
            
            @if (count($athletes) > 0)
                <div class="table-responsive">
                    <table class="table text-start align-middle table-hover mb-0 datatables mt-2">
                        <thead>
                            <tr class="text-dark mb-2">
                                <th scope="col">Nome</th>
                                <th scope="col">Apelido</th>
                                <th scope="col">Data de nascimento</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Ativo</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($athletes as $athlete)
                                <tr>
                                    <td>{{ucfirst($athlete->name)}}</td>
                                    <td>{{$athlete->surname}}</td>
                                    <td>{{date('d/m/Y', strtotime($athlete->date_birth))}}</td>
                                    <td>{{$athlete->cell_phone}}</td>
                                    @if($athlete->active == 1)
                                        <td class="text-primary">Sim</td>
                                    @else
                                        <td class="text-warning">Não</td>
                                    @endif
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href=""><button type="button" class="btn btn-sm btn-danger me-1"><i class="fas fa-trash-alt text-dark"></i></button></a>
                                            <a href="/athlete/edit/{{ $athlete->id }}"><button type="button" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit text-dark"></i></button></a>
                                            <a href="/athlete/show/{{ $athlete->id }}"><button type="button" class="btn btn-sm btn-primary me-1"><i class="fas fa-eye text-dark"></i></button></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Nenhum atleta cadastrado.</h6>
                </div>
            @endif
        </div>
    </div>
    <!-- Recent Sales End -->

@endsection