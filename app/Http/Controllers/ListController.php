<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
class ListController extends Controller
{
	
	public function showList(Request $request) {
    	$list = $this->getList();
    
        if($request->session()->has('myData')) {
            $myData = $request->session()->get('myData');
            // var_dump($myData);
            $openid = $myData->data->openid;
            $username = $myData->data->nickname;
        
        } else {
            $myData = $this->getData($request);

            var_dump($myData);
            exit;
            // $openid = $myData->data->openid;
            // $username = $myData->data->nickname;
        }   

    	$myRank = $this->getMyrank($list,$openid);
    	return view('banList')->with(['list'=>$list,'myRank'=>$myRank]);
    	// var_dump($list);
    	// return view('list')->with(['list'=>$list,'myRank'=>$myRank]);
    } //跳转到List.blade.php
	private function getList() {
		
		$list = DB::table("time")->select("openid","username","days","times")->orderBy('days','desc')->orderBy('times')->limit(10)->get();
		return $list;

	}//从数据库获取到排名数据
	private function getMyrank($list,$openid) {	
		
		
		foreach ($list as $key => $userData) {
			if($userData->openid == $openid) {
				return $key + 1;
			}		
		}
	}
	
    private function getData(Request $request)
    {
        // $redirect_uri = urlencode("http://localhost/qiandao/server.php/sign");
        $redirect_uri = urlencode("http://hongyan.cqupt.edu.cn/qiandao/server.php/sign");

        if (!isset($_GET['code'])) {

            redirect("http://hongyan.cqupt.edu.cn/GetWeixinCode/get-weixin-code.html?appid=wx81a4a4b77ec98ff4&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=fuckweixin#wechat_redirect");

        } else {

            $code = $_GET['code'];
            $time = time();
            $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string = '';
            for($i = 0; $i < 16; $i ++) {
                $num = mt_rand(0,61);
                $string .= $str[$num];
            }
            $secret = sha1(sha1($time).md5($string)."redrock");
            $t2 = array(
                'timestamp'=>$time,
                'string'=>$string,
                'secret'=>$secret,
                "token" => "gh_68f0a1ffc303",
                'code'=>$code,
            );
            $url = "http://hongyan.cqupt.edu.cn/MagicLoop/index.php?s=/addon/Api/Api/webOauth";
            $data = json_decode(curl_post($url,$t2));
            // $openid = $data['openid'];
            
            $request->session()->set('myData', $data);
       
            return $data;
        }
    }
}
