@extends('home.layouts.app')
@section('style')
@parent
@endsection
@section('content')
    <div class="videoMain" id="videoss">
        <div class="videoHeader">
            <a href="{{URL('video-list',[$Video['video_id']])}}">
                <
            </a>
        </div>
        <div class="videoDiv">
            <div id="video" style="width: 80%; height:100%;"></div>
            <!-- <video id="vis" ref="videosCon" preload="auto" src="{{$video_url}}" poster="">
                <source src="{{$video_url}}" type="video/mp4">
            </video> -->
            <div class="videoListzj">
                <p class="sectionList" ><!-- <i class="iconfont icon-zhangjie"></i> -->章节</p>
                <div class="listCon">
                    <p class="videoTit fon14">{{$VideoCourse['title']}}</p>
                    @foreach($Video['VideoCourseMany'] as $k=>$v)
                    <a href="{{URL('video-play',[$v['course_id']])}}" @if($v['course_id']==$VideoCourse['course_id']) class="on" @endif>
                        <i class="iconfont icon-bofang"></i>
                        <span>{{$v['title']}}</span>
                        <i class="iconfont icon-dui" v-if="false"></i>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('script')
@parent
<script>
    var videoObject = {
        container: '#video', //容器的ID或className
        variable: 'player',//播放函数名称
        flashplayer:true,
        poster:'{{asset('resources/home/images/ico/ico25.jpg')}}',//封面图片
        //flashplayer:true,
        video: [//视频地址列表形式
            ['{{asset($video_url)}}', 'video/mp4', '', 0],
        ]
    };
    var player = new ckplayer(videoObject);
</script>
@endsection