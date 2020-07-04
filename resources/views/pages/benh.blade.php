@extends('layout.index')
@section('content')

   <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$benh->TenBenh}}</b></h4>
                    </div>

                    <div class="row-item row">
                    	@foreach($duoclieu as $dl2)
                        <div class="col-md-3">

                            <a href="chitietduoclieu/{{$dl2['id']}}">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/HinhDuocLieu/{{$dl2->HinhDuocLieu}}" alt="">
                            </a>
                        </div>
                        
                        <div class="col-md-9">
                            <h3>{{$dl2->TenDuocLieu}}</h3>
                            <a class="btn btn-primary" href="chitietduoclieu/{{$dl2['id']}}">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    	@endforeach
                    	{{$duoclieu->links()}}                 

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->



@endsection