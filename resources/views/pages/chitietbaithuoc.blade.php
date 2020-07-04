@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$baithuoc->TenBaiThuoc}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/HinhBaiThuoc/{{$baithuoc->HinhBaiThuoc}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on : {{$baithuoc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                	{!! $baithuoc->NoiDung !!}
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
                        <input type="hidden" name="Idbaithuoc" value="{{$baithuoc->id}}">
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
                @foreach($baithuoc->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->users->name}}
                            <small>{{$cm->created_at}}</small>
                        </h4>
                      	{{$cm->NoiDung}}
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Bài thuốc liên quan</b></div>
                    <div class="panel-body">
                    @foreach($baithuoclienquan as $btll)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitietbaithuoc/{{$btll->id}}">
                                    <img class="img-responsive" src="upload/HinhBaiThuoc/{{$btll->HinhBaiThuoc}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitietbaithuoc/{{$btll->id}}"><b>{{$btll->TenBaiThuoc}}</b></a>
                            </div>
                            <div class="break"></div>
                        </div>
                       <!-- end item -->
                    @endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Bài thuốc nổi bật</b></div>
                    <div class="panel-body">
                    	@foreach($baithuocnoibat as $btnb)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitietbaithuoc/{{$btnb->id}}">
                                    <img class="img-responsive" src="upload/HinhBaiThuoc/{{$btnb->HinhBaiThuoc}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <b>{{$btnb->TenBaiThuoc}}</b>
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