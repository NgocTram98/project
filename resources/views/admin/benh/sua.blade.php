@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bệnh
                            <small>{{$benh->TenBenh}}</small>
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
                        <form action="admin/benh/sua/{{$benh->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                                <label>Tên bệnh</label>
                                <input class="form-control" name="tenbenh" placeholder="Nhập tên bệnh" value="{{$benh->TenBenh}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình bệnh</label>
                                <p>
                                <img width="400px" src="upload/HinhBenh/{{$benh->HinhBenh}}">
                                </p>
                                <input type="file"class="form-control" name="hinhbenh" placeholder="Chọn file hình"/>
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0"
                                    @if($benh->NoiBat==0)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" 
                                    @if($benh->NoiBat==1)
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
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->
@endsection