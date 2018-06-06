@section('footer')
    @if(!isset($is_footer)||$is_footer!=0)
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
    <div class="gw-yxd contact-box">
        <div class="yxd-in">
            <div class="yxd-tt">
                免费申请预约解决情感烦恼
                <div class="close">
                    <img src="{{asset('resources/home/picture/gb_01.png')}}" alt="">
                </div>
            </div>
            <div class="yxd-info" >
                <p>带*号的为必填</p>
                <input type="text" name="realname" placeholder="*请输入您的姓名" class="name text">                   
                <input type="text" name="mobile" placeholder="*请输入手机号码" class="phone text">
                <div class="yzm txyzm">
                    <input type="text" name="captcha" placeholder="*请输入图形验证" value="">
                    <span><img class="verifyImage" src="" alt="" onclick="getVcode()"></span>
                </div>
                <div class="sex">
                    <span>*性别</span>
                    <div class="gender">
                        <div class="sg" value="2" name="gender">男</div>
                        <div class="mn" value="1" name="gender">女</div>
                    </div>
                </div>
                <input type="text" name="age" placeholder="请输入你的年龄" class="phone text">
                <div class="mon-come mon-select">
                    <div class="mon-text" value="" name="income">
                        月收入
                    </div>
                    <ul  style="display:none">
                        <li value="1" >
                            0-3,000元
                        </li>
                        <li value="2">
                            3,001-5,000元
                        </li>

                        <li value="3">
                            5,001-8,000元
                        </li>
                        <li value="4">
                            8,001-10,000元
                        </li>
                        <li value="5">
                            10,001-20,000元
                        </li>
                        <li value="6">
                            20,001-50,000元
                        </li>
                        <li value="7">
                            50,000 元及以上
                        </li>
                    </ul>
                </div>
                <div class="yy-time mon-select">
                    <div class="mon-text" value="" name="fine_time">
                        最佳致电时间
                    </div>
                    <ul style="display:none" >
                        <li value="10:00-11:00" name="fine_time">
                            10:00-11:00
                        </li>
                        <li value="11:00-12:00" name="fine_time">
                            11:00-12:00
                        </li>
                        <li value="12：00-13:00" name="fine_time">
                            12：00-13:00
                        </li>
                        <li name="fine_time" value="14：00-15:00">
                            14：00-15:00
                        </li>
                        <li name="fine_time" value="15：00-16:00">
                            15：00-16:00
                        </li>
                        <li name="fine_time" value="16：00-17:00">
                            16：00-17:00
                        </li>
                        <li name="fine_time" value="17：00-18:00">
                            17：00-18:00
                        </li>
                        <li name="fine_time" value="18：00-19:00">
                            18：00-19:00
                        </li>
                        <li name="fine_time" value="19：00-20:00">
                            19：00-20:00
                        </li>
                        <li name="fine_time" value="21：00-22:00">
                            21：00-22:00
                        </li>
                    </ul>
                </div>
                <div class="btn-submit submit-btn">立即申请</div>
            </div>
        </div>
    </div>
    @endif
@show