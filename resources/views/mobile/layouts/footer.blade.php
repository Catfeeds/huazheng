@section('footer')
    @if(!isset($is_footer)||$is_footer!=0)
    <div class="footer_text">
        {{ConfigGet('copyright2')}}<br/>
        {{ConfigGet('copyright')}} {{ConfigGet('beian')}}
    </div>
    <div class="footer">
        <div class="footerDiv">
            <a href="javascript:void(0)" class="kefu_btn">
                <i class="iconfont icon-zixun"></i>
                <p>在线咨询</p>
            </a>
            <a href="tel:{!!ConfigGet('phone')!!}">
                <i class="iconfont icon-dianhuazixun"></i>
                <p>电话咨询</p>
            </a>
            <a href="javascript:void(0)" class="mf_yy">
                <i class="iconfont icon-yuyue"></i>
                <p>免费预约</p>
            </a>
        </div>
    </div>
    <div class="fixright">
        <i class="iconfont icon-erweima erweima"></i>
        <i class="iconfont icon-xiangshang toTop"></i>
    </div>
    <div class="erma">
        <div class="ermaDiv">
            <img src="{{asset(ConfigGet('ewm'))}}">
            <i class="iconfont icon-cuo cuo"></i>
            <p>{{ConfigGet('ewm_text')}}</p>
        </div>
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

            $(".erweima").click(function(){
                $('.erma').fadeIn()
            })

            $(".toTop").click(function(){
                $('html,body').animate({
                    scrollTop:0
                },300)
            });
            if($(window).scrollTop()>600){
                $(".toTop").show(   )
            }else{
                $(".toTop").hide()
            }
            $(window).scroll(function(){
                if($(window).scrollTop()>600){
                    $(".toTop").show()
                }else{
                    $(".toTop").hide()
                }
            })
            $(".mf_yy").click(function(){
                $(".gw-yxd").show();
            });
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
        })
    </script>
    @endif
@show