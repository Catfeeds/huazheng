@section('header')
    @if(!isset($is_header)||$is_header!=0)
    <div class="header">
        <div class="headerCon">
            <img class="logo" src="{{asset(ConfigGet('logo3'))}}">
            <a href="javascript:void(0)" class="bars sliShow">
                <i class="iconfont icon-bars"></i>
            </a>
            @if(Auth::check())
                <img src="{{asset(Auth::user()->pic)}}" class="pic">
            @else
                <a href="{{URL('login')}}">登录</a>
            @endif
        </div>
    </div>
    <div class="slideMask">
        <div class="slideNav">
            <p class="sliHea">
                全部项目
                <i class="iconfont icon-cuo"></i>
            </p>
            <ul class="navs navs2">
                @foreach(nav(5) as $k=>$v)
                <li>
                    <a @if(!empty($v['url'])) href="{{$v['url']}}" @endif @if($v['is_blank']) target="_blank" @endif title="{{$v['title']}}"  @if(count($v['child'])) class="cur" @endif>
                        <i class="iconfont icon-nan navsI icon{{$k+1}}" style="background-image: url({{asset($v['ico'])}});"></i>
                        <p>{{$v['title']}}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
@show