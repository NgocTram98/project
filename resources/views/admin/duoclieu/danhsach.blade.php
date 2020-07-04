@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dược Liệu
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
                                <th>Tên dược liệu</th>
                                <!-- <th>Tên không dấu</th> -->
                                <th>Hình dược liệu</th>
                                <th>Tên Bệnh</th>
                                <th>Nội dung</th>
                                <th>Nổi bật</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($duoclieu as $dl)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$dl->id}}</td>
                                    <td>{{$dl->TenDuocLieu}}</td>
                                    <!-- <td>{{$dl->TenKhongDau}}</td> -->
                                    <td><img width="100px" src="upload/HinhDuocLieu//{{$dl->HinhDuocLieu}}" /></td>
                                    <td>{{$dl->benh->TenBenh}}</td>
                                     <td>{{$dl->NoiDung}}</td>
                                    <td>
                                        @if($dl->NoiBat==0)
                                        {{'Không'}}
                                        @else
                                        {{'Có'}}
                                        @endif
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/duoclieu/xoa/{{$dl->id}}">Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/duoclieu/sua/{{$dl->id}}">Edit</a></td>
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