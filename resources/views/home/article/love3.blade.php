@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    @if(!empty($cate_info['img']))
    <div class="banner" style="background-image: url({{asset($cate_info['img'])}}); height: 482px;"></div>
    @endif
    <div class="love3-content">
    <!-- 内容第一部分 -->
    <div class="con1">
        <div class="con_in">
            <h2>追求幸福路上，是否遭遇情感困扰？</h2>
            <h4>
                我与你一样，渴望幸福，可是却不知道幸福在哪里
            </h4>
            <ul>
                <li>
                    <img src="{{asset('resources/home/picture/tu1.png')}}" alt="">
                    <p>86.3%单身女性</p>
                    <span>
                        因缺乏情感能力错失真爱
                    </span>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu2.png')}}" alt="">
                    <p>1.1亿恋爱男女</p>
                    <span>
                        迟迟未能步入婚姻殿堂
                    </span>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu3.png')}}" alt="">
                    <p>373万离婚夫妇</p>
                    <span>
                        因不懂经营婚姻所导致
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <div class="con2">
        <div class="con_in">
            <h2>你离幸福，也许只差“爱情管家”</h2>
            <h4>
                我一直在寻找，怎样才可以离幸福近一点点
            </h4>
            <p>很多女性朋友遇到情感问题时，总觉得自己很特殊，觉得自己的情感痛苦是如此与众不同，遗憾的是，花镇团队9年来排解的数百万个情感问题，都能够归纳在“爱情管家”大规律内， 希望每一位姑娘都能在宝贵的年华里，学习爱情管家，尽快知晓这些幸福的规则和秘密、获取自己想要的幸福。</p>
            <div class="tt">
                <span class="cur">恋爱管家<i></i></span>
                <span>婚姻管家<i></i></span>
            </div>
            <div class="list on">
                <dl>
                    <dt><img src="{{asset('resources/home/picture/tu9.png')}}" alt=""></dt>
                    <dd>
                        <ul>
                            <li>
                                <b>· 魅力提升</b>
                                正确认识自己，快速提升形象气质。

                            </li>
                            <li>
                                <b>· 脱单特训</b>
                                揭秘进化心理学中的择偶策略

                            </li>
                            <li>
                                <b>· 恋爱修成</b>
                                觅取专属于你的幸福恋情
                            </li>
                            <li>
                                <b>· 优选男生</b>
                                识别秘籍，剔除渣男，助你选定优质男。
                            </li>
                            <li class="nobd">
                                <b>· 爱情维系</b>
                                Hold住爱情，让他心甘情愿只疼你一个！
                            </li>

                        </ul>
                    </dd>
                </dl>
            </div>
            <div class="list">
                <dl>
                    <dt><img src="{{asset('resources/home/picture/tu10.png')}}" alt=""></dt>
                    <dd>
                        <ul>
                            <li>
                                <b>· 婚前修炼</b>
                                促进男友尽快带你走,入甜蜜的婚姻殿堂


                            </li>
                            <li>
                                <b>· 气质特效</b>
                                培养女性优雅气质,俘获男人对你的真心

                            </li>
                            <li>
                                <b>· 幸福修成</b>
                                传授幸福婚姻的经营策略
                            </li>
                            <li>
                                <b>· 婚后和谐</b>
                                教你在恋爱婚姻中做个高情商女人

                            </li>
                            <li class="nobd">
                                <b>· 挽回婚姻</b>
                                教你御男之术，让他离不开你!

                            </li>

                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="con3">
        <div class="con_in">
            <h2>新升级爱情管家，视频课程内容</h2>
            <h4>为了让众多情感受挫的人得到解脱，不断优化学习课程</h4>
            <ul>
                <li>
                    <img src="{{asset('resources/home/picture/tu11.png')}}" alt="">
                    <div class="txt">
                        <p>
                            <span>
                                心态建设
                            </span>
                            <span>社交突破</span>
                            <span>被动收益</span>
                            <span>网上形象</span>
                            <span>文字聊天</span>
                            <span>男性心理</span>
                            <span>恋爱进程</span>
                            <span>聊天话术</span>
                            <span>个人故事脉络</span>
                        </p>
                    </div>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu12.png')}}" alt="">
                    <div class="txt">
                        <p>
                            <span>
                                维持长期关系的关键点
                            </span>
                            <span>长短择判定</span>
                            <span>长短择转化</span>
                            <span>恋爱关系中的“杀手”</span>
                            <span>角色对换</span>
                            <span>男人想娶怎样的女人</span>
                            <span>婚前“协议”</span>
                            <span>婚前必修课</span>
                            

                        </p>
                    </div>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu13.png')}}" alt="">
                    <div class="txt">
                        <p>
                            <span>
                                爱情图谱
                            </span>
                            <span>培养你的喜好和赞赏</span>
                            <span>彼此关注</span>
                            <span>让配偶影响你</span>
                            <span>冲突管理</span>
                            <span>解决可解决的问题</span>
                            <span>克服故步自封</span>
                            <span>寻求共同意义</span>
                            <span>沟通技巧</span>
                            
                        </p>
                    </div>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu14.png')}}" alt="">
                    <div class="txt">
                        <p>
                            <span>
                                判断真假性分手
                            </span>
                            <span>及时察觉可挽回的信号</span>
                            <span>了解男人背叛的心思</span>
                            <span>他是否值得你挽回</span>
                            
                            <span>挽回个案实操分享</span>
                            <span>挽回途中可能遇到的事应对</span>
                            <span>变心挽回修复</span>
                            
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="con4">
        <div class="con_in">
            <h2>爱情管家 ：情感经营管理准则</h2>
            <h4>帮助女性更快、更顺利地抵达幸福至高点</h4>
            <p>
                女性在每个阶段对幸福的定义不一样，比如在恋爱期，找到好的伴侣是幸福；在婚姻期，如何达到情感的长期保鲜是幸福的证明。如果寻求幸福的过程是一段没有终点的旅程，那么爱情管家就是你通往幸福之路的必修课，也是每个女人学会爱、收获爱、维持爱的幸福法宝。
            </p>
            <ul>
                <li>
                    <img src="{{asset('resources/home/picture/tu15.png')}}" alt="">
                </li>
                <li>
                    <p>恋爱学习管理</p>
                    <span>
                        爱情是可以被学习的,那些以前的不敢说出口,那些无从抓住的擦肩而过,还有无法敞开的恋爱心扉,花镇让你在恰当的时机,用直接的方式让自己主动获得恋爱机会,让完美的爱情修成正果。
                    </span>
                </li>
                
                <li>
                    <p>情感优化管理</p>
                    <span>
                        可交流的情感平台才是可持续发展的，它是一个女性情感私享社区，它是你的情感闺蜜圈，在花镇可以吸收别人的情感经验，可以交换恋爱的秘密，还可以优化自己的情感，获得专属于你爱情的经验。
                    </span>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu16.png')}}" alt="">
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu17.png')}}" alt="">
                </li>
                <li>
                    <p>幸福研修管理</p>
                    <span>
                        爱情没有终点,幸福可以获得成长,爱情是一直保持幸福感的过程,20岁的激情是幸福的必修课,30岁的浪漫也是幸福的目标,40岁的美满更是幸福的象征，让一个女人一生都走在幸福的路上,花镇，一直陪伴着
                    </span>
                </li>
            </ul>
            <a href="#" class="zx love-btn">了解自己适合哪种提升方案</a>
        </div>
    </div>

    <!-- 花镇历程 -->
    <div class="con5">
        <div class="con_in">
            <h2>花镇情感 婚恋咨询领导品牌</h2>
            <h4>国内首选的女性幸福研习平台，为你提供专业的婚恋咨询与培训服务</h4>
            <p>我们的情感团队从2008年组建，9年来我们积蓄了大批国内知名的情感导师顾问，已经逐渐发展为目前中国婚恋咨询与培训机构的领导品牌。并在早期建立中国以情感服务为主题的“泡泡恋爱学”垂直社区。现在花镇基于线上线下双平台，提供多元化的情感定制服务，深度服务各类客户，学员也不断壮大，获得了行业内外的一致好评。</p>
            <ul>
                <li class="cur">
                    <img src="{{asset('resources/home/picture/tu18.png')}}" alt="">
                    <p>早期团队创立，冷爱、Ayawawa、肖然成为其联合创始人。</p>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu19.png')}}" alt="">
                    <p>业务从网络拓展到线下，开始对用户提供情感咨询服务。</p>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu20.png')}}" alt="">
                    <p>正式举办线下大型讲座培训，首场上海站即有上百名会员参与。</p>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu21.png')}}" alt="">
                    <p>推出资深导师课程，首创国内情感行业三天核心课程特训的模式。</p>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu22.png')}}" alt="">
                    <p>品牌全新升级，从品牌到服务全面提升，开始全国巡回培训，服务的内容和形式上也有重大的突破。</p>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu23.png')}}" alt="">
                    <p>总部搬至广州，开始为女性提供全面的婚恋咨询与培训服务，并升级更加专业情感服务中心。</p>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu24.png')}}" alt="">
                    <p>服务涵盖了咨询、讲座、核心课程、高峰论坛及私人定制服务等一系列情感服务的标准业务体系。</p>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu25-1.jpg')}}" alt="">
                    <p>开启线上系统课程，也开设了遍布全国的线下核心课程。在北京、上海、广州同时举办高峰论坛。</p>
                </li>
            </ul>
            <div class="line">
                
            </div>
            
            <div class="year">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide cur">2008</div>
                        <div class="swiper-slide">2009</div>
                        <div class="swiper-slide">2010</div>
                        <div class="swiper-slide">2011</div>
                        <div class="swiper-slide">2012</div>
                        <div class="swiper-slide">2013</div>
                        <div class="swiper-slide">2014</div>
                        <div class="swiper-slide">2015</div>


                        
                    </div>
                    <!-- Add Pagination -->
                    <a class="arrow-left" href="#"></a> 
                    <a class="arrow-right" href="#"></a>
                </div>
            </div>

        </div>
    </div>

    <div class="con6">
        <div class="con_in">
            <h2>幸福闺蜜团 幸福旅途不孤单</h2>
            <h4>
                导师不止是教学,更是在幸福道路上陪伴每一位女性的亲密伙伴。
            </h4>
            <ul>
                <li>
                    <img src="{{asset('resources/home/picture/tu26.png')}}" alt="">
                    <h3>冷爱</h3>
                    <p>
                        
                        花镇联合创始人<br>
                        深度情感维系导师<br>
                        中国情感学习先驱<br>
                        中国男性情感解读导师<br>
                        理性爱情经营导师<br>
                        
                        <b></b>
                        倡导独立、有趣、自由、真诚和互相尊重的爱情艺术，为大众提供情感理论的根据，帮助女性深度剖析男性的情感。

                    </p>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu27.png')}}" alt="">
                    <h3>Ayawawa</h3>
                    <p>
                        
                        花镇联合创始人<br>
                        情感咨询首席顾问中国<br>
                        女性“爱情风险”咨询第一人<br>
                        爱情风险预控导师<br>

                        
                        <b></b>
                        创造了中国首个“女性爱情方法论”、中国情感资讯类图书畅销榜长期霸占者、著有《聪明爱》、《完美关系的秘密》等等
                        
                    </p>
                </li>
                <li>
                    <img src="{{asset('resources/home/picture/tu28.png')}}" alt="">
                    <h3>肖然</h3>
                    <p> 
                        
                        花镇CEO<br>
                        门萨俱乐部会员<br>
                        后天自然流约会导师<br>
                        
                        
                        <b></b>
                        长期从事女性智慧爱情课题的研究、被戏称为“比女人更懂女人的男人”、致力于运用智慧与情感的双轨培养达成女性情感的幸福管理。
                        
                    </p>
                </li>
                
                
                
            </ul>
        </div>  
    </div>

    <div class="banner2">
        <div class="con_in">
            <a href="#" class="apply_box_btn">立即获取</a>
        </div>
        
    </div>

    <div class="con7">
        <div class="con_in">
            <h2>专业咨询团队 品质服务效果保障</h2>
            <h4>恪守情感咨询师、家庭婚姻咨询师的工作职责和道德操守</h4>
            <p>花镇专业的情感服务团队，源自于专业的情感行业知识与经验的沉淀,且每位咨询师都具备《中国婚恋家庭咨询与培训协会》颁发的结业证书。花镇为在恋爱、婚姻、家庭生活中遇到各种问题的求助者提供咨询服务，从相识到长期关系，帮助每一位学员应对情感问题，为爱情保驾护航，强个人不如强团队，强阵容打造全方位恋爱指导。</p>
            <div class="con07_banner">
                <img src="{{asset('resources/home/picture/tu30_1.png')}}" alt="">
            </div>
            <ul>
                <li>
                    <span><img src="{{asset('resources/home/picture/tu31_1.png')}}" alt=""></span>
                    <p>已帮助34万人觅取幸福</p>
                </li>
                <li>
                    <span><img src="{{asset('resources/home/picture/tu32_1.png')}}" alt=""></span>
                    <p>累计服务694万个会员</p>
                </li>
                <li>
                    <span><img src="{{asset('resources/home/picture/tu33.png')}}" alt=""></span>
                    <p>解答760万人次情感咨询</p>
                </li>

            </ul>
            <p>在爱情中经历的开心与不开心，都会与你一起面对；在爱情中的每一次历练，每一次成长，都会与你一起见证。幸福闺蜜，帮你一直幸福下去……</p>
            <a href="#" class="love-btn">了解如何加入幸福闺蜜团</a>
        </div>
    </div>

            <!-- <div class="con8">
                <div class="con_in">
                    <h2>对幸福向往 从未停止追求步伐</h2>
                    <h4>幸福不是终点站，而是一场没有终点的甜蜜旅程</h4>
                    <dl>
                        <dt>
                            <img src="{{asset('resources/home/picture/tu34.png')}}" alt="">
                        </dt>
                        <dd>
                            <span>
                                <b>赵小姐 23岁</b><br>
                                主要学习:<br>
                                脱单特训 恋爱修成<br>
                                想找个对的人，谈一场永不<br>
                                分手的恋爱

                            </span>

                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <img src="{{asset('resources/home/picture/tu35.png')}}" alt="">
                        </dt>
                        <dd>
                            <span>
                                <b>吴小姐 25岁</b><br>
                                主要学习:<br>
                                男生优选 社交拓展<br>
                                寻找一个和我一样优秀爱我<br>
                                的人过一辈子
                            </span>

                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <img src="{{asset('resources/home/picture/tu36.png')}}" alt="">
                        </dt>
                        <dd>
                            <span>
                                <b>李小姐 29岁</b><br>
                                主要学习:<br>
                                婚后和谐幸福修成<br>
                                找回恋爱时甜蜜感觉，让爱情<br>
                                持续保持

                            </span>

                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <img src="{{asset('resources/home/picture/tu37.png')}}" alt="">
                        </dt>
                        <dd>
                            <span>
                                <b>高小姐 24岁</b><br>
                                主要学习:<br>
                                气质特训 幸福修成<br>
                                做个气质女人，做老公眼中的<br>
                                优雅妻子

                            </span>

                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <img src="{{asset('resources/home/picture/tu38.png')}}" alt="">
                        </dt>
                        <dd>
                            <span>
                                <b>郝小姐 30岁</b><br>
                                主要学习:<br>
                                婚前修炼 爱情维系<br>
                                做称职的女友，期待走进甜蜜<br>
                                的婚姻殿堂

                            </span>

                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <img src="{{asset('resources/home/picture/tu39.png')}}" alt="">
                        </dt>
                        <dd>
                            <span>
                                <b>唐小姐 33岁</b><br>
                                主要学习:<br>
                                气质特训 挽回婚姻<br>
                                挽回老公对我的爱，重燃甜蜜<br>
                                幸福婚姻

                            </span>

                        </dd>
                    </dl>
                </div>
            </div> -->
            <div class="con10">
                <div class="con_in">
                    <h2>为什么选择花镇</h2>
                    <h4>只要你愿意，我们可以帮你学会爱与被爱，获得幸福人生</h4>
                    <ul>
                        <li>
                            <span>
                                <img src="{{asset('resources/home/picture/tu43.png')}}" alt="">
                            </span>
                            <b>专业</b>
                            <p>
                                9年专注两<br>
                                性情感服务
                            </p>
                        </li>
                        <li>
                            <span>
                                <img src="{{asset('resources/home/picture/tu44.png')}}" alt="">
                            </span>
                            <b>家庭</b>
                            <p>
                                万千家庭见证花镇<br>
                                9年颠覆历程
                            </p>
                        </li>
                        <li>
                            <span>
                                <img src="{{asset('resources/home/picture/tu45.png')}}" alt="">
                            </span>
                            <b>导师</b>
                            <p>
                                300位国家认证<br>
                                心理咨询师
                            </p>
                        </li>
                        <li>
                            <span>
                                <img src="{{asset('resources/home/picture/tu46.png')}}" alt="">
                            </span>
                            <b>荣誉</b>
                            <p>
                                500家媒体深度报<br>
                                道，备受推崇
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
            $('.love-btn').click(function(event) {
             $('.contact-box').show();
         });
     </script>
     <script src="js/9c39e3e355294ec5be65eb1e922d1d71.js"></script>
     <script src="js/count.js"></script>

    @include('home.layouts.fhns-bottom')
