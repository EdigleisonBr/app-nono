@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="mb-0"><i class="fa fa-flag me-2"></i> Partidas</h2>
                <a href="/match/create"><button type="button" class="btn btn-success m-2">Cadastrar</button></a>
            </div>
            <hr>
            @if (count($matches) > 0)
                <div class="table-responsive">
                    <table class="table text-start align-middle table-hover mb-0 datatables mt-2">
                        <thead>
                            <tr class="text-dark mb-2">
                                <th scope="col">Data</th>
                                <th colspan="4" class="text-center"> Placar</th>
                                <th class="text-center" scope="col">Local</th>
                                <th class="text-center" scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matches as $match)
                                <tr>
                                    <td class="border border-secondary ml-0 mr-0">{{date('d/m/Y', strtotime($match->match_date))}}</td>
                                    <td class="text-center fw-bold bg-info border border-secondary">Nonô FC</td>
                                    <td class="text-center fw-bold bg-info border border-secondary">{{$match->goals_in_favor}}</td>
                                    <td class="text-center fw-bold bg-warning border border-secondary">{{$match->own_goals}}</td>
                                    <td class="text-center fw-bold bg-warning border border-secondary">{{$match->team->name}}</td>
                                    <td class="border border-secondary text-center">Casa</td>
                                    <td class="border border-secondary text-center">
                                        <div class="btn-group" role="group">
                                            {{-- <a href=""><button type="button" class="btn btn-sm btn-danger me-1"><i class="fas fa-trash-alt text-dark"></i></button></a> --}}
                                            <a href="/match/edit/{{$match->id}}"><button type="button" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit text-dark"></i></button></a>
                                            <a href="/match/edit_goals/{{$match->id}}"><button type="button" class="btn btn-sm btn-primary me-1"><i class="fas fa-futbol text-dark"></i></button></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Nenhuma partida cadastrada.</h6>
                </div>
            @endif
        </div>
    </div>
    <!-- Recent Sales End -->

@endsection