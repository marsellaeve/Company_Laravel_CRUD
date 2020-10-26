@extends('layouts.master')
@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Film By Genre Overview</h3>
                    <p class="panel-subtitle">Check for Detail at Film Page</p>
                </div>
                <div class="panel-body">
                    <form class="navbar-form" method="GET" action="/dashboard">
                        <div class="form-group">
                            <label>Filter by Genre</label><br>
                            <select name="filtergenre" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($genre_film as $gf)
                                    <option>{{$gf->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn">Go</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                        <tr>
                            @foreach ($data_film as $film)
                            <th>
                                <div class="profile-header">
                                    <div class="overlay"></div>
                                    <div class="profile-main">
                                        <a href="/film/{{$film->id}}/detail"><img src="{{$film->getPoster()}}" class="img" alt="Poster"></a><br>
                                    </div>
                                </div>
                            </th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach ($data_film as $film)
                            <td>
                                <a href="/film/{{$film->id}}/detail"><p class="text-center" style="font-weight:bold;">{{$film->title}}</p></a>
                                <a href="/film/{{$film->id}}/detail"><p class="text-center lnr lnr-star" style="font-weight:bold;"> {{$film->rating}}</p></a>
                            </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table><br>
                    {{ $data_film->links() }}

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- TASKS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Evelyn Tjitrodjojo</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled task-list">
                                <li>
                                    <p>NRP<span class="label-percent">05111840000099</span></p>
                                    <p>Email<span class="label-percent">marsella.eve@gmail.com</span></p>
                                    <p>Github<span class="label-percent">marsellaeve</span></p>
                                    <p>Class<span class="label-percent">Web Programming C</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Amelia Puji</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled task-list">
                                <li>
                                    <p>NRP<span class="label-percent">05111840000147</span></p>
                                    <p>Email<span class="label-percent">ameliapuji2000@gmail.com </span></p>
                                    <p>Github<span class="label-percent">amlpm</span></p>
                                    <p>Class<span class="label-percent">Web Programming C</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Alie Husaini R</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled task-list">
                                <li>
                                    <p>NRP<span class="label-percent">05111840000097</span></p>
                                    <p>Email<span class="label-percent">aliehusainirahman@gmail.com</span></p>
                                    <p>Github<span class="label-percent">ppp-pp-pp</span></p>
                                    <p>Class<span class="label-percent">Web Programming C</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END REALTIME CHART -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@stop