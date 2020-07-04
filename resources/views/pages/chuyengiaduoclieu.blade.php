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
                        <h2 style="margin-top:0px; margin-bottom:0px;"><span class="glyphicon glyphicon-align-left"></span>Chuyên gia dược liệu</h2>
                    </div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><img width="820" height="900" src="upload/Hinh/chuyen-gia-duoc-lieuneu.jpg"></h3>
					    
                        <div class="break"></div>
                        <p>Nguồn dược liệu của nước ta đã được giới thiệu trong nhiều tài liệu khác nhau từ viết tay của các thầy lang đến luận văn nghiên cứu khoa học. Những tài liệu đó đều góp phần làm giàu mạnh thêm kho tàng kiến thức về cây thuốc và vị thuốc Việt Nam. Tuy nhiên, qua năm tháng, cùng với sự phát triển hối hả của xã hội hiện đại, sự bão hòa của internet đã khiến không ít thông tin, kiến thức về các loại thảo dược quý bị mai một, sai lệch đáng kể.</p>

						<p>Với mong muốn mang lại những thông tin chính xác đồng thời quảng bá sâu rộng nguồn dược liệu quý Việt Nam,  Website  đã tổng hợp tài liệu từ cuốn “Cây thuốc và động vật làm thuốc Việt Nam”, “ Những cây thuốc và vị thuốc Việt Nam” cùng ý kiến tham vấn của các chuyên gia Dược Liệu hàng đầu để cung cấp thông tin khái quát về hơn 4000 loại dược liệu và thông tin chi tiết của hơn 1400 loại dược liệu quý. Đặc biệt, phần hình ảnh cây thuốc được chọn lọc kĩ lưỡng bởi các dược sĩ có chuyên môn, cùng sự giám sát chặt chẽ của chuyên gia Thực Vật Học giúp phân biệt rõ ràng, tránh nhầm lẫn giữa các loại dược liệu.</p>

						<p>Bên cạnh đó, thông tin về các loài cây thuộc diện quý hiếm, những công dụng được chứng minh bởi nghiên cứu lâm sàng cũng sẽ được chúng tôi cập nhật liên tục tại phần  “Bản tin dược liệu” nhằm cung cấp kiến thức một cách đầy đủ và hữu ích nhất.</p>
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">
                    </div>    
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">
                    </div>
                                     
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

  @endsection