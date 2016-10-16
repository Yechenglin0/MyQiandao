<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
class ListController extends Controller
{
	
	public function showList() {
    	$list = $this->getList();
    	$myRank = $this->getMyrank($list);
    	return view('banList')->with(['list'=>$list,'myRank'=>$myRank]);
    	// var_dump($list);
    	// return view('list')->with(['list'=>$list,'myRank'=>$myRank]);
    } //跳转到List.blade.php
	private function getList() {
		
		$list = DB::table("time")->select("openid","username","days","times")->orderBy('days','desc')->orderBy('times')->limit(10)->get();
		return $list;

	}//从数据库获取到排名数据
	private function getMyrank(Request $request,$list) {	
		$wx = $request->session()->get('weixin.user');
		$openid = $wx['openid'];
		foreach ($list as $key => $userData) {
			if($userData->openid == $openid) {
				return $key + 1;
			}		
		}
	}
	
}
