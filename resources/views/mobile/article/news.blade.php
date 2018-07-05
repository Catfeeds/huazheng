@extends('mobile.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    <div id="story-tab1" class="news">
        <div class="buttons-tab story-tabs project-tab-link clearfix">
            @foreach($sub_category as $v)
            <a href="{{URL($v['url'])}}" class="@if(isset($url)&&trim($v['url'],"/")==$url) cur @endif">{{$v['title']}}</a>
            @endforeach
        </div>
        @foreach($article_list as $k=>$v)
        <a class="story-article-list" href="{{URL($cate_info['url'],$v['id'])}}">
            <div class="story-article-bg">
                <img src="{{asset($v['img'])}}" alt="">
            </div>
            <div class="story-article-info">
                <div class="story-article-title">{{$v['title']}}</div>
                <div class="story-article-text">{!!nl2br($v['desc'])!!}</div>
            </div>
        </a>
        @endforeach
    </div>
    @include('mobile.layouts.page2',['page'=>$article_list])
@endsection
@section('script')
    @parent
@endsection