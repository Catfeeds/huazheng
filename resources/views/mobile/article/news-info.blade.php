@extends('mobile.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    <div class="layout article-content">
        <div class="artic_in clearfix">
            <div class="artic_left">
                <div class="artic_title">
                   <!--  文章标题 -->
                    <h2>{{$info['title']}}</h2>
                    <div class="release">
                        {{$info['add_time']}}
                    </div>
                </div>
                <div class="details">
                    {!!$info['content']!!}
                </div>
                <div class="share_in">
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
                @foreach(ads_image(22,1) as $v)
                {{--<div class="ad" style="background-image: url({{asset($v['image'])}});">
                    <div class="ad_zx">
                        <a  class="kefu_btn ad_zx1" target="_self"><i></i>在线咨询</a>
                        <a  class="apply_box_btn ad_zx2" target="_self"><i></i>网上预约</a>
                    </div>
                </div>--}}
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
                <div class="news">
                    @if($prev_article)
                    <a href="{{URL($cate_info['url'],$prev_article['id'])}}" class="story-article-list">
                        <div class="story-article-bg">
                            <img src="{{asset($prev_article['img'])}}" alt="">
                        </div>
                        <div class="story-article-info">
                            <div class="story-article-title2">上一篇：{{$prev_article['title']}}</div>
                            <span class="xq">【详情】</span>
                        </div>
                    </a>
                    @endif
                    @if($next_article)
                    <a href="{{URL($cate_info['url'],$next_article['id'])}}" class="story-article-list">
                        <div class="story-article-bg">
                            <img src="{{asset($next_article['img'])}}" alt="">
                        </div>
                        <div class="story-article-info">
                            <div class="story-article-title2">下一篇：{{$next_article['title']}}</div>
                            <span class="xq">【详情】</span>
                        </div>
                    </a>
                    @endif
                </div>
                <div class="read">
                    <h4><span>相关阅读</span></h4>
                    <ul class="read_left">
                        @foreach($article_recommend_list as $v)
                        <li>
                            <a href="{{URL($cate_info['url'],$v['id'])}}" target="_self">
                                {{$v['title']}}
                            </a>
                        </li>
                        @endforeach
                    </ul>             
                </div>
                <div class="tjzj">
                    <h4><span>推荐导师</span></h4>
                    @foreach($art_4 as $k=>$v)
                    @if($k==0)
                    <dl>
                        <a href="{{URL($cat_4['url']),$v['id']}}" >
                            <img src="{{asset($v['img'])}}" alt="{{$v['alt']}}" class="img">
                            <div>
                                <h3>{{$v['title']}}</h3>
                                <h5>{{$v['title2']}}</h5>                               
                                <p>{{$v['desc']}}</p>                               
                            </div>
                         </a>
                    </dl>
                    @endif
                    @endforeach
                </div>
                @include('mobile.layouts.location')
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection