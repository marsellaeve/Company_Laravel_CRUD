@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inputs</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/film/{{$film->id}}/update" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input name="title" type="text" value="{{$film->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Release Date</label>
                                    <input name="release_date" type="date" value="{{$film->release_date}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Genre</label>
                                    <input name="genre" type="text" class="form-control" value="{{$film->genre}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Genre">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Duration</label>
                                    <input name="duration" type="number" class="form-control" value="{{$film->duration}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Duration">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Rated</label>
                                    <select name="rated" class="form-control" id="exampleFormControlSelect1">
                                        <option @if($film->rated=='G') selected @endif>G</option>
                                        <option @if($film->rated=='PG') selected @endif>PG</option>
                                        <option @if($film->rated=='PG-13') selected @endif>PG-13</option>
                                        <option @if($film->rated=='R') selected @endif>R</option>
                                        <option @if($film->rated=='NC-17') selected @endif>NC-17</option>
                                        <option @if($film->rated=='Not Rated') selected @endif>Not Rated</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rating</label>
                                    <input name="rating" type="float" value="{{$film->rating}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Rating">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Poster</label>
                                    <input name="poster" type="file" value="{{$film->poster}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Poster">
                                </div>
                                <button type="submit" class="btn btn-warning">Update</button>
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-check-circle"></i>{{session('success')}}
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
