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
                    <img src="{{asset(ConfigGet('logo'))}}" alt="{{ConfigGet('site_name')}}" title="{{ConfigGet('site_name')}}"/>
                    <p>在线咨询：{!!ConfigGet('phone')!!}</p>
                    <p>公司地址：{!!ConfigGet('address')!!}</p>
                    <!-- <p>泰兴商业大厦 7楼709室</p> -->
                </li>
                <li class="on">
                    <div class="new_foot-nav">
                        @foreach(nav(2) as $k=>$v)
                            @if($k%2==0)
                                <!-- <div> -->
                            @endif
                            <a @if(!empty($v['url']))href="{{$v['url']}}"@endif @if($v['is_blank']) target="_blank" @endif title="{{$v['title'] or ''}}">{{$v['title'] or ''}}</a>
                            @if($k%2==1||$k+1==count(nav(2)))
                                <!-- </div> -->
                            @endif
                        @endforeach
                    </div>
                    <div class="new_foot-bq">
                        {{ConfigGet('copyright2')}}<br/>
                        {{ConfigGet('copyright')}} {{ConfigGet('beian')}}
                    </div>
                </li>
                <!-- <li class="last">
                    <div class="foot-ewm">
                        <img style="width:102px" src="{{asset(ConfigGet('ewm'))}}" alt="{{ConfigGet('ewm_text')}}"/>
                        <p>{{ConfigGet('ewm_text')}}</p>
                    </div>
                    <div class="foot-ewm">
                        <img style="width: 102px" src="{{asset(ConfigGet('app_ewm'))}}" alt="{{ConfigGet('app_ewm_text')}}"/>
                        <p>{{ConfigGet('app_ewm_text')}}</p>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>

    <div class="side_fixed">
        <ul>
            <li class="side_qgzx">
                <a  target="_self">情感<br>咨询</a>
                <span></span>
            </li>
            <li class="kefu_btn">
                <a  target="_self">售前<br>客服</a>
                <span></span>
            </li>
            <li class="side_ewm">
                <a  target="_self">{{ConfigGet('app_ewm_text')}}</a>
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
    
    <div class="gw-yxd contact-box">
        <div class="yxd-in">
            <div class="yxd-tt">
                免费申请预约解决情感烦恼
                <div class="close">
                    <img src="{{asset('resources/home/picture/gb_01.png')}}" alt="">
                </div>
            </div>
            <div class="yxd-info" >
                <form method="POST" action="{{URL('apply-save')}}">
                {{ csrf_field() }}
                    <p>带*号的为必填</p>
                    <input type="text" name="name" placeholder="*请输入您的姓名" class="name text">                   
                    <input type="text" name="phone" placeholder="*请输入手机号码" class="phone text">
                    <div class="yzm txyzm">
                        <input type="text" name="captcha" placeholder="*请输入图形验证" value="">
                        <span class="img captcha">{!!captcha_img()!!}</span>
                    </div>
                    <div class="sex">
                        <span>*性别</span>
                        <div class="gender">
                            <label><input type="radio" class="radio_h" name="sex" value="1">男</label>
                            <label><input type="radio" class="radio_h" name="sex" value="2">女</label>
                        </div>
                    </div>
                    <input type="text" name="age" placeholder="请输入你的年龄" class="phone text">
                    <div class="mon-come mon-select">
                        <select name="income" class="select_h">
                            <option value="">请选择你的月收入</option>
                            <option value="0-3,000元">0-3,000元</option>
                            <option value="3,001-5,000元">3,001-5,000元</option>
                            <option value="5,001-8,000元">5,001-8,000元</option>
                            <option value="8,001-10,000元">8,001-10,000元</option>
                            <option value="10,001-20,000元">10,001-20,000元</option>
                            <option value="20,001-50,000元">20,001-50,000元</option>
                            <option value="50,000 元及以上">50,000 元及以上</option>
                        </select>
                    </div>
                    <div class="yy-time mon-select">
                        <select name="fine_time" class="select_h">
                            <option value="">请选择最佳致电时间</option>
                            <option value="10:00-11:00">10:00-11:00</option>
                            <option value="11:00-12:00">11:00-12:00</option>
                            <option value="12:00-13:00">12:00-13:00</option>
                            <option value="13:00-14:00">13:00-14:00</option>
                            <option value="14:00-15:00">14:00-15:00</option>
                            <option value="15:00-16:00">15:00-16:00</option>
                            <option value="16:00-17:00">16:00-17:00</option>
                            <option value="17:00-18:00">17:00-18:00</option>
                            <option value="18:00-19:00">18:00-19:00</option>
                            <option value="19:00-20:00">19:00-20:00</option>
                            <option value="20:00-21:00">20:00-21:00</option>
                            <option value="21:00-22:00">21:00-22:00</option>
                        </select>
                    </div>
                    <div class="btn-submit submit-btn" id="apply_submit">立即申请</div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            @if(!empty(ConfigGet('kefu_url')))
            $('body').on('click', '.kefu_btn', function (e) {
                // var option = "height=100, width=400, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, status=no"
                window.open("{{ConfigGet('kefu_url')}}", "newwindow") 
                // onKST();
                return false;
            });
            @endif
            $(".side_qgzx").click(function(){
                $(".gw-yxd").show();
            })
            $(".apply_box_btn").click(function(){
                $(".gw-yxd").show();
            })
            $(".gw-yxd .close").click(function(){
                $(".gw-yxd").hide();
            })
            $(".captcha").click(function(){
                $(".captcha").find("img").attr('src',"{{captcha_src()}}"+Math.random());
            })
            $("#apply_submit").click(function(){
              var formData=$(this).parents("form").serialize();
              var form_url=$(this).parents("form").attr('action');
              if($("#apply_submit").attr('is')!=false){
                $("#apply_submit").attr("is",false);
                $.ajax({
                  type: "POST",
                  url:form_url,
                  data:formData,
                  success:function(data){
                    alert(data.message);
                    if(data.code==200){
                        $(".gw-yxd").hide();
                    }
                  },
                  error:function(data){
                    var obj = new Function("return" + data.responseText)();
                    obj = obj.errors;
                    var msg='';
                    $("#apply_submit").attr("is",true);
                    for (var prop in obj){
                        msg += obj[prop]+"\r";
                    }
                    alert(msg);
                  }
                });
              }
            })
        });
    </script>
    @endif
@show