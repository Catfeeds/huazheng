@section('header')
    @if(!isset($is_header)||$is_header!=0)
    <div class="header">
        <div class="headerCon">
            <a href="/"><img class="logo" src="{{asset(ConfigGet('logo3'))}}"></a>
            <a href="javascript:void(0)" class="bars sliShow">
                <i class="iconfont icon-bars"></i>
            </a>
            @if(Auth::check())
                <a href="{{URL('member')}}" style="border:0;padding:0">
                    <img src="{{asset(Auth::user()->pic)}}" class="pic">
                </a>
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
                    <a @if(!empty($v['url'])) href="{{$v['url']}}" @endif @if($v['is_blank'])  @endif title="{{$v['title']}}"  @if(count($v['child'])) class="cur" @endif>
                        <i class=" icon-nan navsI icon{{$k+1}}" style="background-image: url({{asset($v['ico'])}});"></i>
                        <p>{{$v['title']}}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
@show