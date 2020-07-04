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
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
					    
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Khoa Công Nghệ Thông Tin và Truyền Thông (CTU)<br>
                        Đại học Cần Thơ-Khu II, Đường 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam</p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>tramb1606946@student.ctu.edu.vn </p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>0342896019 </p>
                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15715.319985114442!2d105.7690018!3d10.0308837!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c90a391d232ccce!2zS2hvYSBDw7RuZyBOZ2jhu4cgVGjDtG5nIFRpbiB2w6AgVHJ1eeG7gW4gVGjDtG5nIChDVFUp!5e0!3m2!1svi!2s!4v1593420318353!5m2!1svi!2s" width="820" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
 <!-- end Page Content -->
 @endsection
