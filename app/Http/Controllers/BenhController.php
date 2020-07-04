<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Benh;
use App\DuocLieu;
class BenhController extends Controller
{
     //
    public function getDanhSach(){
    	$benh = Benh::all();
    	return view('admin.benh.danhsach',['benh'=> $benh]);
    }
    public function getThem(){
    	return view('admin.benh.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,[
    		'tenbenh'=>'required|min:3|max:100|unique:Benh,TenBenh'
    	],
    	[
    		'tenbenh.required'=>'Bạn chưa nhập tên bệnh',
    		'tenbenh.min'=>'Tên bệnh phải có độ dài từ 3 đến 100 kí tự',
    		'tenbenh.max'=>'Tên bệnh phải có độ dài từ 3 đến 100 kí tự',
    		'tenbenh.unique'=>'Tên bệnh đã tồn tại'

    	]);
    	$benh = new Benh;
    	$benh->TenBenh=$request->tenbenh;
        //$benh->TenKhongDau= changeTitle($request->TenBenh);
        if($request->hasFile('hinhbenh'))
        {
            $file = $request->file('hinhbenh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='PNG' &&  $duoi!='JPG' )
            {
                return redirect('admin/benh/them')->with('thongbao','Chỉ được chọn file jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4)."_". $name;
            while (file_exists("upload/HinhBenh/".$Hinh)) 
            {
                $Hinh = str::random(4)."_". $name;  
            }
            $file->move("upload/HinhBenh",$Hinh);
            $benh->HinhBenh = $Hinh;
        }
        else
        {
            $benh->HinhBenh = "";
        }
        $benh->NoiBat= $request->NoiBat;

    	$benh->save();

    	return redirect('admin/benh/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
    	$benh=Benh::find($id);
    	return view('admin.benh.Sua',['benh'=>$benh]);
    }
    public function postSua(Request $request,$id){
    	$benh= Benh::find($id);
    	$this->validate($request,
    		[
    			'tenbenh'=> 'required|unique:Benh,TenBenh|min:3|max:100'
    		],
    		[
    			'tenbenh.required' =>'Bạn chưa nhập tên bệnh',
    			'tenbenh.unique'=>'Tên bệnh đã tồn tại',
    			'tenbenh.min'=>'Tên bệnh phải có độ dài từ 3 cho đến 100 ký tự',
    			'tenbenh.max'=>'Tên bệnh phải có độ dài từ 3 ch đến 100 ký tự'
    		]);
    	$benh->TenBenh= $request->tenbenh;
        //$benh->TenKhongDau= changeTitle($request->TenBenh);
        if($request->hasFile('hinhbenh'))
        {
            $file = $request->file('hinhbenh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='PNG' &&  $duoi!='JPG' )
            {
                return redirect('admin/benh/them')->with('thongbao','Chỉ được chọn file jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4)."_". $name;
            while (file_exists("upload/HinhBenh/".$Hinh)) 
            {
                $Hinh = str::random(4)."_". $name;  
            }

            $file->move("upload/HinhBenh",$Hinh);
            unlink("upload/HinhBenh/".$benh->HinhBenh);
            $benh->HinhBenh = $Hinh;       
            
        }
        $benh->NoiBat= $request->NoiBat;
    	$benh->save();
    	return redirect('admin/benh/sua/'.$id)->with('thongbao','sửa thành công');
    }
    public function getXoa($id){

    	$benh=Benh::find($id);
        //$duoclieu=DuocLieu::find($id);
        $benh->duoclieu()->delete();
    	$benh->delete();
    	return redirect('admin/benh/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
