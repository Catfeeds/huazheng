@extends('home.layouts.app')
@section('style')
@parent
@endsection
@section('content')
    <div class="videoMain" id="videoss">
        <div class="videoHeader">
            <a href="{{URL('video-info',[$Video['video_id']])}}">
                <i class="iconfont icon-houtui"></i>
            </a>
        </div>
        <div class="videoDiv">
            
            <!-- <video id="vis" ref="videosCon" preload="auto" src="{{$video_url}}" poster="">
                <source src="{{$video_url}}" type="video/mp4">
            </video> -->
            @if(strstr($video_url,".mp3"))
                <video src="{{asset($video_url)}}" controls="controls" poster="{{asset($Video['img'])}}" id="video" style="width: 80%; height:100%;"></video>
            @else
                <div id="video" style="width: 80%; height:100%;"></div>
            @endif
            <div class="videoListzj">
                <p class="sectionList" ><i class="iconfont icon-zhangjie"></i>章节</p>
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
    
    @if(!strstr($video_url,".mp3"))
        var videoObject = {
            container: '#video', //容器的ID或className
            variable: 'player',//播放函数名称
            // flashplayer:true,
            // poster:'{{asset('resources/home/images/ico/ico25.jpg')}}',//封面图片
            //flashplayer:true,
            poster:'{{asset($Video['img'])}}',//封面图片
            video:'{{asset($video_url)}}',//视频地址
            // video: [//视频地址列表形式
            //     ['{{asset($video_url)}}', 'video/mp4', '', 0],
            // ]
        };
        var player = new ckplayer(videoObject);
    @endif
    
    var player=new ckplayer(videoObject);
    var sect = true;
    function secStatu(){
        if(sect){
            sect = !sect;
            $(".videoListzj").animate({
                right:'-20%'
            },500);
            $('#video').animate({
                width:'100%'
            },500)
        }else{
            sect = !sect;
            $(".videoListzj").animate({
                right:0
            },500);
            $('#video').animate({
                width:'80%'
            },500)
        }
    }
    $(".sectionList").click(function(){
        secStatu();
    })
</script>
@endsection