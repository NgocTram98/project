@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bệnh
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
                                <th>Tên bệnh</th>
                                <!-- <th>Tên không dấu</th> -->
                                <th>Hình bệnh</th>
                                <th>Nổi bật</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($benh as $b)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$b->id}}</td>
                                    <td>{{$b->TenBenh}}</td>
                                    <!-- <td>{{$b->TenKhongDau}}</td> -->
                                    <td><img width="100px" src="upload/HinhBenh//{{$b->HinhBenh}}" /></td>
                                    <td>
                                        @if($b->NoiBat==0)
                                        {{'Không'}}
                                        @else
                                        {{'Có'}}
                                        @endif
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/benh/xoa/{{$b->id}}">Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/benh/sua/{{$b->id}}">Edit</a></td>
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