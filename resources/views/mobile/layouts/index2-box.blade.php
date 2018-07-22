<div class="index2">
	@if($index2_box['template']=='index2-jieshao')
	    <div class="main">
	    	<div class="anli-top">
	    		@foreach($index2_box['article'] as $b_v)
	    		<div>
	    			<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
	    			<p class="anli-topP1" title="{{$b_v['title']}}">{{$b_v['title']}}</p>
	    			<p class="anli-topP2">{!!nl2br($b_v['desc'])!!}</p>
	    		</div>
	    		@endforeach
	    	</div>
	    </div>
	@elseif($index2_box['template']=='index2-love-state')
		<div class="trapMan-home">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
		   	<div class="box_padd hid_bbor fh_swicon">
	   	       <div class="swiper-container fh_swi" >
	   	          <div class="swiper-wrapper">
	    			@foreach($index2_box['article'] as $b_k=>$b_v)
	   	            <div class="swiper-slide">
	   	                <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
	   	                <p class="fh_ptwo">{!!$b_v['title']!!}</p>
	   	            </div>
	    			@endforeach
	   	          </div>
	   	        </div>   
	   	        <div class="hz-xc fh_href">
	   	            <a class="hz-btn kefu_btn" href="">定制专属爱情方案，收获属于你的爱情！</a>    
	   	        </div>
	   	   </div>
		</div>
		<script> 
		$(function(){
			var mySwiper = new Swiper('.fh_swi', {
		        initialSlide :1,
		        effect : 'coverflow',
		            slidesPerView: 1.3,
		            centeredSlides: true,
		            coverflow: {
		                rotate: 0,
		                stretch: 80,
		                depth:85,
		                modifier: 2,
		                slideShadows : false
		            }
			})
		})
		</script>
	@elseif($index2_box['template']=='index2-upset')
		<div class="repair-item3">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="repair-item3Con">
				<ul class="clearfix">
					@foreach($index2_box['article'] as $b_k=>$b_v)
					<li class="kefu_btn">
						<div class="repair-item3-1">
							<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}" class="img1">
							<img src="{{asset($b_v['img2'])}}" alt="{{$b_v['alt2']}}" class="img2">
						</div>
						<p class="repair-item3ConTit repair-item3b{{$b_k+1}}">{{$b_v['title']}}</p>
						<p class="repair-item3ConP">{!!nl2br($b_v['desc'])!!}</p>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	@elseif($index2_box['template']=='index2-love')
		<div class="trapMan-home">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="trapMan-harvest">
				<div class="trapMan-harvestL">
					<img src="{{asset($index2_box['img2'])}}" alt="{{$index2_box['alt2']}}">
					<a  class="kefu_btn"></a>
				</div>
				<div class="clearfix trapMan-harvestR kp_swi">
					<div class="swiper-wrapper">
	    			@foreach($index2_box['article'] as $b_k=>$b_v)
					<div class="swiper-slide item @if($b_k==0) on @endif kefu_btn">
						<div class="info">
							<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
							<p class="t1">{!!$b_v['title']!!}</p>
							<p class="lh">{!!nl2br($b_v['desc'])!!}</p>
						</div>
					</div>
	    			@endforeach
	    			</div>
	    			<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				var kpSwiper = new Swiper('.kp_swi', {
					autoplay : 3000,
					pagination : '.swiper-pagination',
					paginationClickable :true,
					slidesPerView : 2,
				    slidesPerGroup :2,
				})
			})
		</script>
	@elseif($index2_box['template']=='index2-love-index')
		<div class="trapMan-home">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="trapMan-exponent" >
				<a class="kefu_btn"><img src="{{asset($index2_box['img2'])}}" alt=""></a>
			</div>
		</div>
	@elseif($index2_box['template']=='index2-emotional-services')
		<div class="trapMan-home">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="trapMan-two qg_fw">
				<ul class="clearfix swiper-wrapper">
	    			@foreach($index2_box['article'] as $b_k=>$b_v)
					<li class="trapMan-twoItem swiper-slide">
						<div class="bx">
							<p class="trapMan-twoB1" title="{{$b_v['title']}}" style="@if($b_k%4==1) background:#ff7396; @elseif($b_k%4==2) background:#50b2e1; @endif">{{$b_v['title']}}</p>
							<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
							<ul class="trapMan-twoB2">
		    					@foreach(explode('<br />',nl2br($b_v['desc'])) as $b_k2=>$b_v2)
		    					@if($b_k2 < 3)
								<li><i></i>{{$b_v2}}</li>
								@endif
		    					@endforeach
							</ul>
							<a  class="kefu_btn">免费咨询</a>
						</div>
					</li>
	    			@endforeach
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				var qgSwiper = new Swiper('.qg_fw', {
					autoplay : 3000,
					initialSlide :1,
					effect : 'coverflow',
					slidesPerView: 1.3,
					centeredSlides: true,
					coverflow: {
			            rotate: 0,
			            stretch: 80,
			            depth:85,
			            modifier: 2,
			            slideShadows : false,
		       		}
				})
			})
		</script>
	@elseif($index2_box['template']=='index2-five-advantages')
		<div class="trapMan-home ">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="trapMan-lunbo ">
				<div class="ys_swiper">
					<div class="swiper-wrapper">
			    		@foreach($index2_box['article'] as $b_k=>$b_v)
			    		@if($b_k < 5)
			    		<div class="swiper-slide">
			    			<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}" class="ys_top">
			    			<div class="ys_con hz-cf">
			    				<div class="hz-fl">
			    					<div class="ys_icon"><span>{{$b_k+1}}</span><br>优势</div>
			    					<p>{{$b_v['title']}}</p>
			    					<div class="ys_des">{{$b_v['title2']}}</div>
			    				</div>
			    				<div class="ys_text">{!!nl2br($b_v['desc'])!!}</div>
			    			</div>
			    		</div>
						@endif
			    		@endforeach
		    		</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				var ysSwiper = new Swiper('.ys_swiper', {
					autoplay : 3000,
					pagination : '.swiper-pagination',
					paginationClickable :true,
				})
			})
		</script>
	@elseif($index2_box['template']=='index2-emotional-master')
		<div class="trapMan-home">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="trapMan-Tit2 trapMan-Tit3">
				<ul class="clearfix zsds_btn">
					@foreach($index2_box['article'] as $b_k=>$b_v)
					@if($b_k < 3)
				    <li class="divbox @if($b_k==0) divbox @endif">
				        <p class="@if($b_k==0) zsds_btn_sel @endif">
				            <i style="background-image: url({{asset($b_v['img'])}});"></i>{{$b_v['title']}}
				        </p>
				    </li>
    				@endif
        			@endforeach
			  	</ul>
				<div class="zsds_com hid_bbor">
					@foreach($index2_box['article'] as $b_k=>$b_v)
					@if($b_k < 3)
					<div class="la" @if($b_k>0) style="display: none;" @endif>
						<div class="clearfix hz-cf">
							<img src="{{asset($b_v['img2'])}}" alt="{{$b_v['alt2']}}" class="zsds_img">
							<div class="zsds_div">
								<p class="zsName">{{$b_v['title']}}</p>
								<p class="zsRy">{{$b_v['title2']}}</p>
								<p class="ry"><span>荣誉</span></p>
								<div class="zsUl">
									{!!nl2br($b_v['desc'])!!}
								</div>
							</div>
						</div>
						<div class="sc">
							{!!nl2br($b_v['desc2'])!!}
						</div>
					</div>
					@endif
		    		@endforeach
			  	</div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				$(".zsds_btn li").click(function(){
			        $(this).addClass('divbox').siblings().removeClass('divbox');
			        $(this).find('p').addClass('zsds_btn_sel').parents('li').siblings().find('p').removeClass("zsds_btn_sel");
			        $(".zsds_com>div").eq($(this).index()).show().siblings().hide();
			        console.log($(this).index());
			    });
			})
		</script>
	@elseif($index2_box['template']=='index2-article')
		<!-- <div class="trapMan-home">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="trapMan-share">
				<div class="trapMan-shareL">
		    		@foreach($index2_box['article'] as $b_k=>$b_v)
					<div class="trapMan-shareLP @if($b_k%2==1) left @endif">
						<img @if($b_k%2==1) class="trapMan-shareLPImg" @endif src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
						<div class="trapMan-shareLD @if($b_k%2==1) trapMan-shareD2 @endif">
							<p class="trapMan-shareLP1">{{$b_v['title']}}</p>
							<p class="trapMan-shareLP2">{!!nl2br($b_v['desc'])!!}</p>
							<p class="trapMan-shareLP3"><a  class="kefu_btn">了解详情</a></p>
						</div>
					</div>
		    		@endforeach
				</div>
			</div>
		</div> -->
	@elseif($index2_box['template']=='index2-skills')
		<div class="trapMan-home">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="trapMan-class" >
				<ul>
					@foreach($index2_box['article'] as $b_k=>$b_v)
		    		@if($b_k < 3)
					<li>
						<div class="art_img"> <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}"> </div> 
						<div class="trapMan-classD">
							<h4>{{$b_v['title']}}</h4>
							<p>{!!nl2br($b_v['desc'])!!}</p>
						</div>
					</li>
					@endif
					@endforeach
				</ul>
			</div>
		</div>
	@elseif($index2_box['template']=='index2-crux')
		<div class="repair-con">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="repair-item1">
				<img src="{{asset($index2_box['img2'])}}" alt="{{$index2_box['alt2']}}">
			</div>
			<div class="clearfix repair-item2">
				@foreach($index2_box['article'] as $b_k=>$b_v)
				<div class="repair-item2D repair-item2b{{$b_k+1}} kefu_btn">
					<p><span class="repair-item2s{{$b_k+1}}">{{$b_v['title']}}</span></p>
					<p class="ellipsis3">{!!nl2br($b_v['desc'])!!}</p>
				</div>
				@endforeach
			</div>
		</div>
	@elseif($index2_box['template']=='index2-encounter')
		<div class="repair-item3">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="repair-item3Con">
				<ul class="clearfix">
					@foreach($index2_box['article'] as $b_k=>$b_v)
					<li class="kefu_btn">
						<div class="repair-item3-1">
							<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}" class="img1">
							<img src="{{asset($b_v['img2'])}}" alt="{{$b_v['alt2']}}" class="img2">
						</div>
						<p class="repair-item3ConTit repair-item3b{{$b_k+1}}">{{$b_v['title']}}</p>
						<p class="repair-item3ConP">{!!nl2br($b_v['desc'])!!}</p>
					</li>
					@endforeach
				</ul>
				<!-- <div class="item3Con-bottom">
					<b>权威调查统计：</b>
					<p>{!!nl2br($index2_box['cat_desc'])!!}</p>
				</div> -->
			</div>
		</div>
	@elseif($index2_box['template']=='index2-opportunity')
		<div class="repair-item4">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="repair-item4T">
				{!!nl2br($index2_box['cat_desc'])!!}
				<img src="{{ asset('resources/mobile/images/ico3.png') }}" class="jh_left">
				<img src="{{ asset('resources/mobile/images/ico4.png') }}" class="jh_right">
			</div>
			<div class="repair-item4T2">
				<img src="{{asset($index2_box['img2'])}}" alt="{{$index2_box['alt2']}}">
			</div>
			<div class="hz-btn fh_btn kefu_btn hy_btn">立即咨询</div>
		</div>
	@elseif($index2_box['template']=='index2-love-state2')
		<div class="tap2_tit">
	      	<p>
				<i></i>
				<i></i>
				<i></i>
				<i></i>
				<span>{{$index2_box['title']}}</span>
				<span class="minTit">{{$index2_box['en_title']}}</span>
	      	</p>
	   	</div>
		<div class="whaq-item1">
			<div class="whaq-item1Con wh_swiper">
				<ul class="swiper-wrapper">
					@foreach($index2_box['article'] as $b_k=>$b_v)
					<li class="swiper-slide list{{$b_k+1}}">
						<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
						<p class="whaq-item1ConP1 ellipsis">{{$b_v['title']}}</p>
						<p class="whaq-item1ConP2 ellipsis3">{!!nl2br($b_v['desc'])!!}</p>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="whaq-tit2">
			<p class="whaq-tit2P1">
			{!!nl2br($index2_box['cat_desc'])!!}
			<img src="{{asset('resources/mobile/images/ico7.png')}}" class="wh_tleft">
      		<img src="{{asset('resources/mobile/images/ico8.png')}}" class="wh_tright">
			</p>
			<p class="whaq-tit2P2"><span class="kefu_btn">{{$index2_box['title2']}}</span></p>
		</div>
		<script type="text/javascript">
			$(function(){
				var wh_swiper = new Swiper('.wh_swiper', {
					autoplay : 3000,
					initialSlide :1,
					effect : 'coverflow',
					slidesPerView: 1.3,
					centeredSlides: true,
					coverflow: {
			            rotate: 0,
			            stretch: 80,
			            depth:85,
			            modifier: 2,
			            slideShadows : false,
		       		}
				})
			})
		</script>
	@elseif($index2_box['template']=='index2-img')
		<div class="whaq-item2">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
		   	<div class="img_box"><img src="{{asset($index2_box['img2'])}}"></div>
		</div>
	@elseif($index2_box['template']=='index2-confusion')
		<div class="qgzd-content">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="confusion_con01">
				<div class="con-in">
					<ul>
						@foreach($index2_box['article'] as $b_k=>$b_v)
						<li class="animated kefu_btn">
							<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
						</li>
						@endforeach
					</ul>
				</div>
			</div>
			@if(!empty($index2_box['img2']))
			<div class="add-tu"> <img src="{{asset($index2_box['img2'])}}"> </div>
			@endif
		</div>
	@elseif($index2_box['template']=='index2-problem')
		<div class="qgzd-content">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="padd_all hid_bbor">
		        <div class="swiper-container qg_swi">
		          	<div class="swiper-wrapper">
		          	@foreach($index2_box['article'] as $b_k=>$b_v)
			          	@if($b_k%6==0)
			            <div class="swiper-slide">
		                <ul class="clearfix qg_list hz-cf">
		                @endif

		                    <li><a href="javascript:void(0)" class="kefu_btn">{{$b_v['title']}}</a></li>
	
						@if($b_k%6==5||count($index2_box['article'])==$b_k+1)
		                </ul>
			            </div>
			            @endif
		            @endforeach
		          	</div>
		           <div class="swiper-pagination pagination2"></div>
		        </div>
		   </div>
		</div>
		<script type="text/javascript">
			$(function(){
				var mySwiper = new Swiper('.qg_swi', {
				    pagination : '.swiper-pagination',
				    paginationClickable :true,
				})
			})
		</script>
	@elseif($index2_box['template']=='love3-encounter')
		<div class="love3-content">
			<div class="tap2_tit">
		      	<p>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<span>{{$index2_box['title']}}</span>
					<span class="minTit">{{$index2_box['en_title']}}</span>
		      	</p>
		   	</div>
			<div class="con1">
			    <div class="con_in love3_con1">
			        <ul class="swiper-wrapper">
						@foreach($index2_box['article'] as $b_k=>$b_v)
						<li class="swiper-slide">
						    <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
						    <p class="ellipsis">{{$b_v['title']}}</p>
						    <span>{!!nl2br($b_v['desc'])!!}</span>
						</li>
						@endforeach
			        </ul>
			    </div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				var love3_con1 = new Swiper('.love3_con1', {
				    pagination : '.projectpa',
				    slidesPerView : 1.5,
				    spaceBetween : 20,
				    autoplay : 4000
				});
			})
		</script>
	@elseif($index2_box['template']=='love3-happy')
		<div class="love3-content">
			<div class="con2">
			    <div class="con_in">
			        <h2>{{$index2_box['title']}}</h2>
			        <div class="cm">{!!$index2_box['content']!!}</div>
			        <div class="tt">
						@foreach($index2_box['article'] as $b_k=>$b_v)
						<span @if($b_k==0) class="cur" @endif>{{$b_v['title']}}<i></i></span>
						@endforeach
			        </div>
					@foreach($index2_box['article'] as $b_k=>$b_v)
			        <div class="list @if($b_k==0) on @endif">
			            <dl>
			                <dt><img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}"></dt>
			                <dd>
			                	{!!$b_v['content']!!}
			                    <!-- <ul>
	            	    			@foreach(explode('<br />',nl2br($b_v['desc'])) as $b_k2=>$b_v2)
	            					<li>
	            					    {!!$b_v2!!}
	            					</li>
	            	    			@endforeach
			                    </ul> -->
			                </dd>
			            </dl>
			        </div>
					@endforeach
			    </div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				$('.love3-content .con2 .tt span').hover(function() {
				    $(this).addClass('cur').siblings().removeClass('cur')
				    var num=$(this).index();
				    $('.love3-content .con2 .list').eq(num).show().siblings('.list').hide();
				
				});
			})
		</script>
	@elseif($index2_box['template']=='love3-course')
		<div class="love3-content">
			<div class="con3">
			    <div class="con_in love3_con3">
			        <h2>{{$index2_box['title']}}</h2>
			        <div class="cm">{!!nl2br($index2_box['cat_desc'])!!}</div>
			        <ul class="swiper-wrapper">
						@foreach($index2_box['article'] as $b_k=>$b_v)
			            <li class="swiper-slide">
			                <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
			                <div class="txt">
			                    <p>
	            	    			@foreach(explode('<br />',nl2br($b_v['desc'])) as $b_k2=>$b_v2)
	            					<span>
	            					    {!!$b_v2!!}
	            					</span>
	            	    			@endforeach
			                    </p>
			                </div>
			            </li>
						@endforeach
			        </ul>
			    </div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				var love3_con3 = new Swiper('.love3_con3', {
				    pagination : '.projectpa',
				    slidesPerView : 1.5,
				    spaceBetween : 20,
				    autoplay : 4000
				});
			})
		</script>
	@elseif($index2_box['template']=='love3-guidelines')
		<div class="love3-content">
			<div class="con4">
			    <div class="con_in love3_con4">
			        <h2>{{$index2_box['title']}}</h2>
			        <h4>{!!nl2br($index2_box['cat_desc'])!!}</h4>
			        <div class="cm">{!!$index2_box['content']!!}</div>
			        <ul class="swiper-wrapper">
						@foreach($index2_box['article'] as $b_k=>$b_v)
						<li class="swiper-slide" style="background-image: url({{asset($b_v['img'])}});">
						    <div class="tc">
						    	<p class="ellipsis">{{$b_v['title']}}</p>
						    	<span class="ellipsis3">{!!nl2br($b_v['desc'])!!}</span>
						    </div>
						</li>
						@endforeach
			        </ul>
			        <a  class="zx love-btn kefu_btn">了解自己适合哪种提升方案</a>
			    </div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				var love3_con4 = new Swiper('.love3_con4', {
				    pagination : '.projectpa',
				    slidesPerView : 1,
				    spaceBetween : 20,
				    autoplay : 4000
				});
			})
		</script>
	@elseif($index2_box['template']=='love3-course2')
		<div class="love3-content">
			<div class="con5">
			    <div class="con_in">
			    	<div class="part-3">
	    	            <div class="con">
	    	                <h2>{{$index2_box['title']}}</h2>
	    	                <h4>{!!nl2br($index2_box['cat_desc'])!!}</h4>
	    	                <div class="cm">{!!$index2_box['content']!!}</div>
	    	            </div>
	    	        </div>
					<div class="part-2">
			            <div class="con">
			                <div class="clearfix live-list">
								@foreach($index2_box['article'] as $b_k=>$b_v)
			                    <div class="time">
			                        <span class="span-1">{{$b_v['title']}}</span>
			                    </div>
			                    <div class="news">
			                        <div class="con">
			                            {!!$b_v['content']!!}
			                        </div>
			                    </div>
			                    <div class="clear"></div>
								@endforeach
			                </div>
			            </div>
			            <div class="con">
			                <div class="btn-2">
			                    <a class="a-1 kefu_btn">了解哪种更适合自己</a>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	@elseif($index2_box['template']=='love3-guimi')
		<div class="love3-content">
			<div class="con6 ">
			    <div class="con_in ">
			        <h2>{{$index2_box['title']}}</h2>
			        <h4>{!!nl2br($index2_box['cat_desc'])!!}</h4>
			        <div class="love3_con6 dz" style="position: relative;">
				        <div class=" swiper-wrapper">
		                	@foreach($index2_box['article'] as $b_k=>$b_v)
	                        <div class="clearfix dz-list swiper-slide">
	                            <div class="dz-img">
	                                <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
	                            </div>
	                            <div class="dz-txt">
	                                <div class="dz-title">
	                                    <span class="name">{{$b_v['title']}}</span>
	                                </div>
	                                <div class="hr"></div>
	                                <div class="info">
	                                    {!!nl2br($b_v['desc'])!!}
					                    <b></b>
					                    {!!nl2br($b_v['desc2'])!!}
	                                </div>
	                            </div>
	                            <div class="clear"></div>
	                        </div><div class="clearfix dz-list swiper-slide">
	                            <div class="dz-img">
	                                <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
	                            </div>
	                            <div class="dz-txt">
	                                <div class="dz-title">
	                                    <span class="name">{{$b_v['title']}}</span>
	                                </div>
	                                <div class="hr"></div>
	                                <div class="info">
	                                    {!!nl2br($b_v['desc'])!!}
					                    <b></b>
					                    {!!nl2br($b_v['desc2'])!!}
	                                </div>
	                            </div>
	                            <div class="clear"></div>
	                        </div>
		                	@endforeach
				        </div>   
				        <div class="swiper-pagination"></div>
			        </div>
			    </div>
			    <a class="a-1 kefu_btn">了解更多幸福闺蜜团信息</a>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				var love3_con6 = new Swiper('.love3_con6', {
				    pagination : '.swiper-pagination',
				    slidesPerView : 1,
				    spaceBetween : 20,
				    autoplay : 4000
				});
			})
		</script>
	@elseif($index2_box['template']=='love3-img')
		{{--<div class="love3-content">
			<div class="banner2" style="background-image:url({{asset($index2_box['img'])}});height: 172px;">
			    <!-- <div class="con_in">
			        <a  class="apply_box_btn">立即获取</a>
			    </div> -->
			</div>
		</div>--}}
	@elseif($index2_box['template']=='love3-protection')
		<div class="love3-content">
			<div class="con7">
			    <div class="con_in">
			        <h2>{{$index2_box['title']}}</h2>
			        <h4>{!!nl2br($index2_box['cat_desc'])!!}</h4>
			        <div class="cm">{!!$index2_box['content']!!}</div>
			        <a  class="love-btn">了解如何加入幸福闺蜜团</a>
			    </div>
			</div>
		</div>
	@elseif($index2_box['template']=='love3-why')
		<div class="love3-content">
			<div class="con10">
			    <div class="con_in">
			        <h2>{{$index2_box['title']}}</h2>
			        <h4>{!!nl2br($index2_box['cat_desc'])!!}</h4>
			        <ul>
	                	@foreach($index2_box['article'] as $b_k=>$b_v)
			            <li>
			                <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
			                <b class="ellipsis">{{$b_v['title']}}</b>
			                <p class="ellipsis2">
			                    {!!nl2br($b_v['desc'])!!}
			                </p>
			            </li>
	                	@endforeach
			        </ul>
			    </div>
			</div>
		</div>
	@endif
</div>