<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Validator,Auth;
use App\Models\Video,App\Models\VideoCourse,App\Models\User,App\Models\Category,App\Models\VideoOrder;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
        parent::__construct();
        // $this->middleware('auth');
    }
    public function video_list(Request $request){
        //课程列表
        $order = array();
        if($request['order']=='number'){
            $order[] = [
                'order'=>'number',
                'sort'=>'DESC',
            ];
        }
        $video_list = Video::VideoList([
            'cate_id'  =>$request['cate_id'],
            'type'     =>$request['type'],
            'order'    =>$order,
            'paginate' =>16,
        ]);
        $location = [
            0=>[
                'title'=>'学习课程',
            ],
        ];
        $Category = Category::where('type',1)->orderBy('order',"ASC")->get();
        $assign = [
            'head_title' => '学习课程',
            'location'   => $location,
            'video_list' => $video_list,
            'Category'   => $Category,
        ];
        return view('home.video.video-list',$assign);
    }
    public function video_info(Request $request,$id){
        //课程详情
        $user_info = Auth::user();
        $info = Video::with(['CategoryTo','VideoCourseMany'])->where('video_id',$id)->first();
        if(!$info){
            return redirect()->back();
        }
        $info['is_pay'] = false;
        if($user_info['id']>0){
            $is_pay = VideoOrder::is_pay($id,$user_info['id']);
            switch ($info['is_fee']) {
                case '1':
                //全部收费
                    if($is_pay){
                        $is_pay = "已购买";
                    }
                    break;
                case '2':
                //vip免费，普通会员收费
                    if($is_pay){
                        $is_pay = "已购买";
                    }elseif($user_info['grade']==2){
                        $is_pay = "免费观看";
                    }
                    break;
                case '3':
                    $is_pay = "免费观看";
                    break;
            }
        }
        $location = [
            0=>[
                'url'=>URL('video-list'),
                'title'=>'学习课程',
            ],
            1=>[
                'title'=>$info['title'],
            ],
        ];
        $assign = [
            'location'         => $location,
            'info'             => $info,
            'is_pay'           => $is_pay,
            'head_title'       => !empty($info['seo_title'])?$info['seo_title']:$info['title'],
            'head_keywords'    => !empty($info['seo_keywords'])?$info['seo_keywords']:$info['title'],
            'head_description' => !empty($info['seo_description'])?$info['seo_description']:$info['title'],
        ];
        return view('home.video.video-info',$assign);
    }
    public function video_play(Request $request,$id){
        //课程播放
        $user_info = Auth::user();
        $VideoCourse = VideoCourse::find($id);
        if(!$VideoCourse){
            return redirect()->back();
        }
        $Video = Video::with(['CategoryTo','VideoCourseMany'])->find($VideoCourse['video_id']);
        if(!$Video){
            return redirect()->back();
        }
        $is_video = true;
        $video_url = '';
        $is_pay = VideoOrder::is_pay($Video['video_id'],$user_info['id']);
        if($is_pay||($Video['is_fee']==2&&$user_info['grade']==2)||$Video['is_fee']==3){
            //可以查看正式视频的
            $video_url = $VideoCourse['video'];
            $is_video = false;
        }elseif(!empty($VideoCourse['try_video'])){
            //有试看的
            $video_url = $VideoCourse['try_video'];
        }
        // dd($video_url);
        if($is_video&&empty($video_url)){
            //没得观看，跳转回去
            return redirect('video-info/'.$Video['video_id'])->with('error_message',"请先购买课程");
        }

        $assign = [
            'Video'            => $Video,
            'VideoCourse'      => $VideoCourse,
            'video_url'        => $video_url,
            'is_video'         => $is_video,
            'is_header'        => 0,//隐藏头部
            'is_footer'        => 0,//隐藏底部
            'head_title'       => !empty($Video['seo_title'])?$Video['seo_title']:$Video['title'],
            'head_keywords'    => !empty($Video['seo_keywords'])?$Video['seo_keywords']:$Video['title'],
            'head_description' => !empty($Video['seo_description'])?$Video['seo_description']:$Video['title'],
        ];
        return view('home.video.video-play',$assign);
    }
    public function video_pay(Request $request,$id){
        //课程购买
        $user_info = Auth::user();
        $Video = Video::find($id);
        if(!$Video){
            return redirect()->back();
        }
        $is_pay = VideoOrder::is_pay($id,$user_info['id']);
        if($is_pay||($Video['is_fee']==2&&$user_info['grade']==2)||$Video['is_fee']==3){
            //已经购买或无需购买的跳转回去
            return redirect('video-info/'.$id);
        }
        //生成订单
        $arr = new VideoOrder;
        $arr->user_id = $user_info['id'];
        $arr->video_id = $id;
        $arr->status = 2;
        $arr->price = $Video['price'];
        $arr->order_no = video_order_no();
        $arr->save();

        return redirect('video-info/'.$id);
    }
}
