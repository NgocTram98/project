@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài Thuốc
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
                                <th>Tên bài thuốc</th>
                                <!-- <th>Tên không dấu</th> -->
                                <th>Hình bài thuốc</th>
                                <th>Nội dung</th>
                                <th>Nổi bật</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($baithuoc as $bt)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$bt->id}}</td>
                                    <td>{{$bt->TenBaiThuoc}}</td>
                                    <!-- <td>{{$bt->TenKhongDau}}</td> -->
                                    <td><img width="100px" src="upload/HinhBaiThuoc//{{$bt->HinhBaiThuoc}}" /></td>
                                    <td>{{$bt->NoiDung}}</td>
                                    <td>
                                        @if($bt->NoiBat==0)
                                        {{'Không'}}
                                        @else
                                        {{'Có'}}
                                        @endif
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/baithuoc/xoa/{{$bt->id}}">Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/baithuoc/sua/{{$bt->id}}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->
@endsection