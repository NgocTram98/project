@extends('layout.index')
@section('content')

   <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Danh sách cây thuốc</b></h4>
                    </div>

                    <div class="row-item row">
                    	@foreach($caythuoc as $ct)
                        <div class="col-md-3">

                            <a href="chitietcaythuoc/{{$ct['id']}}">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/HinhCayThuoc/{{$ct->HinhCayThuoc}}" alt="">
                            </a>
                        </div>
                        
                        <div class="col-md-9">
                            <h3>{{$ct->TenCayThuoc}}</h3>
                            <a class="btn btn-primary" href="chitietcaythuoc/{{$ct['id']}}">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                        @endforeach
                    </div>
                    	
                    	
                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->



@endsection