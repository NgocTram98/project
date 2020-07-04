    @extends('layout.index')
    @section('content')
    <!-- Page Content -->
    <div class="container">

    	@include('layout.slide')

        <div class="space20"></div>


        <div class="row main-left">
           @include('layout.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Thuốc Đông Y</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
					    <div class="row-item row">
		                	<h3>
		                		Tra cứu dược liệu
		                	</h3>
		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">
			                        <a href="chitietduoclieu/{{$duoclieu_noibat['id']}}">
			                            <img class="img-responsive" src="upload/HinhDuocLieu/{{$duoclieu_noibat['HinhDuocLieu']}}" alt="">
			                        </a>
			                    </div>

			                    <div class="col-md-7">
			                        <h3>{{$duoclieu_noibat['TenDuocLieu']}}</h3>
			                        <a class="btn btn-primary" href="chitietduoclieu/{{$duoclieu_noibat['id']}}">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>

		                	</div>
		                    
							<div class="col-md-4">
								@foreach($duoclieu_noibat_list as $dl2)
								<a href="chitietduoclieu/{{$dl2['id']}}">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{$dl2['TenDuocLieu']}}
									</h4>
								</a>
								@endforeach
							</div>
							
							<div class="break"></div>
		                </div>
		                <!-- end item -->
		                <!-- item -->
					    <div class="row-item row">
		                	<h3>Danh lục cây thuốc</h3>
		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">		      
			                        <a href="chitietcaythuoc/{{$caythuoc_noibat['id']}}">
			                            <img class="img-responsive" src="upload/HinhCayThuoc/{{$caythuoc_noibat['HinhCayThuoc']}}" alt="">
			                        </a>			            
			                	</div>
			                    <div class="col-md-7">
			                        <h3>{{$caythuoc_noibat['TenCayThuoc']}}</h3>			   
			                        <a class="btn btn-primary" href="chitietcaythuoc/{{$caythuoc_noibat['id']}}">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
		                	</div>	                    		            
							<div class="col-md-4">
								@foreach($caythuoc_noibat_list as $ct2)
								<a href="chitietcaythuoc/{{$ct2['id']}}">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{$ct2['TenCayThuoc']}}
									</h4>
								</a>
								@endforeach
							<div class="break"></div>
		                </div>
		                <!-- end item -->
		                <!-- item -->
					    <div class="row-item row">
		                	<h3>Tra cứu theo bệnh|
		                	@foreach($benh as $b)
			                		<small><a href="benh/{{$b->id}}"><i>{{$b->TenBenh}}</i></a>/</small>
			                @endforeach 		    
		                	</h3>
		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">
			                        <a href="benh/{{$benh_noibat['id']}}">
			                            <img class="img-responsive" src="upload/HinhBenh/{{$benh_noibat['HinhBenh']}}" alt="">
			                        </a>
			                    </div>
			                    <div class="col-md-7">
			                        <h3>{{$benh_noibat['TenBenh']}}</h3>			                    
			                        <a class="btn btn-primary" href="benh/{{$benh_noibat['id']}}">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
		                	</div>
		                    

							<div class="col-md-4">
								@foreach($benh_noibat_list as $b2)
								<a href="benh/{{$b2['id']}}">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{$b2['TenBenh']}}
									</h4>
								</a>
								@endforeach
							</div>
							<div class="break"></div>
		                </div>
		                <!-- end item -->
		                <!-- item -->
					    <div class="row-item row">
		                	<h3>Tra cứu bài thuốc
		                	</h3>
		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">
			                        <a href="chitietbaithuoc/{{$baithuoc_noibat['id']}}">
			                            <img class="img-responsive" src="upload/HinhBaiThuoc/{{$baithuoc_noibat['HinhBaiThuoc']}}" alt="">
			                        </a>
			                    </div>
			                    <div class="col-md-7">
			                        <h3>{{$baithuoc_noibat['TenBaiThuoc']}}</h3>		                       
			                        <a class="btn btn-primary" href="chitietbaithuoc/{{$baithuoc_noibat['id']}}">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
		                	</div>
		                    

							<div class="col-md-4">
								@foreach($baithuoc_noibat_list as $bt2)
								<a href="chitietbaithuoc/{{$bt2['id']}}">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{$bt2['TenBaiThuoc']}}
									</h4>
								</a>
								@endforeach
							</div>
							<div class="break"></div>
		                </div>
		                <!-- end item -->

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
    @endsection