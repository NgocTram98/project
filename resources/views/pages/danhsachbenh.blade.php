@extends('layout.index')
@section('content')

   <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Danh sách bệnh</b></h4>
                    </div>

                    <div class="row-item row">
                    	@foreach($benh as $b)
                        <div class="col-md-3">

                            <a href="benh/{{$b->id}}">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/HinhBenh/{{$b->HinhBenh}}" alt="">
                            </a>
                        </div>
                        
                        <div class="col-md-9">
                            <h3>{{$b->TenBenh}}</h3>
                            <a class="btn btn-primary" href="benh/{{$b->id}}">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
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