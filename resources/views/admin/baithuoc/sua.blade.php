@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài Thuốc
                            <small>{{$baithuoc->TenBaiThuoc}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/baithuoc/sua/{{$baithuoc->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                                <label>Tên bài thuốc</label>
                                <input class="form-control" name="tenbaithuoc" placeholder="Nhập tên bài thuốc" value="{{$baithuoc->TenBaiThuoc}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình bài thuốc</label>
                                <p>
                                <img width="400px" src="upload/HinhBaiThuoc/{{$baithuoc->HinhBaiThuoc}}">
                                </p>
                                <input type="file"class="form-control" name="hinhbaithuoc" placeholder="Chọn file hình"/>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="noidung" class="form-control ckeditor" rows="5">{{$baithuoc->NoiDung}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0"
                                    @if($baithuoc->NoiBat==0)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" 
                                    @if($baithuoc->NoiBat==1)
                                        {{"checked"}}
                                    @endif
                                    type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình luận
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($baithuoc->comment as $cm)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$cm->id}}</td>
                                    <td>{{$cm->users->name}}</td>
                                    <td>{{$cm->NoiDung}}</td>
                                    <td>{{$cm->created_at}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$baithuoc->id}}">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--end row-->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->



@endsection