@extends('layouts.master')
@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{$film->getPoster()}}" class="img" alt="Poster">
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <h4 class="heading">{{$film->title}}</h4>
                        <!-- TABBED CONTENT -->
                        <div class="custom-tabs-line tabs-line-bottom left-aligned">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Film Info</a></li>
                               </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-bottom-left1">
                                <ul class="list-unstyled list-justify">
                                    <li>Release Date <span>{{$film->release_date}}</span></li>
                                    <li>Duration <span>{{$film->duration}}</span></li>
                                    <li>Rating <span>{{$film->rating}}</span></li>
                                    <li>Genre <span>{{$film->genre}}</span></li>
                                    <li>Rated <span>{{$film->rated}}</span></li>
                                </ul>
                                <div class="text-center"><a href="/film/{{$film->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                            </div>
                        </div>
                        <!-- END TABBED CONTENT -->
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@stop