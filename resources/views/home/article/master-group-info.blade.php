@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    <div class="master-banner clearfix">
        <div class="banner_in clearfix">
            <div class="banner_left">
                <img src="{{asset($info['img2'])}}" alt="{{$info['alt2']}}">
            </div>
            <div class="banner_right">
                <div class="js">
                    <h4>
                        <b>{{$info['title']}}</b>
                        {{$info['title2']}}
                    </h4>
                    <p>
                        {!!nl2br($info['desc'])!!}
                    </p>
                </div>
                @if($info['MoreVideoMany']['0'])
                <div class="sp play">
                    <img class="video_play" data-vid="{{$info['MoreVideoMany']['0']['video']}}" src="{{asset($info['MoreVideoMany']['0']['image'])}}">
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="layout master-content">
        @include('home.layouts.location')
        <div class="con_in">
            <div class="ds_nav">
                <h3>导师介绍</h3>
                <ul>
                    <li>
                        <a  target="_self">导师视频</a>
                    </li>
                    <li>
                        <a  target="_self">导师荣誉</a>
                    </li>
                    <li>
                        <a  class="kefu_btn" target="_self">立即咨询</a>
                    </li>
                </ul>
            </div>
            <div class="ds_js">
                {!!$info['content']!!}
            </div>
            <div class="item ds_sp">
                <ul class="sp_list">
                    @if($info['MoreVideoMany'])
                        @foreach($info['MoreVideoMany'] as $k=>$v)
                        <li class="play">
                            <div class="tu">
                                <img src="{{asset($v['image'])}}" alt="">
                            </div>
                            <p>{{$v['title']}}</p>
                            <!-- 播放按钮 -->
                            <span class="video_play" data-vid="{{$v['video']}}"></span>
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="item ds_ry">
                <ul class="ry_list">
                    @if($info['MoreImageMany'])
                        @foreach($info['MoreImageMany'] as $k=>$v)
                        <li>
                            <div class="tu">
                                <img src="{{asset($v['image'])}}" alt="{{$v['alt']}}">
                            </div>
                            <p>{{$v['title']}}</p>
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            @foreach(ads_image(24,1) as $v)
            <div class="con_bottom">
                <a class="bendi" @if(!empty($v['url'])) href="{{$v['url']}}" @endif target="_blank"><img src="{{asset($v['image'])}}" alt="{{asset($v['alt'])}}"> </a>
            </div>
            @endforeach
            
        </div>
    </div>
    @include('home.layouts.fhns-bottom')
@endsection
@section('script')
    @parent
@endsection