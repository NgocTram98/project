@extends('layout.index')

@section('content')


<!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <?php
            function doimau($str,$tukhoa)
            {
                     return str_replace($tukhoa,"<span style='color:red;'>$tukhoa</span>",$str);
            }

            ?>

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Tìm Kiếm:{{$tukhoa}}</b></h4>
                    </div>

                    @foreach($duoclieu as $dl)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="chitietduoclieu/{{$dl['id']}}">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/HinhDuocLieu/{{$dl->HinhDuocLieu}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>{!!doimau($dl->TenDuocLieu,$tukhoa) !!}</h3>
                            <a class="btn btn-primary" href="chitietduoclieu/{{$dl['id']}}">Xem Thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach()
                    
                    <div style="text-align: center">
                   		 {{$duoclieu->links()}}
                	</div>
                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->
@endsection