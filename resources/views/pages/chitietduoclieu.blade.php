@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$duoclieu->TenDuocLieu}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/HinhDuocLieu/{{$duoclieu->HinhDuocLieu}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on : {{$duoclieu->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                	{!! $duoclieu->NoiDung !!}
                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(Auth::user())
                <div class="well">
                    @if(count($errors) > 0)
                        <span class="text-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}<br>
                            @endforeach
                        </span>
                    @endif
                    @if(session('thongbao'))
                        <span class="text-success">
                            {{session('thongbao')}}
                        </span>
                    @endif
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="binhluan" method="post" role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="Idduoclieu" value="{{$duoclieu->id}}">
                        <div class="form-group">
                            <textarea class="form-control" name="NoiDung" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>
                @endif

              

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($duoclieu->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->users->name}}
                            <small>{{$cm->created_at}}</small>
                        </h4>
                        {!! $cm->NoiDung !!}
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Dược liệu liên quan</b></div>
                    <div class="panel-body">
                    @foreach($duoclieulienquan as $dllq)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitietduoclieu/{{$dllq->id}}">
                                    <img class="img-responsive" src="upload/HinhDuocLieu/{{$dllq->HinhDuocLieu}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitietduoclieu/{{$dllq->id}}"><b>{{$dllq->TenDuocLieu}}</b></a>
                            </div>
                            <div class="break"></div>
                        </div>
                       <!-- end item -->
                    @endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Dược liệu nổi bật</b></div>
                    <div class="panel-body">
                    	@foreach($duoclieunoibat as $dlnb)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitietduoclieu/{{$dlnb['id']}}">
                                    <img class="img-responsive" src="upload/HinhDuocLieu/{{$dlnb->HinhDuocLieu}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <b>{{$dlnb->TenDuocLieu}}</b>
                            </div>
                            <div class="break"></div>
                        </div>               
                        <!-- end item -->
                        @endforeach
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection