<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class SignController extends Controller
{   
    /**
     *  @param $openid 用户的openid 作为一个参数传进来
     *  
     *  @return 返回1表示用户没有绑定小帮手 返回2表示用户不在签到时间内签到 返回3表示用户今天已经签到过了 返回0才表示用户签到成功
     *
     */ 
    public function sign(Request $request) {

        // $openid  = $this->getOpenid();
        if (empty(($user = $request->session()->get('weixin.user'))))
                return response()->json(['status' => '输入参数有误， 请重试。']);

        $wx = $request->session()->get('weixin.user');
        $openid = $wx['openid'];

        $userData = $this->getUserData($openid);

        if ($this->hasBind($openid)) {
            $data['num'] = 1;
            return json_encode($data);
        }//用户没有绑定小帮手 返回1

        if(!$this->hasJoined($userData)) {
            $this->joinIn();
            $userData->openid = $wx['openid'];   
            $userData->username = $wx['nickname'];        
        }       

        $userData = $userData[0];


    	if ($this->outTime()) {
    		$data['num'] = 2;
            return json_encode($data);
    	}//不在签到时间内签到 返回2
 
    	if ($this->hasSigned($userData)) {
    	    $data['num'] = 3;
            return json_encode($data);
    	}//用户今天已经签到过了 返回3；
    	
    	if($this->addToDb($userData)) {
            $data['num'] = 0;
            $data['rank'] = $this->getRank();
            return json_encode($data);
    	} else {
            $data['num'] = 4;
            return json_encode($data);
        }  //用户成功签到 返回0
        
    }//处理签到逻辑


    private function hasBind($openid)
    {
    	$timestamp = time();
    	$string = "";
    	$arr = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	for ($i = 0; $i < 16; $i ++) {
    		$y = rand(0,41);
    		$string .= $arr[$y];
    	}
    	$secret = sha1(sha1($timestamp).md5($string).'redrock');

    	$post_data = array(
    		"timestamp" => $timestamp,
    		"string" =>$string,
    		"secret" => $secret,
    		"openid" => $openid,
    		"token" => "gh_68f0a1ffc303",
    	);

    	$url = "http://hongyan.cqupt.edu.cn/MagicLoop/index.php?s=/addon/Api/Api/bindVerify";
		$status = curl_post($url,$post_data);
		$status = json_decode($status);
		$status = $status->status;
		if($status == 200) {
			return 0; //已经绑定
		} else {
			return 1; //没有绑定
		}
    }//判断用户有没有绑定小帮手  绑定返回0  未绑定返回1
    
    private function hasJoined($userData) {
    	if (empty($userData)) {
    		return 0; 		//用户没有参加活动 返回0
    	} else {
    		return 1;		//用户参加了活动 返回1
    	}
    } //判断用户有没有参加签到活动  参加返回1 

    private function joinIn(Request $request) {

        $wx = $request->session()->get('weixin.user');
    	$insertData['openid'] = $wx['openid'];
        $insertData['username'] = $wx['nickname'];

        DB::table('time')->insert($insertData);
        
    }   //将用户添加至数据库
	private function outTime() {
		
	    $time = $this->getTime(); 
 		$startTime = "07:15:00";				//活动开始时间
 		$endTime = "07:45:00";					//活动结束时间
 		if ($time > $startTime && $time < $endTime) {
 			return 0;							//在活动时间范围内返回0
 		} else {	
 			return 1;							//在活动时间范围外 返回1 签到失败
 		}
	}//用户不在签到时间内签到  返回1
    private function hasSigned($userData) {

    	$lastSign = $userData->lastSign;

    	$time = $this->getTime('m-d');
    	if ($time == $lastSign) {
    		return 1;			//今天已经签到返回1
    	} else {
    		return 0;			//今天未签到 返回0
    	}
    	

    }//判断今天是否已经签到 已经签过返回1 否则返回0

    private function addToDb($userData) {
    	$update['days'] = $userData->days + 1;
    	$update['times'] = $userData->times + ($this->getTime('i') - 5) * 60 + $this->getTime('s');
    	$update['lastSign'] = date("m-d", time());
    	$data['openid'] = $userData->openid;
		
    	if(DB::table("time")->where($data)->update($update)) {
            return true;
        } else {
            return false;
        }
    }//将数据添加到数据库


    private function getUserData($openid) {
   	
    	$data['openid'] = $openid;
    
		$userData = DB::table("time")->where($data)->get();
    	return $userData;

    }
    private function getTime($timemate = "H:i:s") {

    	$timezone_out = date_default_timezone_get();
	    date_default_timezone_set('Asia/Shanghai');
	    $time = date($timemate);
	 	date_default_timezone_set($timezone_out);
	 	return $time;

    }
    private function getRank() {
        $data['lastSign'] = $this->getTime("m-d");
        $rank = DB::table("time")->where($data)->count();
        return $rank;
    }
 }