@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Newest Film</h3>
                                <div class="right">
                                    <button type="button" class="btn btn-default btn-lg"><i class="fa fa-plus-square" data-toggle="modal" data-target="#exampleModal"></i> Add Film </button>
                                </div>
                            </div>
                            <div class="panel-body">
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-check-circle"></i>{{session('success')}}
                                </div>
                                @endif
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Release Date</th>
                                            <th>Genre</th>
                                            <th>Duration</th>
                                            <th>Rated</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_film as $film)
                                        <tr>
                                        <td><a href="/film/{{$film->id}}/detail">{{$film->title}}</a></td>
                                            <td><a href="/film/{{$film->id}}/detail">{{$film->release_date}}</a></td>
                                            <td>{{$film->genre}}</td>
                                            <td>{{$film->duration}}</td>
                                            <td>{{$film->rated}}</td>
                                            <td>{{$film->rating}}</td>
                                            <td><a href="/film/{{$film->id}}/detail" class="btn btn-primary btn-sn">View</a>
                                            <a href="/film/{{$film->id}}/edit" class="btn btn-warning btn-sn">Edit</a>
                                            <a href="/film/{{$film->id}}/delete" class="btn btn-danger btn-sn" onclick="return confirm('Delete this film?')">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    <table>
                                        <tr>
                                            <td>
                                                <form class="navbar-form navbar-left">
                                                    <div class="input-group">
                                                        <input name="filtergenre" type="text" value="" class="form-control" placeholder="Filter for genre..." method="GET" action="/film">
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form class="navbar-form navbar-left">
                                                    <div class="input-group">
                                                        <input name="filterdate" type="date" value="" class="form-control"  method="GET" action="/film">
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form class="navbar-form navbar-left">
                                                    <div class="input-group">
                                                        <select name="filterrated" class="form-control" placeholder="Filter for rated..." method="GET" action="/film">
                                                            <option @if($film->rated=='G') selected @endif>G</option>
                                                            <option @if($film->rated=='PG') selected @endif>PG</option>
                                                            <option @if($film->rated=='PG-13') selected @endif>PG-13</option>
                                                            <option @if($film->rated=='R') selected @endif>R</option>
                                                            <option @if($film->rated=='NC-17') selected @endif>NC-17</option>
                                                            <option @if($film->rated=='Not Rated') selected @endif>Not Rated</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form class="navbar-form navbar-left">
                                                    <div class="input-group">
                                                        <input name="filterrating" type="number" value="" class="form-control" placeholder="Rating higher than ..." method="GET" action="/film">
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Film Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="/film/create" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Release Date</label>
                    <input name="release_date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Genre</label>
                    <input name="genre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Genre">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Duration</label>
                    <input name="duration" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Duration">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rated</label>
                    <select name="rated" class="form-control" id="exampleFormControlSelect1">
                        <option>G</option>
                        <option>PG</option>
                        <option>PG-13</option>
                        <option>R</option>
                        <option>NC-17</option>
                        <option>Not Rated</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rating</label>
                    <input name="rating" type="float" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Rating">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection