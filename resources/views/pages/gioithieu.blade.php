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
                        <h2 style="margin-top:0px; margin-bottom:0px;"><span class="glyphicon glyphicon-align-left"></span>Giới thiệu</h2>
                    </div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><img width="820" height="200" src="upload/Hinh/gt.jpg"></h3>
					    
                        <div class="break"></div>
					   	<h4><b>Giới thiệu : </b></h4>
                        <p><b>Thiên nhiên Việt Nam là một kho tàng tài nguyên vô giá với nguồn dược liệu đa dạng bao gồm nhiều loại cây, động vật và  khoáng vật quý hiếm. Sự đa dạng về động thực vật của Việt nam đứng hàng thứ hai trên thế giới, chỉ sau mỗi rừng mữa Amazon. Có nhiều loài thực vật đặc hữu. Nền y học cổ truyền Việt Nam dựa trên kinh nghiệm thực tiễn được tích luỹ qua hàng nghìn năm đã biết sử dụng nhiều loại dược liệu tự nhiên này để làm thuốc chữa bệnh. Tuy nhiên, các tri thức dân gian thường được các thầy lang “giấu bài” hoặc “tung hoả mù” về thông tin dẫn đến việc sử dụng cây thuốc nam trong nhân dân thiếu đi tính chính thống và chuẩn mực.</b></p>

						<p>Các tài liệu giới thiệu về Dược liệu Việt Nam chuẩn mực có thể kể đến: Dược Điển Việt Nam, Từ điển Cây thuốc VN của GS.TS Võ Văn Chi, Những Cây thuốc và Vị thuốc Việt Nam của Đỗ Tất Lợi, Cây thuốc và Động vật làm thuốc ở Việt Nam của tâp thể các GS.TS Viện Dược liệu TƯ, Danh lục Cây thuốc Việt Nam của VDL, Một số đầu sách về Cây thuốc địa phương như Cây Thuốc Nghệ An……</p>

						<p>Tuy nhiên việc tiếp cận các nguồn tài liệu trên rất bất cập. Chủ yếu do giá thành in ấn đắt đỏ và tính phổ cập thấp. Hơn nữa lại rất ít hình ảnh thực tế của loại cây cần tìm hiểu. Với mong muốn mang lại những thông tin chính xác, chuẩn mực, dễ tiếp cận, đồng thời quảng bá sâu rộng nguồn dược liệu quý Việt Nam đến với mọi người dân có nhu cầu tìm hiểu,  Website Tracuuduoclieu.vn  đã bắt tay xây dựng Danh lục Cây thuốc điện tử đầu tiên tại Việt Nam. Điều vô cùng đặc biệt và quý giá là Danh lục Cây thuốc điện tử này là Danh lục đầu tiên và duy nhất có đủ hình ảnh thực tế của các loài dược liệu được giới thiệu, giúp bạn đọc quan tâm dễ dàng so sánh, đối chiếu tránh nhầm lẫn. Đây cũng là Danh lục cây thuốc đạt độ chính xác cao nhất về danh pháp Thực vật. Một công trình để đời của Cố CN Ngô Văn Trại, một bậc thầy về Danh pháp thực vật, nguyên là cán bộ Phòng tài nguyên Viện Dược liệu TƯ. Ngoài ra trang Website: tracuuduoclieu.vn  này còn tổng hợp tài liệu từ cuốn “ Cây thuốc và động vật làm thuốc Việt Nam”, “ Những cây thuốc và vị thuốc Việt Nam” cùng ý kiến tham vấn của các chuyên gia Dược Liệu hàng đầu để cung cấp thông tin khái quát về hơn 4000 loại dược liệu và thông tin chi tiết của hơn 1400 loại dược liệu quý. Đặc biệt, phần hình ảnh cây thuốc được chọn lọc kĩ lưỡng bởi các Giáo sư Tiến sỹ đầu ngành về Định danh thực vật giúp phân biệt rõ ràng, tránh nhầm lẫn giữa các loại dược liệu.. </p>
                        <p><b>Để thuận tiện cho người nghiên cứu, thông tin dược liệu được chúng tôi chia ra làm 4 phần chính:</b></p>

						<p><b>Danh lục cây thuốc:</b> Thông tin chính thống, chuẩn mực nhất về Cây thuốc. Tên Khoa học của các loài thực vật trong Danh lục này được định danh theo quy chuẩn mới nhất trên thế giới về định danh thực vật. Là Trang giúp người quan tâm tìm hiểu nhìn đúng cây, xác định đúng loài, tránh nhầm lẫn. Đây là Công trình để đời của cố CN. Ngô Văn Trại
						<p><b>Tra cứu Dược liệu:</b> Cập nhật  thông tin chi tiết hơn về mỗi loại cây, loại động vật nhằm giúp người đọc tìm hiểu sâu hơn về công dụng, tác dụng, cách dùng và lưu ý khi dùng của hơn 1400 loài phổ biến. Thông tin này được lấy từ cuốn Cây thuốc và Động vật làm thuốc ở Việt Nam của Viện dược liệu TƯ.</p>
						<p><b>Tra cứu theo bệnh:</b> gồm 23 nhóm bệnh thường gặp (được phân chia theo y học cổ truyền), đi sâu vào các nhóm là các dược liệu cùng cách sử dụng chúng để điều trị bệnh. Thông tin được lấy từ cuốn Dược thư Quốc gia</p>
						<p><b>Tra cứu theo Bài thuốc:</b> cập nhật thông tin về các bài thuốc quý được lưu truyền từ thời ông cha ta để lại hoặc được sưu tầm từ các danh y nổi tiếng Việt Nam.</p>
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">
                    </div>    
                        <center><h4> Rất mong nhận được sự ủng hộ của các bạn.Trân trọng !!!. </h4></center>
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