@endsection
@section('script')
    @parent
    <script type="text/javascript">
        /*
        * @Author: Administrator
        * @Date:   2016-06-13 11:26:01
        * @Last Modified by:   Administrator
        * @Last Modified time: 2016-06-17 11:04:16
        */

        'use strict';
        $(function(){

            //爱情管家 婚姻管家切换   
            $('.con2 .tt span').hover(function() {
                $(this).addClass('cur').siblings().removeClass('cur')
                var num=$(this).index();
                $('.con2 .list').eq(num).show().siblings('.list').hide();
            
            });

            //视频课程内容显示
            $('..con3 ul li').hover(function() {
                $(this).children('.txt').show()

            },function(){
                $(this).children('.txt').hide()
            
            });

            //幸福团专家显示
            $('.con6 ul li').hover(function() {
                $(this).children('p').show()
            }, function() {
                $(this).children('p').hide()
            });

        });

        //花镇历程
        $(function(){   
            
            var swiper = new Swiper('.swiper-container', {
                
                slidesPerView: 4,
                paginationClickable: true,
                spaceBetween: 60,
                
            });
            $('.arrow-left').on('click', function(e){
            e.preventDefault()
            swiper.swipePrev()
          })
          $('.arrow-right').on('click', function(e){
            e.preventDefault()
            swiper.swipeNext()
          })

            $('.con5 .swiper-container .swiper-slide').click(function(event) {
                $(this).addClass('cur').siblings().removeClass('cur');
                var num=$(this).index();
                $('.con5 ul li').eq(num).show().siblings().hide();
            });
            

        })







    </script>
@endsection