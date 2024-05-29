@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0">
                        <img src="/assets/img/matche.jpeg" class="mb-1" style="width: 50px; height: 50px;">
                        Partida
                    </h2>
                    <a href="/match/index"><button type="button" class="btn btn-primary m-2"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</button></a>
                </div>
                <form action="/match/update/{{$match->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Data</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="match_date" value="{{$match->match_date}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Hora</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="hour" placeholder="HH:MM" value="{{$match->hour}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="form-label col-sm-4 col-form-label">Local</label>
                        <div class="col-sm-8">
                            <select id="local" name="local" class="form-select"required>
                                @if($match->local == 'casa')
                                    <option value="{{$match->local}}">Casa</option>
                                    <option value='fora'>Fora</option>
                                @else
                                    <option value="{{$match->local}}">Fora</option>
                                    <option value='casa'>Casa</option>
                                @endif                                
                            </select>
                        </div>
                    </div>
                    <?php
                        $teams = App\Models\OppossingTeam::all();
                    ?>
                    <div class="row mb-2">
                        <label class="form-label col-sm-4 col-form-label">Time</label>
                        <div class="col-sm-8">
                            <select id="oppossing_team_id" name="oppossing_team_id" class="select2 form-select" style="width: 100%" required>
                                <option value="{{$match->oppossing_team_id}}">{{$match->team->name}}</option>
                                @foreach($teams as $team)
                                    <option value={{$team->id}}>{{$team->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Editar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#oppossing_team_id').select2();
        });
    </script>
@endpush
