<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BaiThuoc;
use App\CayThuoc;
use App\DuocLieu;
use App\Benh;
use App\Slide;
use App\User;
use App\comment;

class PageController extends Controller
{
	function __construct(){
		$slide= Slide::all();
        $baithuoc= BaiThuoc::all();
        $caythuoc= CayThuoc::all();
        $duoclieu = DuocLieu::all();
        $benh= Benh::all();

        $duoclieu_noibat = DuocLieu::where('NoiBat',1)->orderBy('created_at','desc')->first();
        $duoclieu_noibat_list = DuocLieu::where('id', '<>', $duoclieu_noibat->id)->take(5)->get();

        $caythuoc_noibat = CayThuoc::where('NoiBat',1)->orderBy('created_at','desc')->first();
        $caythuoc_noibat_list = CayThuoc::where('id', '<>', $caythuoc_noibat->id)->take(5)->get();

        $benh_noibat = Benh::where('NoiBat',1)->orderBy('created_at','desc')->first();
        $benh_noibat_list = Benh::where('id', '<>', $benh_noibat->id)->take(5)->get();

        $baithuoc_noibat = BaiThuoc::where('NoiBat',1)->orderBy('created_at','desc')->first();
        $baithuoc_noibat_list = BaiThuoc::where('id', '<>', $baithuoc_noibat->id)->take(5)->get();

        view()->share('slide',$slide);
        //view()->share('baithuoc',$baithuoc);
        //view()->share('caythuoc',$caythuoc);
        view()->share(['duoclieu' => $duoclieu, 'duoclieu_noibat_list' => $duoclieu_noibat_list, 'duoclieu_noibat' => $duoclieu_noibat]);
        view()->share('duoclieu_noibat',$duoclieu_noibat);

        view()->share(['caythuoc' => $caythuoc, 'caythuoc_noibat_list' => $caythuoc_noibat_list, 'caythuoc_noibat' => $caythuoc_noibat]);
        view()->share('caythuoc_noibat',$caythuoc_noibat);

        view()->share(['baithuoc' => $baithuoc, 'baithuoc_noibat_list' => $baithuoc_noibat_list, 'baithuoc_noibat' => $baithuoc_noibat]);
        view()->share('baithuoc_noibat',$baithuoc_noibat);

        view()->share(['benh' => $benh, 'benh_noibat_list' => $benh_noibat_list, 'benh_noibat' => $benh_noibat]);
        view()->share('benh_noibat',$benh_noibat);
        //view()->share('benh',$benh);
        if(Auth::check())
        {
            view()->share('nguoidung',Auth::user());
        }
    }
    function trangchu(){
    	return view('pages.trangchu');
    }
    function lienhe(){
    	return view('pages.lienhe');
    }
    function gioithieu()
    {
        
        return view('pages.gioithieu');
    }
     function chuyengiaduoclieu()
    {
        
        return view('pages.chuyengiaduoclieu');
    }
    function benh($id){
        $benh=Benh::find($id);
        $duoclieu=DuocLieu::where('idbenh',$id)->paginate(5);
        return view('pages.benh',['benh'=>$benh,'duoclieu'=>$duoclieu]);
    }
    function danhsachbenh(){
        return view('pages.danhsachbenh');
    }
    function danhsachduoclieu(){
        return view('pages.danhsachduoclieu');
    }
    function danhsachcaythuoc(){
        return view('pages.danhsachcaythuoc');
    }
    function danhsachbaithuoc(){
        return view('pages.danhsachbaithuoc');
    }
    function chitietbaithuoc($id){
        $baithuoc=BaiThuoc::find($id);
        $baithuocnoibat=BaiThuoc::where('NoiBat',1)->take(5)->get();
        $baithuoclienquan=BaiThuoc::where('id','<>',$baithuoc->id)->take(4)->get();
        return view('pages.chitietbaithuoc',['baithuoc'=>$baithuoc,'baithuocnoibat'=>$baithuocnoibat,'baithuoclienquan'=>$baithuoclienquan]);
    }
    function chitietduoclieu($id){
        $duoclieu=DuocLieu::find($id);
        $duoclieunoibat=DuocLieu::where('NoiBat',1)->take(5)->get();
        $duoclieulienquan=DuocLieu::where('id','<>',$duoclieu->id)->take(4)->get();
        return view('pages.chitietduoclieu',['duoclieu'=>$duoclieu,'duoclieunoibat'=>$duoclieunoibat,'duoclieulienquan'=>$duoclieulienquan]);
    }
    function chitietcaythuoc($id){
        $caythuoc=CayThuoc::find($id);
        $caythuocnoibat=CayThuoc::where('NoiBat',1)->take(5)->get();
        $caythuoclienquan=CayThuoc::where('id','<>',$caythuoc->id)->take(4)->get();
        return view('pages.chitietcaythuoc',['caythuoc'=>$caythuoc,'caythuocnoibat'=>$caythuocnoibat,'caythuoclienquan'=>$caythuoclienquan]);
    }

