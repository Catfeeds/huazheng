@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    @if(!empty($top_category['img']))
    <div class="banner" style="background-image: url({{asset($top_category['img'])}}); height:482px;"></div>
    @endif
    <div class="layout expert_con">
        @include('home.layouts.location')
        <div class="expert_in">
            <div class="hzzj">
                @foreach($cate_list as $v)
                    @if($v['template']=='master-group')
                        <div class="hzzj clearfix">
                            <h2>{{$v['title']}}</h2>
                            @foreach($v['article'] as $b_k=>$b_v)
                                <dl @if($b_k%2==1) class="nomargin" @endif>
                                    <dt>
                                        <a href="{{URL($v['url'],$b_v['id'])}}" target="_blank">
                                        <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}"></a>
                                    </dt>
                                    <dd>
                                        <h3 class="ellipsis">{{$b_v['title']}}</h3>
                                        <p class="ellipsis">{{$b_v['title2']}}</p>
                                        <span class="ellipsis3">{!!nl2br($b_v['desc'])!!}</span>
                                        <a href="{{URL($v['url'],$b_v['id'])}}" class="know" target="_blank">了解详情</a>
                                        <a href="javascript:;" class="kefu_btn zx" target="_blank">咨询导师</a>
                                    </dd>
                                </dl>
                            @endforeach
                        </div>
                    @elseif($v['template']=='guimi-group')
                        <div class="hzgm">
                            <h2>{{$v['title']}}</h2>
                            <ul class='clearfix'>
                                @foreach($v['article'] as $b_k=>$b_v)
                                    <li>
                                        <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
                                        <div class="show" style="display: none;">
                                            <h4 class="ellipsis">{{$b_v['title']}}</h4>
                                            <p class="ellipsis">{{$b_v['title2']}}</p>
                                            <div class="line"></div>
                                            <span class="ellipsis2">{!!nl2br($b_v['desc'])!!}</span>
                                         <a href="{{URL($v['url'],$b_v['id'])}}" class="know" target="_blank">了解详情</a>
                                        <a href="javascript:;" class="kefu_btn zx" target="_blank">咨询导师</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection