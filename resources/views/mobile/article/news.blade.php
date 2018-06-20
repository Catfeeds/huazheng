@extends('mobile.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    <div id="story-tab1" class="news">
        @foreach($article_list as $k=>$v)
        <a class="story-article-list" href="{{URL($cate_info['url'],$v['id'])}}">
            <div class="story-article-bg">
                <img src="//huazhen-upload.oss-cn-hangzhou.aliyuncs.com/article/201712/27/ax03plgm2flv9vc6mif6v6mh81obygar.png" alt="">
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