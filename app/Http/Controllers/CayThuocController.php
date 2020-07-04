<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\CayThuoc;
class CayThuocController extends Controller
{
    public function getDanhSach(){
    	$caythuoc = CayThuoc::all();
    	return view('admin.caythuoc.danhsach',['caythuoc'=> $caythuoc]);
    }
    public function getThem(){
    	return view('admin.caythuoc.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,[
    		'tencaythuoc'=>'required|min:3|max:100|unique:CayThuoc,TenCayThuoc',
            'noidung'=>'required'
    	],
    	[
    		'tencaythuoc.required'=>'Bạn chưa nhập tên cây thuốc',
    		'tencaythuoc.min'=>'Tên cây thuốc có độ dài từ 3 đến 100 kí tự',
    		'tencaythuoc.max'=>'Tên cây thuốc có độ dài từ 3 đến 100 kí tự',
    		'tencaythuoc.unique'=>'Tên cây thuốc đã tồn tại',
            'noidung.required'=>'Bạn chưa nhập nội dung'

    	]);
    	$caythuoc = new CayThuoc;
    	$caythuoc->TenCayThuoc=$request->tencaythuoc;
        //$caythuoc->TenKhongDau= changeTitle($request->TenCayThuoc);
        if($request->hasFile('hinhcaythuoc'))
        {
            $file = $request->file('hinhcaythuoc');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='PNG' &&  $duoi!='JPG' )
            {
                return redirect('admin/caythuoc/them')->with('thongbao','Chỉ được chọn file jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4)."_". $name;
            while (file_exists("upload/HinhCayThuoc/".$Hinh)) 
            {
                $Hinh = str::random(4)."_". $name;  
            }
            $file->move("upload/HinhCayThuoc",$Hinh);
            $caythuoc->HinhCayThuoc = $Hinh;
        }
        else
        {
            $caythuoc->HinhCayThuoc = "";
        }
        $caythuoc->NoiDung=$request->noidung;
        $caythuoc->NoiBat= $request->NoiBat;
    	$caythuoc->save();

    	return redirect('admin/caythuoc/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
    	$caythuoc=CayThuoc::find($id);
    	return view('admin.caythuoc.Sua',['caythuoc'=>$caythuoc]);
    }
    public function postSua(Request $request,$id){
    	$caythuoc= CayThuoc::find($id);
    	$this->validate($request,
    		[
    			'tencaythuoc'=> 'required|unique:CayThuoc,TenCayThuoc|min:3|max:100'
    		],
    		[
    			'tencaythuoc.required' =>'Bạn chưa nhập tên cây thuốc',
    			'tencaythuoc.unique'=>'Tên cây thuốc đã tồn tại',
    			'tencaythuoc.min'=>'Tên cây thuốc phải có độ dài từ 3 cho đến 100 ký tự',
    			'tencaythuoc.max'=>'Tên cây thuốc phải có độ dài từ 3 ch đến 100 ký tự'
    		]);
    	$caythuoc->TenCayThuoc= $request->tencaythuoc;
        //$caythuoc->TenKhongDau= changeTitle($request->TenCayThuoc);
        $caythuoc->NoiDung= $request->noidung;
        if($request->hasFile('hinhcaythuoc'))
        {
            $file = $request->file('hinhcaythuoc');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='PNG' &&  $duoi!='JPG' )
            {
                return redirect('admin/caythuoc/them')->with('thongbao','Chỉ được chọn file jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4)."_". $name;
            while (file_exists("upload/HinhCayThuoc/".$Hinh)) 
            {
                $Hinh = str::random(4)."_". $name;  
            }

            $file->move("upload/HinhCayThuoc",$Hinh);
            unlink("upload/HinhCayThuoc/".$caythuoc->HinhCayThuoc);
            $caythuoc->HinhCayThuoc = $Hinh;       
            
        }
        $caythuoc->NoiBat= $request->NoiBat;
    	$caythuoc->save();
    	return redirect('admin/caythuoc/sua/'.$id)->with('thongbao','sửa thành công');
    }
    public function getXoa($id){
    	$caythuoc=CayThuoc::find($id);
    	$caythuoc->delete();
    	return redirect('admin/caythuoc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
