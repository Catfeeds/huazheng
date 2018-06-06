<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Validator,Auth;
use App\Models\Video,App\Models\VideoCourse,App\Models\User,App\Models\Category;

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
        //视频列表
        $video_list = Video::VideoList([
            'cate_id' =>$request['cate_id'],
            'type'    =>$request['type'],
            'paginate'=>16,
        ]);
        $location = [
            0=>[
                'title'=>'视频课程',
            ],
        ];
        $Category = Category::where('type',1)->orderBy('order',"ASC")->get();
        $assign = [
            'head_title' => '视频课程',
            'location'   => $location,
            'video_list' => $video_list,
            'Category'   => $Category,
        ];
        return view('home.video.video-list');
    }
    
    
}
