@extends('layouts.app')
@section('title', 'Dashboard | Admin')
@section('content')

<!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0"><i class="fa fa-futbol me-2"></i>Gols</h2>
                    <a href="/match/index"><button type="button" class="btn btn-primary m-2"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</button></a>
                </div>
                <hr>
                <div class="text-center mb-1">
                    <h2 class="mb-0">{{date('d/m/Y', strtotime($match->match_date))}} - Nonô FC x {{$match->team->name}}</h2>
                </div>

                <form action="/match/update_goals/{{$match->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input name="match_id" value="{{$match->id}}" hidden>
                    <div class="row g-1">
                        <div class="col-sm-12 col-xl-6 bg-success p-1 rounded-top text-white border border-dark">
                            <div class="text-center">
                                <h2 class="text-white">Quem marcou?</h2>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <label class="form-label col-sm-4 col-form-label">Escolha o atleta</label>
                                <div class="col-sm-8">
                                    <select id="athlete" name="athlete" class="select2 form-select" style="width: 100%">
                                        <option value="">Escolha o atleta</option>
                                        @foreach($athletes as $athlete)
                                            <option value={{$athlete->id}}>{{$athlete->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="form-label col-sm-4 col-form-label">Gols</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="goals_in_favor">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-6 bg-danger p-1 rounded-top text-white border border-dark">
                            <div class="text-center">
                                <h2 class="text-white">Quem tomou?</h2>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <label class="form-label col-sm-4 col-form-label">Escolha o atleta</label>
                                <div class="col-sm-8">
                                    <select id="goalkeeper" name="goalkeeper" class="select2 form-select" style="width: 100%">
                                        <option value="">Escolha o atleta</option>
                                        @foreach($goalkeepers as $goalkeeper)
                                            <option value={{$goalkeeper->id}}>{{$goalkeeper->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="form-label col-sm-4 col-form-label">Gols</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="own_goals">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-100 mt-1 btn btn-outline-success">
                        <i class="far fa-save text-ligth"></i> 
                        Clique para salvar os gols
                    </button>
                    <br>
                </form>

                <div class="row g-1 mt-1">
                    <div class="col-sm-12 col-xl-6 bg-success p-1 rounded-bottom text-white border border-dark">
                        <div class="text-center">
                            <h2 class="text-white"><i class="far fa-futbol"></i></h2>
                        </div>
                        <hr>
                        <div class="h-100">
                            <table class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Gols</th>
                                        <th scope="col">Remover</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($goals_in_favor as $favor)
                                        <tr>
                                            <td>{{$favor->athlete->surname}}</td>
                                            <td>{{$favor->goals}}</td>
                                            <td>
                                                <form action="/match/delete_goals/{{$favor->id}}" method="GET" enctype="multipart/form-data">
                                                    <button class="btn" type="submit"><i class="fas fa-trash-alt text-warning"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6 bg-danger p-1 rounded-bottom text-white border border-dark">
                        <div class="text-center">
                            <h2 class="text-white"><i class="far fa-futbol"></i></h2>
                        </div>
                        <hr>
                        <div class="h-100">
                            <table class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Gols</th>
                                        <th scope="col">Remover</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($own_goals as $own)
                                        <tr>
                                            <td>{{$own->athlete->surname}}</td>
                                            <td>{{$own->goals}}</td>
                                            <td>
                                                <form action="/match/delete_goals_goalkeeper/{{$own->id}}" method="GET" enctype="multipart/form-data">
                                                    <button class="btn" type="submit"><i class="fas fa-trash-alt text-warning"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#athlete').select2();
            $('#goalkeeper').select2();
        });

    </script>
@endpush
