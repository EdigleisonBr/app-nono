@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Cards -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
                @if($goals == False)
                    <h1 class="display-2 text-white">0</h1>
                    <div class="ms-3">
                        <h6 class="text-white">ARTILHEIRO</h6>
                        <h6 class="">?</h6>
                    </div>
                @else
                    <h1 class="display-2 text-white">{{$goals}}</h1>
                    <div class="ms-3">
                        <h6 class="text-white">ARTILHEIRO</h6>
                        <h6 class="">{{strtoupper($name)}}</h6>
                    </div>
                @endif
            </div>
        </div>
        @php
            $now = date('d/m/y', strtotime(Carbon\Carbon::now()));
        @endphp
        <div class="col-sm-6 col-xl-4">
            <div class="rounded d-flex align-items-center justify-content-between p-4" style="background: #00FA9A">
                <h1 class="display-2 text-white">{{$sum_goals_in_favor}}</h1>
                <div class="ms-3">
                    <h6 class="text-white">GOLS</h6>
                    <h6 class="">FEITOS</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="rounded d-flex align-items-center justify-content-between p-4" style="background: #FF7F50">
                <h1 class="display-2 text-white">{{$sum_own_goals}}</h1>
                <div class="ms-3">
                    <h6 class="text-white">GOLS</h6>
                    <h6 class="">TOMADOS</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-3 col-6">
            <div class="rounded d-flex align-items-center justify-content-between p-3 bg-warning">
                <h5 class="mb-0">{{$count_matches}}</h5>
                <h5 class="mb-0">Jogos</h5>
            </div>
        </div>
        <div class="col-sm-12 col-xl-3 col-6">
            <div class="rounded d-flex align-items-center justify-content-between p-3" style="background: #00FA9A">
                <h5 class="mb-0">{{$victory}}</h5>
                <h5 class="mb-0">Vitórias</h5>
            </div>
        </div>
        <div class="col-sm-12 col-xl-3 col-6">
            <div class="rounded d-flex align-items-center justify-content-between p-3 bg-light">
                <h5 class="mb-0">{{$equal}}</h5>
                <h5 class="mb-0">Empates</h5>
            </div>
        </div>
        <div class="col-sm-12 col-xl-3 col-6">
            <div class="rounded d-flex align-items-center justify-content-between p-3" style="background: #FF7F50">
                <h5 class="mb-0">{{$loss}}</h5>
                <h5 class="mb-0">Derrotas</h5>
            </div>
        </div>
    </div>
</div>
<!-- Cards End -->

<!-- Jogos Start -->
<div class="container-fluid pt-4 px-4 border rounded mt-4">
    <div class="mb-4 text-center">
        <h5 class="mb-0"><i class="fas fa-star text-warning"></i> Jogos</h5>
    </div>
    @if(count($matches) > 0)
        @foreach($matches as $match)
            @php
                $now = now();
                $timeZone = new DateTimeZone('UTC');
                $matche_date = DateTime::createFromFormat ('d/m/Y', date('d/m/Y', strtotime($match->match_date)), $timeZone);
                $date_now = DateTime::createFromFormat ('d/m/Y', date('d/m/Y', strtotime($now)), $timeZone);
            @endphp
            <div class="row g-1 mb-2 border border-dark rounded bg-light">
                <div class="col-sm-12 col-xl-12">
                    
                    @if($match->goals_in_favor > $match->own_goals) 
                    <div class="rounded d-flex align-items-center justify-content-between p-2" style="background: #00FA9A">
                        <h6 class="text-dark mb-0"><i class="far fa-calendar-alt"></i> {{date('d/m/y', strtotime($match->match_date))}}</h6>
                        @if($match->local == 'casa')
                            <h6 class="text-dark mb-0"><i class="fas fa-home text-primary"></i></h6>
                        @endif
                    </div>
                    @elseif($match->goals_in_favor < $match->own_goals)
                    <div class="rounded d-flex align-items-center justify-content-between p-2" style="background: #FF7F50">
                        <h6 class="text-dark mb-0"><i class="far fa-calendar-alt"></i> {{date('d/m/y', strtotime($match->match_date))}}</h6>
                        @if($match->local == 'casa')
                            <h6 class="text-dark mb-0"><i class="fas fa-home text-primary"></i></h6>
                        @endif
                    </div>
                    @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-2">
                        <h6 class="text-dark mb-0"><i class="far fa-calendar-alt"></i> {{date('d/m/y', strtotime($match->match_date))}}</h6>
                        @if($match->local == 'casa')
                            <h6 class="text-dark mb-0"><i class="fas fa-home text-primary"></i></h6>
                        @endif
                    </div>
                    @endif

                    <div class="bg-white rounded d-flex align-items-center justify-content-between p-4 border">
                        <div class="ms-2 text-center">
                            <h6>Nonô FC</h6>
                            <img src="../assets/img/nono-logo.png" class="mb-1" style="width: 60px; height: 60px;">
                            @if($matche_date <= $date_now)
                                <h5>{{$match->goals_in_favor}}</h5>
                            @endif
                        </div>
                        <div class="ms-2">
                            @if($matche_date <= $date_now)
                            <h1 class="display-2"><i class="fas fa-times"></i></h1>
                            @else
                                <h1 class="display-2"><i class="fas fa-times text-primary"></i></h1>
                            @endif
                        </div>
                        <div class="ms-2 text-center">
                            <h6>{{$match->team->name}}</h6>
                            @if ($match->team->image == NULL)
                                <img src="../assets/img/empty.png" class="mb-1" style="width: 60px; height: 60px;">
                            @else
                                <img src="../assets/img/{{$match->team->image}}" class="mb-1" style="width: 60px; height: 60px;">
                            @endif  
                            @if($matche_date <= $date_now)
                                <h5>{{$match->own_goals}}</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Nenhum jogo cadastrado até o momento.</h6>
        </div>
    @endif
</div>
<!-- Jogos End -->

<!-- Artilheiros e Aniversários -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0"><i class="fas fa-medal"></i> Artilheiros</h6>
                </div>
                @if(count($gunners) > 0)
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered border-dark table-hover mb-0 text-dark">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col" class="text-center"><i class="fas fa-medal"></i></th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Gols</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gunners as $gunner)
                                    <tr>
                                        @if ($loop->index == 0)
                                            <td class="bg-warning text-center fw-bold">{{$loop->index+1}}º</td>
                                            <td class="bg-warning fw-bold">{{$gunner->athlete->surname}}</td>
                                            <td class="bg-warning fw-bold">
                                                {{$gunner->goal}} 
                                                <i class="fas fa-heart text-danger"></i> Nonô ama!
                                            </td>
                                        @else
                                            <td class="text-center fw-bold">{{$loop->index+1}}º</td>
                                            <td>{{$gunner->athlete->surname}}</td>
                                            <td>{{$gunner->goal}}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Nenhum artilheiro té o momento.</h6>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0"><i class="fas fa-birthday-cake"></i> Aniversários de {{$month_}}</h6>
                </div>
                @if(count($birthdays) > 0)
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered border-dark table-hover mb-0 text-dark">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nome</th>
                                    <th scope="col">Dia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($birthdays as $birthday)
                                    <tr>
                                        <td>{{$birthday->surname}}</td>
                                        <td>{{date('d/m', strtotime($birthday->date_birth))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Ninguém faz aniversário neste mês.</h6>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Artilheiros e Aniversários End -->
@endsection