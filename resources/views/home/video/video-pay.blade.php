@extends('home.layouts.app')
@section('style')
@parent
@endsection
@section('content')
<div class="expert_con">
    @include('home.layouts.location')
    <div class="videoPay">
        <div class="orders">
            <p>订单详情</p>
            <div class="ordersCon">
                <div>
                    <div class="imgDivs">
                        <img class="videoP" src="{{asset($Video['img'])}}" alt="{{$Video['alt']}}">
                    </div>
                    <div class="videoCon2">
                        <p class="videoTit">{{$Video['title']}}</p>
                        <p class="videoDes">{!!nl2br($Video['desc'])!!}</p>
                        <p class="ordersNum">{{date('Y-m-d')}}</p>
                    </div>
                </div>
                <div>
                    <p class="colred">
                        ￥<span class="price">{{$Video['price']}}</span>
                    </p>
                    <p>商品金额</p>
                </div>
            </div>
        </div>
        <div class="payMethod">
            <p>
                支付方式
            </p>
            <div class="payCon">
                <form method="POST" id="passwordform" action="{{URL('video-pay-save')}}">
                    @csrf
                    <!-- <p class="pay_type" tag="alipay" data-pay-type="2">
                        <img src="http://a3.huazhen.com/huazhen_revision/pc/paymentCourse/img/zfb.png">
                        <img class="sel" src="http://a3.huazhen.com/huazhen_revision/pc/paymentCourse/img/sel.png">
                    </p> -->
                    <p class="pay_type active" tag="wxpay" data-pay-type="1">
                        <img src="http://a3.huazhen.com/huazhen_revision/pc/paymentCourse/img/weixin.png">
                        <img class="sel" src="http://a3.huazhen.com/huazhen_revision/pc/paymentCourse/img/sel.png">
                    </p>
                    <input type="hidden" name="pay_type" value="1" id="pay_type">
                    <input type="hidden" name="id" value="{{$Video['video_id']}}">
                    <a class="topay" href="javascript:void(0)" id="coursePay">立即购买</a>
                </form>
            </div>
        </div>
        <div class="zhixun">
            <p>疑问咨询</p>
            <p class="zhiP">
                <span>有任何疑问欢迎咨询</span>
                <span class="colred"><img class="qq" src="http://a3.huazhen.com/huazhen_revision/pc/paymentCourse/img/qq.png">400-0173-520</span>
                <span>(课程视频最终解析权归笃爱所有)</span>
            </p>
        </div>
    </div>
</div>
@endsection
@section('script')
@parent
<script type="text/javascript">
    $("#coursePay").click(function(){
        $(this).parents("form").submit();
    })
    $(".pay_type").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
        $("#pay_type").val($(this).attr("data-pay-type"));
    })
    window._bd_share_config={
        "common":{
            "bdText" : '',
            "bdDesc" : '',
            "bdUrl": '',
            "bdPic": '',
            "bdStyle":"1",
        },"share":{}
    };
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
    $(".videoOthTab span").click(function(){
        var index = $(this).index();
        $(this).addClass("active").siblings().removeClass('active');
        $(".videoTabCon li").eq(index).addClass('active').siblings().removeClass('active')
    })
</script>
@endsection