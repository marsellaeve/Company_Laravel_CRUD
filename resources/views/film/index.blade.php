@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="title">Film Data Management</h3>
                                <div class="right">
                                    <button type="button" class="btn btn-default btn-lg"><i class="fa fa-plus-square" data-toggle="modal" data-target="#exampleModal" style="font-size: 17px; padding:5px"> Add Film</i></button>
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
                                            <th>@sortablelink('title')</th>
                                            <th>@sortablelink('release_date')</th>
                                            <th>Genre</th>
                                            <th>@sortablelink('duration')</th>
                                            <th>@sortablelink('rated')</th>
                                            <th>@sortablelink('rating')</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_film as $film)
                                        <tr>
                                        <td><a href="/film/{{$film->id}}/detail">{{$film->title}}</a></td>
                                            <td><a href="/film/{{$film->id}}/detail">{{$film->release_date}}</a></td>
                                            <td>@foreach ($film->genre as $gf){{$gf->name}} <br>@endforeach</td>
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
                                {{ $data_film->links() }}
                                    <table>
                                        <tr>
                                            {{-- <td>
                                                <form class="navbar-form navbar-left">
                                                    <div class="form-group">
                                                        <label>Filter by Genre</label><br>
                                                        <input name="filtergenre" type="text" value="" class="form-control" placeholder="Filter for genre..." method="GET" action="/film">
                                                    </div>
                                                </form>
                                            </td> --}}
                                            <td>
                                                <form class="navbar-form navbar-left" method="GET" action="/film">
                                                    <div class="form-group">
                                                        <label>Filter by Release Date Before </label><br>
                                                        <input name="filterdate" type="date" value="" class="form-control"  method="GET" action="/film">
                                                        <button type="submit" class="btn btn-primary btn">Go</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form class="navbar-form" method="GET" action="/film">
                                                    <div class="form-group">
                                                        <label>Filter by Rated</label><br>
                                                        <select name="filterrated" class="form-control" id="exampleFormControlSelect1">
                                                            <option>G</option>
                                                            <option>PG</option>
                                                            <option>PG-13</option>
                                                            <option>R</option>
                                                            <option>NC-17</option>
                                                            <option>Not Rated</option>
                                                        </select>
                                                        <button type="submit" class="btn btn-primary btn">Go</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form class="navbar-form navbar-left">
                                                    <div class="input-group">
                                                        <label>Filter by Rating Higher Than</label><br>
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
        <h3 class="modal-title text-center" id="exampleModalLabel">Add Film Form</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="/film/create" method="POST" enctype="multipart/form-data">
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
                    @foreach ($genre_film as $gf)
                        <label class="fancy-checkbox">
                        <input name="genre[]" value="{{$gf->id}}" type="checkbox" class="form-control">
                        <span>{{$gf->name}}</span>
                        </label>
                    @endforeach
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
                <div class="form-group">
                    <label for="exampleInputEmail1">Poster</label>
                    <input name="poster" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Poster">
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