    function getDangnhap(){
        return view('pages.dangnhap');
    }
    function postDangnhap(Request $request)
    {
        $this->validate($request,[
                'email'=>'required',
                'password'=>'required|min:5|max:20'
            ],[
                'email.required'=>'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Mật khẩu có ít nhất 5 ký tự ',
                'password.max'=>'Mật khẩu tối đa 20 ký tự',

            ]);

         if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
             return redirect('trangchu');
         }
         else
         {
            return redirect('dangnhap')->with('thongbao','Đăng nhập ko thành công');
        }
    }

    function postBinhLuan(Request $request)
    {
         $this->validate($request,[
                'NoiDung'=>'required',
            ],[
                'NoiDung.required'=>'Bạn chưa nhập nội dung',

            ]);

         $comment = new comment();

         $comment->NoiDung = $request->NoiDung;
         $comment->Idcaythuoc = $request->Idcaythuoc;
         $comment->Idduoclieu = $request->Idduoclieu;
         $comment->Idbaithuoc = $request->Idbaithuoc;
         $comment->iduser = Auth::user()->id;

         $comment->save();

        if ($request->Idcaythuoc != '')
            return redirect('chitietcaythuoc/'.$request->Idcaythuoc)->with('thongbao','Bình luận thành công');
        elseif ($request->Idbaithuoc != '') {
            return redirect('chitietbaithuoc/'.$request->Idbaithuoc)->with('thongbao','Bình luận thành công');
        }

        return redirect('chitietduoclieu/'.$request->Idduoclieu)->with('thongbao','Bình luận thành công');
    }
    
    function getDangxuat()
    {
        Auth::logout();
        return redirect('trangchu');
    }
    function getNguoidung()
    {
        $user = Auth::user();
        return view('pages.nguoidung',['nguoidung'=>$user]);
    }

    function postNguoidung(Request $request)
    {
         $this->validate($request,[
            'name'=> 'required|min:5',
  
         
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 5 ký tự',
            
        ]);
        $user= Auth::user();
        $user->name = $request->name;
        
        if($request->changePassword =='on')
        {
            $this->validate($request,[
                'password' =>'required|min:5|max:20',
                'passwordAgain' =>'required|same:password'
            ],[
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu có ít nhất 5 ký tự ',
                'password.max'=>'Mật khẩu tối đa 20 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhâp lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
            ]);
            $user->password = bcrypt($request->password);
        }    
        
        $user->save();
        return redirect('nguoidung')->with('thongbao','Bạn đã sửa thành công ');
    }

    function getDangky()
    {
        return view('pages.dangky');
    }


    function postDangky(Request $request)
    {
         $this->validate($request,[
            'name'=> 'required|min:5',
            'email'=>'required|email|unique:users,email',
            'password' =>'required|min:5|max:20',
            'passwordAgain' =>'required|same:password'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Ten người dùng phải có ít nhất 5 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng mail',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 5 ký tự ',
            'password.max'=>'Mật khẩu tối đa 20 ký tự',
            'passwordAgain.required'=>'Bạn chưa nhâp lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
        ]);
        $user= new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->save();
        return redirect('dangky')->with('thongbao','Bạn đã đăng ký thành công');
    }

    function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $duoclieu = DuocLieu::where('TenDuocLieu','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->take(30)->paginate(5);
        return view('pages.timkiem',['duoclieu'=>$duoclieu,'tukhoa'=>$tukhoa]);
    }


}
