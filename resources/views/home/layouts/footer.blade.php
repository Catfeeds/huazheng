@section('footer')
    <!-- <div class="foot">
        <div class="fmenu">
            <div class="layout">
                <ul class="clearfix">
                    @foreach(nav(2) as $k=>$v)
                    <li><a @if(!empty($v['url']))href="{{$v['url']}}"@endif @if($v['is_blank']) target="_blank" @endif title="{{$v['title'] or ''}}">{{$v['title'] or ''}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="layout clearfix fmid">
            <div class="fl">
                <a href="/" class="logo" style="background-image: url({{asset(ConfigGet('logo'))}});"></a>
                <ul>
                    <li>{{ConfigGet('address')}}</li>
                    @foreach(explode(",",ConfigGet('lianxiren')) as $k=>$v)
                    <li>{{$v}}</li>
                    @endforeach
                    <li>
                        <dl class="clearfix">
                            <dt>友情链接：</dt>
                            @foreach(link_get() as $v)
                            <dd><a href="{{$v['url']}}" target="_blank">{{$v['title']}}</a></dd>
                            @endforeach
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="fr">
                <div class="tell">
                    <p>{!!ConfigGet('phone')!!}</p>
                    {{ConfigGet('pingpai')}}
                </div>
                <div class="fewm bdsharebuttonbox">
                    <a class="bds_sqq" data-cmd="sqq" title="分享到QQ" ></a>
                    <a class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    <a class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <div class="ewm"><img src="{{asset(ConfigGet('ewm'))}}"></div>
                </div>
                <script>
                window._bd_share_config={
                    "common":{
                        "bdSnsKey":{},
                        "bdText":"",
                        "bdMini":"2",
                        "bdMiniList":false,
                        "bdPic":"",
                        "bdStyle":"2",
                        "bdSize":"16"
                    },"share":{

                    },
                };
                with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
                </script>
            </div>
        </div>
        <div class="copyright layout">{{ConfigGet('copyright')}} {{ConfigGet('beian')}} <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1273747108'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1273747108%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></div>
    </div> -->
    <div class="new_foot">
        <div class="new_foot-in">
            <ul>
                <li>
                    <img src="{{asset(ConfigGet('footer_logo'))}}" alt="{{ConfigGet('site_name')}}" title="{{ConfigGet('site_name')}}"/>
                    <p>在线咨询：{!!ConfigGet('phone')!!}</p>
                    <p>公司地址：{!!ConfigGet('address')!!}</p>
                    <!-- <p>泰兴商业大厦 7楼709室</p> -->
                </li>
                <li class="on">
                    <div class="new_foot-nav">
                        @foreach(nav(2) as $k=>$v)
                            @if($k%2==0)
                                <div>
                            @endif
                            <a @if(!empty($v['url']))href="{{$v['url']}}"@endif @if($v['is_blank']) target="_blank" @endif title="{{$v['title'] or ''}}">{{$v['title'] or ''}}</a>
                            @if($k%2==1||$k+1==count(nav(2)))
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="new_foot-bq">
                        {{ConfigGet('copyright2')}}<br/>
                        {{ConfigGet('copyright')}} {{ConfigGet('beian')}}
                    </div>
                </li>
                <li class="last">
                    <div class="foot-ewm">
                        <img style="width:102px" src="{{asset(ConfigGet('ewm'))}}" alt="{{ConfigGet('ewm_text')}}"/>
                        <p>{{ConfigGet('ewm_text')}}</p>
                    </div>
                    <div class="foot-ewm">
                        <img style="width: 102px" src="{{asset(ConfigGet('app_ewm'))}}" alt="{{ConfigGet('app_ewm_text')}}"/>
                        <p>{{ConfigGet('app_ewm_text')}}</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="side_fixed">
        <ul>
            <li class="side_qgzx">
                <a href="#" target="_self">情感<br>咨询</a>
                <span></span>
            </li>
            <li class="kefu_btn">
                <a href="#" target="_self">售前<br>客服</a>
                <span></span>
            </li>
            <li class="side_ewm">
                <a href="#" target="_self">{{ConfigGet('app_ewm_text')}}</a>
                <span></span>
                <div class="hz_ewm">
                    <div class="ewm_in">
                        <img src="{{asset(ConfigGet('app_ewm'))}}" alt="{{ConfigGet('app_ewm_text')}}">
                        <h4>扫一扫，情感问题就没了</h4>
                    </div>
                    <p></p>
                </div>
            </li>
            <li class="s_top">
                <a target="_self">返回<br>顶部</a>
                <span></span>
            </li>

        </ul>
    </div>
    <div class="divMask"></div>
    <div class="window-3 video-list-1">
        <div class="div-close">×</div>
        <p class="txt" id="flash-player">
            <!--<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="0" height="0" id="LR_Flash" class="noswap">
                <param name="wmode" value="Opaque">
                <embed src="" allowFullScreen="true" quality="high" width="480" height="400" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash" wmode="Opaque">
            </object>-->
        </p>
    </div>
    <script type="text/javascript">
        $(function(){
            $('body').on('click', '.kefu_btn', function (e) {
                // var option = "height=100, width=400, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, status=no"
                window.open("{{ConfigGet('kefu_url')}}", "newwindow") 
                // onKST();
                return false;
            });
        });
    </script>
@show