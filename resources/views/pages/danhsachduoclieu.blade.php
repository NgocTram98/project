@extends('layout.index')
@section('content')

   <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    
                        <h4><b>Danh sách dược liệu</b></h4>
                    </div>

                    <div class="row-item row">
                    	@foreach($duoclieu as $dl)
                        <div class="col-md-3">

                            <a href="chitietduoclieu/{{$dl['id']}}">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/HinhDuocLieu/{{$dl->HinhDuocLieu}}" alt="">
                            </a>
                        </div>
                        
                        <div class="col-md-9">
                            <h3>{{$dl->TenDuocLieu}}</h3>
                            <a class="btn btn-primary" href="chitietduoclieu/{{$dl['id']}}">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
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