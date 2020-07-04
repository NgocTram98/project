<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Str;
//use App\BaiThuoc;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\BaiThuoc;
use App\CayThuoc;
use App\DuocLieu;
use App\Benh;
use App\Slide;
class CommentController extends Controller
{
	
	public function getXoa($id,$idbaithuoc){
		$comment = Comment::find($id);
		$comment->delete();
		return redirect('admin/baithuoc/sua/'.$idbaithuoc)->with('thongbao','xóa comment thành công');
	}
	
	public function getXoa1($id,$idcaythuoc){
		$comment = Comment::find($id);
		$comment->delete();
		return redirect('admin/caythuoc/sua/'.$idcaythuoc)->with('thongbao','xóa comment thành công');
	}
	public function getXoa2($id,$idduoclieu){
		$comment = Comment::find($id);
		$comment->delete();
		return redirect('admin/duoclieu/sua/'.$idduoclieu)->with('thongbao','xóa comment thành công');
	}

}