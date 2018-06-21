@extends('mobile.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    <div class="layout video_center">
        <div class="video_in">
            @foreach($cate_list as $k_c=>$v_c)
            <h2><span>{{$v_c['title']}}</span></h2>
            <div class="video_main">
                <ul class="clearfix">
                    @foreach($v_c['article'] as $k=>$v)
                    <li class="video_play" data-vid="{{$v['video']}}">
                        <p class="video_p">{{$v['title']}}</p>
                        <div class="img">
                            <img src="{{asset($v['img'])}}" alt="{{$v['alt']}}">
                            <i class="iconfont3 font-play video_play" data-vid="{{$v['video']}}"></i>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <div class="video_play_box">
            <div class="box">
                <i class="ico13"></i>
            </div>
        </div>
        @include('mobile.layouts.location')
    </div>
@endsection
@section('script')
    @parent
    <script type="text/javascript">
        $(function(){
            //视频
            $(".video_center").on('click','.video_play', function(){
                var video = $(this).attr('data-vid');
                var iframe = '<iframe frameborder="0" src="'+video+'" allowfullscreen></iframe>';
                $(".video_play_box").show();
                $(".video_play_box").find("iframe").remove();
                $(".video_play_box .box").append(iframe);
            });
            $(".video_center").on("click", ".ico13", function() {
                $(".video_play_box").hide();
                $(".video_play_box").find("iframe").remove();
            });
        })
    </script>
@endsection