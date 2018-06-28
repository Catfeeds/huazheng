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
        <div class="artic_in clearfix">
            <div class="artic_left">
                <div class="artic_title">
                   <!--  文章标题 -->
                    <h2>{{$info['title']}}</h2>
                    <div class="release">
                        <div class="time">
                            发布于：{{$info['add_time']}}
                        </div>
                        <div class="share_in">
                            <span>分享至：</span>
                            <div class="share_in">
                                <span>分享至：</span>
                                <div class="sher">
                                    <div class="bdsharebuttonbox bdshare-button-style1-32" data-bd-bind="1461393392404">
                                        <a  class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                                        <a  class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                                        <a  class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                                        <a  class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                                        <a  class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                                        <a  class="bds_more" data-cmd="more"></a>
                                    </div>
                                    <script>
                                        window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{},"":{"viewList":["qzone","tsina","tqq","renren","weixin","sqq"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin","sqq"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="details">
                    {!!$info['content']!!}
                </div>
                @foreach(ads_image(22,1) as $v)
                <div class="ad" >
                    <img src="{{asset($v['image'])}}" alt="{{$v['alt']}}">
                    <!-- <div class="ad_zx">
                        <a  class="kefu_btn ad_zx1" target="_self"><i></i>在线咨询</a>
                        <a  class="apply_box_btn ad_zx2" target="_self"><i></i>网上预约</a>
                    </div> -->
                </div>
                @endforeach
                <!-- <div class="tag">
                    <div class="tag_in">
                        标签：

                        <a href="/article/tag?tag=冷爱" target="_self">冷爱</a>
                    </div>
                    <div class="return">
                        <a href="/" target="_self">返回首页</a>
                    </div>
                </div> -->
                <div class="artic_list">
                    <p>上一篇：<a @if($prev_article) href="{{URL($cate_info['url'],$prev_article['id'])}}" @endif>{{$prev_article['title'] or '暂无'}}</a></p>
                    <p>下一篇：<a @if($next_article) href="{{URL($cate_info['url'],$next_article['id'])}}" @endif>{{$next_article['title'] or '暂无'}}</a></p>
                </div>
                <div class="read">
                    <h4>相关阅读</h4>
                    <ul class="read_left">
                        @foreach($article_recommend_list as $v)
                        <li>
                            <a href="{{URL($cate_info['url'],$v['id'])}}" target="_self">
                                <div class="read_tu">
                                    <img src="{{asset($v['img'])}}" alt="{{$v['alt']}}">
                                </div>
                                <p class="ellipsis">{{$v['title']}}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>             
                </div>
            </div>
            @include("home.layouts.detail_right")
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection