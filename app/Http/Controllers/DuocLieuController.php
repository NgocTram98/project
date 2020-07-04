<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Benh;
use App\DuocLieu;

class DuocLieuController extends Controller
{
    public function getDanhSach(){
    	$duoclieu = DuocLieu::all();
    	return view('admin.duoclieu.danhsach',['duoclieu'=> $duoclieu]);
    }
    public function getThem(){
    	$benh = Benh::all();
    	return view('admin.duoclieu.them',['benh'=>$benh]);
    }
    public function postThem(Request $request){
    	$this->validate($request,[
    		'tenduoclieu'=>'required|min:1|max:100|unique:DuocLieu,TenDuocLieu',
    		'benh'=>'required',
            'noidung'=>'required'
    	],
    	[
    		'tenduoclieu.required'=>'Bạn chưa nhập tên dược liệu',
    		'tenduoclieu.min'=>'Tên dược liệu phải có độ dài từ 1 đến 100 kí tự',
    		'tenduoclieu.max'=>'Tên dược liệu phải có độ dài từ 1 đến 100 kí tự',
    		'tenduoclieu.unique'=>'Tên dược liệu đã tồn tại',
    		'benh.required'=>'Bạn chưa chọn bệnh'

    	]);
    	$duoclieu = new DuocLieu;
    	$duoclieu->TenDuocLieu=$request->tenduoclieu;
        //$duoclieu->TenKhongDau= changeTitle($request->TenDuocLieu);
        $duoclieu->NoiDung=$request->noidung;
        $duoclieu->NoiBat= $request->NoiBat;
        if($request->hasFile('hinhduoclieu'))
        {
            $file = $request->file('hinhduoclieu');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='PNG' &&  $duoi!='JPG' )
            {
                return redirect('admin/duoclieu/them')->with('thongbao','Chỉ được chọn file jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4)."_". $name;
            while (file_exists("upload/HinhDuocLieu/".$Hinh)) 
            {
                $Hinh = str::random(4)."_". $name;  
            }
            $file->move("upload/HinhDuocLieu",$Hinh);
            $duoclieu->HinhDuocLieu = $Hinh;
        }
        else
        {
            $duoclieu->HinhDuocLieu = "";
        }
    	$duoclieu->idbenh=$request->benh;
    	$duoclieu->save();

    	return redirect('admin/duoclieu/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
    	$benh= Benh::all();
    	$duoclieu=DuocLieu::find($id);
    	return view('admin.duoclieu.Sua',['duoclieu'=>$duoclieu,'benh'=>$benh]);
    }
    public function postSua(Request $request,$id){
    	$duoclieu= DuocLieu::find($id);
    	$this->validate($request,
    		[
    			'tenduoclieu'=>'required|min:1|max:100|unique:DuocLieu,TenDuocLieu',
    			'benh'=>'required'
    		],
    		[
    			'tenduoclieu.required'=>'Bạn chưa nhập tên dược liệu',
    			'tenduoclieu.min'=>'Tên dược liệu phải có độ dài từ 1 đến 100 kí tự',
    			'tenduoclieu.max'=>'Tên dược liệu phải có độ dài từ 1 đến 100 kí tự',
    			'benh.required'=>'Bạn chưa chọn bệnh',
                'noidung.required'=>'Bạn chưa nhập nội dung'
    		]);
    	$duoclieu=DuocLieu::find($id);
    	$duoclieu->TenDuocLieu= $request->tenduoclieu;
        //$duoclieu->TenKhongDau= changeTitle($request->TenDuocLieu);
        $duoclieu->NoiDung=$request->noidung;
        $duoclieu->NoiBat= $request->NoiBat;
        if($request->hasFile('hinhduoclieu'))
        {
            $file = $request->file('hinhduoclieu');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='PNG' &&  $duoi!='JPG' )
            {
                return redirect('admin/duoclieu/them')->with('thongbao','Chỉ được chọn file jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4)."_". $name;
            while (file_exists("upload/HinhDuocLieu/".$Hinh)) 
            {
                $Hinh = str::random(4)."_". $name;  
            }

            $file->move("upload/HinhDuocLieu",$Hinh);
            unlink("upload/HinhDuocLieu/".$duoclieu->HinhDuocLieu);
            $duoclieu->HinhDuocLieu = $Hinh;       
            
        }
    	$duoclieu->idbenh=$request->benh;
    	$duoclieu->save();
    	return redirect('admin/duoclieu/sua/'.$id)->with('thongbao','sửa thành công');
    }
    public function getXoa($id){
    	$duoclieu=DuocLieu::find($id);
    	$duoclieu->delete();
    	return redirect('admin/duoclieu/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
