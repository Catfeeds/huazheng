@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    @if(!empty($top_category['img']))
    <div class="banner" style="background-image: url({{asset($top_category['img'])}}); height:482px;"></div>
    @endif
    <div class="layout article-content">
        @include('home.layouts.location')
        <div class="article_con_top">
            <h2>{{$cate_info['title']}}</h2>
        </div>
        <div class="article_con_in clearfix" id="pageDiv">
            @include('home.article.news-list')
        </div>
        @include('home.layouts.page',['page'=>$article_list])
    </div>
    @include('home.layouts.fhns-bottom')
@endsection
@section('script')
    @parent
@endsection