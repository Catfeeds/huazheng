@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    @if(!empty($top_category['img']))
    <div class="banner" style="background-image: url({{asset($top_category['img'])}}); height:482px;"></div>
    @endif
    <div class="layout video_center">
        @include('home.layouts.location')
        <div class="video_in">
            @foreach($cate_list as $k_c=>$v_c)
            <h2>{{$v_c['title']}}</h2>
            <div class="video_main">
                <ul class="clearfix">
                    @foreach($v_c['article'] as $k=>$v)
                    <li class=" video_play" data-vid="{{$v['video']}}">
                        <a href="javascript:;" target="_blank">
                            <img src="{{asset($v['img'])}}" alt="{{$v['alt']}}">
                            <p class="video_p">{{$v['title']}}</p>
                        </a>
                        <div class="mask_conter last_mask_conter" >
                            <a href="javascript:;" target="_blank">
                                <div class="video_leftSide">
                                    <div class="play_icon">
                                        <h4>视频简介</h4>
                                        <p class="ellipsis6">{!!nl2br($v['desc'])!!}</p>
                                    </div>
                                    <div class="lj_play">
                                        立即播放
                                    </div>
                                </div>
                            </a>
                            <div style="clear: both"></div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection