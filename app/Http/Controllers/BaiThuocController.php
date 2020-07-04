<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\BaiThuoc;
use App\Comment;
class BaiThuocController extends Controller
{
    //
    public function getDanhSach(){
    	$baithuoc = BaiThuoc::all();
    	return view('admin.baithuoc.danhsach',['baithuoc'=> $baithuoc]);
    }
    public function getThem(){
    	return view('admin.baithuoc.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,[
    		'tenbaithuoc'=>'required|min:3|max:100|unique:BaiThuoc,TenBaiThuoc',
            'noidung'=>'required'
    	],
    	[
    		'tenbaithuoc.required'=>'Bạn chưa nhập tên bài thuốc',
    		'tenbaithuoc.min'=>'Tên bài thuốc phải có độ dài từ 3 đến 100 kí tự',
    		'tenbaithuoc.max'=>'Tên bài thuốc phải có độ dài từ 3 đến 100 kí tự',
    		'tenbaithuoc.unique'=>'Tên bài thuốc đã tồn tại',
            'noidung.required'=>'Bạn chưa nhập nội dung'

    	]);
    	$baithuoc = new BaiThuoc;
    	$baithuoc->TenBaiThuoc=$request->tenbaithuoc;
        //$baithuoc->TenKhongDau=changeTitle($request->TenBaiThuoc);
        $baithuoc->NoiDung=$request->noidung;
        $baithuoc->NoiBat= $request->NoiBat;
        if($request->hasFile('hinhbaithuoc'))
        {
            $file = $request->file('hinhbaithuoc');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='PNG' &&  $duoi!='JPG' )
            {
                return redirect('admin/baithuoc/them')->with('thongbao','Chỉ được chọn file jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4)."_". $name;
            while (file_exists("upload/HinhBaiThuoc/".$Hinh)) 
            {
                $Hinh = str::random(4)."_". $name;  
            }
            $file->move("upload/HinhBaiThuoc",$Hinh);
            $baithuoc->HinhBaiThuoc = $Hinh;
        }
        else
        {
            $baithuoc->HinhBaiThuoc = "";
        }
    	$baithuoc->save();

    	return redirect('admin/baithuoc/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
    	$baithuoc=BaiThuoc::find($id);
    	return view('admin.baithuoc.Sua',['baithuoc'=>$baithuoc]);
    }
    public function postSua(Request $request,$id){
    	$baithuoc= BaiThuoc::find($id);
    	$this->validate($request,
    		[
    			'tenbaithuoc'=> 'required|unique:BaiThuoc,TenBaiThuoc|min:3|max:100'
    		],
    		[
    			'tenbaithuoc.required' =>'Bạn chưa nhập tên bài thuốc',
    			'tenbaithuoc.unique'=>'Tên bài thuốc đã tồn tại',
    			'tenbaithuoc.min'=>'Tên bài thuốc phải có độ dài từ 3 cho đến 100 ký tự',
    			'tenbaithuoc.max'=>'Tên bài thuốc phải có độ dài từ 3 ch đến 100 ký tự'
    		]);
    	$baithuoc->TenBaiThuoc= $request->tenbaithuoc;
        //$baithuoc->TenKhongDau= changeTitle($request->TenBaiThuoc);
        $baithuoc->NoiDung= $request->noidung;
        if($request->hasFile('hinhbaithuoc'))
        {
            $file = $request->file('hinhbaithuoc');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='PNG' &&  $duoi!='JPG' )
            {
                return redirect('admin/baithuoc/them')->with('thongbao','Chỉ được chọn file jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4)."_". $name;
            while (file_exists("upload/HinhBaiThuoc/".$Hinh)) 
            {
                $Hinh = str::random(4)."_". $name;  
            }

            $file->move("upload/HinhBaiThuoc",$Hinh);
            unlink("upload/HinhBaiThuoc/".$baithuoc->HinhBaiThuoc);
            $baithuoc->HinhBaiThuoc = $Hinh;       
            
        }
        $baithuoc->NoiBat= $request->NoiBat;
    	$baithuoc->save();
        
    	return redirect('admin/baithuoc/sua/'.$id)->with('thongbao','sửa thành công');
    }
    public function getXoa($id){
    	$baithuoc=BaiThuoc::find($id);
    	$baithuoc->delete();
    	return redirect('admin/baithuoc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
