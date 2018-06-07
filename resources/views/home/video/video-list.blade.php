@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    <div class="expert_con">
        @include('home.layouts.location')
        <div class="videoType">
            <form method="GET" id="filterform" action="{{URL('video-list')}}">
                <p>
                    <span class="type">学习方向</span>
                    <span name="cate_id" class="childtype filter @if(empty(request()->cate_id)) colred @endif" tag="">全部</span>
                    @foreach($Category as $k=>$v)
                        <span name="cate_id" class="childtype filter @if(request()->cate_id==$v['id']) colred @endif" tag="{{$v['id']}}">{{$v['title']}}</span>
                    @endforeach
                </p>
                <p>
                    <span class="type">课程类型</span>
                    <span name="type" class="childtype filter @if(empty(request()->type)) colred @endif" tag="">全部</span>
                    @foreach(trans("home.video.type") as $k=>$v)
                    <span name="type" class="childtype filter @if(request()->type==$k) colred @endif" tag="{{$k}}">{{$v}}</span>
                    @endforeach
                </p>
                <input type="hidden" name="cate_id" id="cate_id" value="{{request()->cate_id}}">
                <input type="hidden" name="type" id="type" value="{{request()->type}}">
                <input type="hidden" name="order" id="order" value="{{request()->order}}">
            </form>
        </div>
        <div class="videoCon_list">
            <p class="videoFilter">
                <span name="order" class="filter @if(empty(request()->order)) colred @endif" tag="">最新发布</span><span name="order" class="filter @if(request()->order=='number') colred @endif" tag="number">人气最高</span>
            </p>
            <ul class="videoList"  id="pageDiv">
                @foreach($video_list as $v)
                    <li>
                        <a href="{{URL('video-info',[$v])}}">
                            <div class="imgDiv">
                                <img class="videoPa" src="{{asset($v['img'])}}">
                                <p><img src="{{asset('resources/home/images/ico/ico22.png')}}">{{count($v['VideoCourseMany'])}}个课时</p>
                            </div>
                            <div class="videoTit">
                                <p>{{$v['title']}}</p>
                                <span>{{$v['number']}}人正在学习</span> 
                            </div>
                            <div class="priceTag"> 
                                <p class="price colred">￥<span class="newprice">{{$v['price']}}</span><span class="oldprice">{{$v['old_price']}}</span> </p> 
                                @if($v['is_try'])
                                <p class="videotag"> <span>可试学</span> </p> 
                                @endif
                            </div> 
                        </a> 
                    </li>
                @endforeach
            </ul>
            @include('home.layouts.page2',['page'=>$video_list])
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script type="text/javascript">
        $(".filter").click(function(){
            $("#"+$(this).attr('name')).val($(this).attr('tag'));
            $("#filterform").submit();
        })
    </script>
@endsection