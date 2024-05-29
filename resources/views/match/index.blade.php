@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="mb-0">
                    <img src="../assets/img/matche.jpeg" class="mb-1" style="width: 50px; height: 50px;">
                    {{-- <i class="fa fa-flag me-2"></i>  --}}
                    Partidas
                </h2>
                <a href="/match/create"><button type="button" class="btn btn-success m-2 d-block d-sm-none"><i class="fas fa-plus"></i></button></a>
                <a href="/match/create"><button type="button" class="btn btn-success m-2 d-none d-sm-block">Cadastrar</button></a>
            </div>
            <hr>
            @if (count($matches) > 0)
                <div class="table-responsive">
                    <table class="table text-start align-middle table-hover datatables">
                        <thead>
                            <tr class="text-dark mb-2">
                                <th scope="col">Data</th>
                                <th colspan="3" class="text-center"> Placar</th>
                                <th hidden>result</th>
                                <th class="text-center hidden-local" scope="col">Local</th>
                                <th class="text-center" scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matches as $match)
                                <tr>
                                    <td class="border border-secondary ml-0 mr-0" style="width: 10%;">
                                        {{date('d/m/Y', strtotime($match->match_date))}}
                                    </td>
                                    <td class="text-end fw-bold bg-white border border-secondary" style="width: 25%;">
                                        @if($match->local == 'casa')
                                            <span class="hidden"><i class="fas fa-home text-primary"></i> Nonô FC</span>
                                        @else
                                            <span class="hidden"> Nonô FC</span>
                                        @endif
                                        <img src="../assets/img/nono-logo.png" class="text-rigth" style="width: 60px; height: 60px;">
                                    </td>
                                    @if($match->goals_in_favor > $match->own_goals)
                                        <td class="text-center fw-bold border border-secondary" style="background: #00FA9A">
                                            <div class="d-flex justify-content-between">
                                                <h2>{{$match->goals_in_favor}}</h2>
                                                <h6><i class="fas fa-times m-2"></i></h6>
                                                <h2>{{$match->own_goals}}</h2>
                                            </div>
                                        </td>
                                        <td hidden>vitoria</td>
                                    @elseif($match->goals_in_favor < $match->own_goals)
                                        <td class="text-center fw-bold border border-secondary" style="background: #FF7F50">
                                            <div class="d-flex justify-content-between">
                                                <h2>{{$match->goals_in_favor}}</h2>
                                                <h6><i class="fas fa-times m-2"></i></h6>
                                                <h2>{{$match->own_goals}}</h2>
                                            </div>
                                        </td>
                                        <td hidden>derrora</td>
                                    @else
                                        <td class="text-center fw-bold border border-secondary">
                                            <div class="d-flex justify-content-between">
                                                <h2>{{$match->goals_in_favor}}</h2>
                                                <h6><i class="fas fa-times m-2"></i></h6>
                                                <h2>{{$match->own_goals}}</h2>
                                            </div>
                                        </td>
                                        <td hidden>empate</td>
                                    @endif
                                    <td class="fw-bold bg-white border border-secondary" style="width: 25%;">
                                        <img src="../assets/img/{{$match->team->image}}" style="width: 60px; height: 60px;">
                                        @if($match->local == 'fora')
                                            <span class="hidden">{{$match->team->name}} <i class="fas fa-home text-primary"></i></span>
                                        @else
                                            <span class="hidden"> {{$match->team->name}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-secondary text-center hidden-local" style="width: 5%;">
                                        @if($match->local == 'casa')
                                            <i class="fas fa-home text-primary"></i>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="border border-secondary text-center" style="width: 10%;">
                                        <div class="btn-group" role="group">
                                            {{-- <a href=""><button type="button" class="btn btn-sm btn-danger me-1"><i class="fas fa-trash-alt text-dark"></i></button></a> --}}
                                            <a href="/match/edit/{{$match->id}}"><button type="button" class="btn btn-sm me-1"><i class="fas fa-edit fa-lg text-warning"></i></button></a>
                                            <a href="/match/edit_goals/{{$match->id}}"><button type="button" class="btn btn-sm me-1"><i class="fas fa-futbol fa-lg text-primary"></i></button></a>
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