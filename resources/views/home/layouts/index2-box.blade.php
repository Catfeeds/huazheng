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
		<div class="trapMan-Tit cl">
			{{$index2_box['title']}}
		</div>
		<div class="trapMan-item1">
    		@foreach($index2_box['article'] as $b_k=>$b_v)
				@if($b_k==floor(count($index2_box['article'])/2))	
				<div>
					<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
					<p class="cl">{!!nl2br($b_v['desc'])!!}</p>
					<p class="customLove kefu_btn" title="{{$b_v['title']}}">{{$b_v['title']}}</p>
				</div>
				@else
				<div>
					<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
					<p class="clping" title="{{$b_v['title']}}">{!!$b_v['title']!!}</p>
					<img src="{{asset('resources/home/images/ico/ico1.png')}}">
					<p class="text">{!!nl2br($b_v['desc'])!!}</p>
				</div>
				@endif
    		@endforeach
		</div>
	</div>
@elseif($index2_box['template']=='index2-upset')
	<div class="trapMan-home2">
		<div class="trapMan-Tit cl">
			{{$index2_box['title']}}
		</div>
		<div class="trapMan-item2">
			<div class="trapMan-item2Img">
				<img src="{{asset($index2_box['img'])}}" alt="{{$index2_box['alt']}}">
			</div>
			<div class="trapMan-item2Tab">
    			@foreach($index2_box['article'] as $b_k=>$b_v)
				<div class="trapMan-item2TabD  @if($b_k%4==0) onML @endif kefu_btn">
					<div>
						<p class="trapMan-item2TabDT">{!!$b_v['title']!!}</p>
						<p class="text">{!!nl2br($b_v['desc'])!!}</p>
					</div>
					<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
					<img class="dw" src="{{asset('resources/home/images/ico/ico2.png')}}" alt="">
				</div>
    			@endforeach
			</div>
			@if(!empty($index2_box['cat_desc']))
			<div class="trapMan-item2Bot">
				<p>权威调查统计：</p>
				<span>{!!nl2br($index2_box['cat_desc'])!!}</span>
			</div>
			@endif
		</div>
	</div>
@elseif($index2_box['template']=='index2-love')
	<div class="trapMan-home">
		<div class="trapMan-Tit cl">
			{{$index2_box['title']}}
		</div>
		<div class="trapMan-harvest">
			<div class="trapMan-harvestL">
				<img src="{{asset($index2_box['img'])}}" alt="{{$index2_box['alt']}}">
				<a href="#" class="kefu_btn"></a>
			</div>
			<div class="trapMan-harvestR">
    			@foreach($index2_box['article'] as $b_k=>$b_v)
				<div class="item @if($b_k==0) on @endif kefu_btn">
					<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
					<p class="t1">{!!$b_v['title']!!}</p>
					<p class="lh">{!!nl2br($b_v['desc'])!!}</p>
				</div>
    			@endforeach
			</div>
		</div>
	</div>
@elseif($index2_box['template']=='index2-love-index')
	<div class="trapMan-home">
		<div class="trapMan-Tit cl">
			{{$index2_box['title']}}
		</div>
		<div class="trapMan-exponent" style="background-image: url({{asset($index2_box['img'])}});">
			<div class="trapMan-exponentT">
    			@foreach(explode('<br />',nl2br($index2_box['cat_desc'])) as $b_k=>$b_v)
				<div>
					<img src="{{asset('resources/home/images/ico/ico3.png')}}">
					<span>{{$b_v}}</span>
				</div>
    			@endforeach
				<a href="#" class="ljzx kefu_btn">立即咨询</a>
			</div>
		</div>
	</div>
@elseif($index2_box['template']=='index2-emotional-services')
	<div class="trapMan-home">
		<div class="trapMan-Tit cl">
			{{$index2_box['title']}}
		</div>
		<div class="trapMan-two">
			<ul>
    			@foreach($index2_box['article'] as $b_k=>$b_v)
				<li class="trapMan-twoItem">
					<p class="trapMan-twoB1" title="{{$b_v['title']}}" style="@if($b_k%4==1) background:#ff7396; @elseif($b_k%4==2) background:#50b2e1; @endif">{{$b_v['title']}}</p>
					<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
					<ul class="trapMan-twoB2">
    					@foreach(explode('<br />',nl2br($b_v['desc'])) as $b_k2=>$b_v2)
						<li><i></i>{{$b_v2}}</li>
    					@endforeach
					</ul>
					<a href="#" class="kefu_btn">免费咨询</a>
				</li>
    			@endforeach
			</ul>
		</div>
	</div>
@elseif($index2_box['template']=='index2-five-advantages')
	<div class="trapMan-home">
		<div class="trapMan-Tit2 ">
			<p class="cl">{{$index2_box['title']}}</p>
			<p class="">{!!nl2br($index2_box['cat_desc'])!!}</p>
		</div>
		<div class="trapMan-lunbo">
    		@foreach($index2_box['article'] as $b_k=>$b_v)
    		@if($b_k < 5)
			<div class="lunbo-item @if($b_k==0) cur @endif">
				<div class="trapMan-lunboL">
					<div class="trapMan-lunboLD1">{{$b_v['title']}}</div>
					<div class="trapMan-lunboLD2"><span>{{$b_v['title2']}}</span></div>
					<div class="trapMan-lunboLD3">{!!nl2br($b_v['desc'])!!}</div>
				</div>
				<div class="trapMan-lunboR">
					<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
				</div>
			</div>
			@endif
    		@endforeach
			<div class="lubo">
				<img src="{{asset('resources/home/images/ico/advantages0.png')}}" alt="" usemap="#Map" id="Image1">
				<map name="Map">
					<area shape="poly" coords="16,165,80,60,206,12,207,133,162,150,136,195" >
					<area shape="poly" coords="211,13,335,57,403,163,287,190,259,148,210,131" >
					<area shape="poly" coords="286,194,403,167,399，286，319,374,255,275,285,235" >
					<area shape="poly" coords="250,279,314,379,214,408,107,378,168,274，210,290" >
					<area shape="poly" coords="98,372,164,274,140,234,135,196,16,170,21,273" >
				</map>
			</div>
		</div>
	</div>
@elseif($index2_box['template']=='index2-emotional-master')
	<div class="trapMan-home">
		<div class="trapMan-Tit2 trapMan-Tit3">
			<p class="cl">{{$index2_box['title']}}</p>
			<p class="">{!!nl2br($index2_box['cat_desc'])!!}</p>
			<div class="section">
				<ul class="daoshi_list">
	    			@foreach($index2_box['article'] as $b_k=>$b_v)
	    			@if($b_k < 3)
					<li class="daoshi_name la b{{$b_k}}">
						<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}" class="pic">
						<h4 class="t1">{{$b_v['title']}}</h4>
						<h4 class="t2">{{$b_v['title2']}}</h4>
					</li>
					@endif
	    			@endforeach
				</ul>
				<div class="daoshi_bg2">
	    		@foreach($index2_box['article'] as $b_k=>$b_v)
	    		@if($b_k < 3)
				<div class="daoshi_bglist daoshi_bglist{{$b_k}}">
					<span class="point"></span>
					<div class="daoshi-file">
						<div class="love">
							<a href="#" class="kefu_btn">
								<img src="{{asset('resources/home/images/ico/ico10.png')}}" alt="" class="love-img">
							</a>
							<p>我要与导师面对面</p>
						</div>
						<div class="file-name">导师档案</div>
						<div class="file-detail">
							{!!nl2br($b_v['desc'])!!}
						</div>
					</div>
					<div class="daoshi-file daoshi-file-2">

						<div class="file-name">荣耀地位</div>
						<div class="file-detail">
							{!!nl2br($b_v['desc2'])!!}
						</div>
					</div>
					<img src="{{asset($b_v['img2'])}}" alt="{{$b_v['alt2']}}" class="daoshi_img">
				</div>
				@endif
	    		@endforeach
				</div>
			</div>
		</div>
	</div>
@elseif($index2_box['template']=='index2-article')
	<div class="trapMan-home">
		<div class="trapMan-Tit2 trapMan-Tit3">
			<p class="cl">{{$index2_box['title']}}</p>
			<p class="">{!!nl2br($index2_box['cat_desc'])!!}</p>
		</div>
		<div class="trapMan-share">
			<div class="trapMan-shareL">
	    		@foreach($index2_box['article'] as $b_k=>$b_v)
				<div class="trapMan-shareLP @if($b_k%2==1) left @endif">
					<img @if($b_k%2==1) class="trapMan-shareLPImg" @endif src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
					<div class="trapMan-shareLD @if($b_k%2==1) trapMan-shareD2 @endif">
						<p class="trapMan-shareLP1">{{$b_v['title']}}</p>
						<p class="trapMan-shareLP2">{!!nl2br($b_v['desc'])!!}</p>
						<p class="trapMan-shareLP3"><a href="#" class="kefu_btn">了解详情</a></p>
					</div>
				</div>
	    		@endforeach
			</div>
		</div>
	</div>
@elseif($index2_box['template']=='index2-skills')
	<div class="trapMan-home">
		<div class="trapMan-Tit2 trapMan-Tit3">
			<p class="cl">{{$index2_box['title']}}</p>
			<p class="">{!!nl2br($index2_box['cat_desc'])!!}</p>
		</div>
		<div class="trapMan-class" >
			<ul>
				@foreach($index2_box['article'] as $b_k=>$b_v)
	    		@if($b_k < 3)
				<li>
					<div> <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}"> </div> 
					<div class="trapMan-classD">
						<h4>{{$b_v['title']}}</h4>
						<p>{!!nl2br($b_v['desc'])!!}</p>
						<a href="#" class="kefu_btn" target='_self'>【了解详情】</a>
					</div>
				</li>
				@endif
				@endforeach
			</ul>
			<div class="trapMan-class2">
				<div class="trapMan-class2L">
					@foreach($index2_box['article'] as $b_k=>$b_v)
		    		@if($b_k > 2 && $b_k < 9)
					<div class="trapMan-class2LD" v-for="case in cate_article_list" >
						<a href="#" class="kefu_btn" target='_self'>
							<span>0{{$b_k-2}}</span>
							{{$b_v['title']}}
						</a>
					</div>
					@endif
					@endforeach
				</div>
				<div class="trapMan-class2R">
					@foreach($index2_box['article'] as $b_k=>$b_v)
		    		@if($b_k > 8 && $b_k < 12)
					<div class="trapMan-class2RD">
						<a href="#" target='_self'>
							<div class="trapMan-class2RTit">
								<img src="{{asset('resources/home/images/ico/ico11.png')}}" alt="">
								<span>{{$b_v['title']}}</span>
							</div>
							<div class="trapMan-class2RCon">
								<img src="{{asset('resources/home/images/ico/ico12.png')}}" alt="">
								<span>{!!nl2br($b_v['desc'])!!}
									<p class="kefu_btn">[详情]</p>
								</span>
							</div>
						</a>
					</div>
					@endif
					@endforeach
				</div>
			</div>
			<div class="trapMan-btn">
				<div class="trapMan-class2LA kefu_btn">
					<a href="#" target='_self' >点击查看更多信息</a>
				</div>
				<div class="trapMan-class2RA kefu_btn">
					和我的情况很类似，立刻咨询导师获取帮助
				</div>
			</div>
		</div>
	</div>
@elseif($index2_box['template']=='index2-crux')
	<div class="repair-con">
		<div class="repair-conTit">
			{{$index2_box['title']}}
		</div>
		<div class="repair-item1">
			<img src="{{asset($index2_box['img'])}}" alt="{{$index2_box['alt']}}">
		</div>
		<div class="repair-item2">
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
		<div class="repair-conTit">
			{{$index2_box['title']}}
		</div>
		<div class="repair-item3Con">
			<ul>
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
			<div class="item3Con-bottom">
				<b>权威调查统计：</b>
				<p>{!!nl2br($index2_box['cat_desc'])!!}</p>
			</div>
		</div>
	</div>
@elseif($index2_box['template']=='index2-opportunity')
	<div class="repair-item4">
		<div class="repair-conTit">
			{{$index2_box['title']}}
		</div>
		<div class="repair-item4T">{!!nl2br($index2_box['cat_desc'])!!}</div>
		<div class="repair-item4T2">
			<img src="{{asset($index2_box['img'])}}" alt="{{$index2_box['alt']}}">
		</div>
	</div>
@elseif($index2_box['template']=='index2-love-state2')
	<div class="whaq-tit cl">
		{{$index2_box['title']}}
	</div>
	<div class="whaq-item1">
		<div class="whaq-item1Con">
			<ul>
				@foreach($index2_box['article'] as $b_k=>$b_v)
				<li class="list{{$b_k+1}}">
					<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
					<p class="whaq-item1ConP1 ellipsis">{{$b_v['title']}}</p>
					<p class="whaq-item1ConP2 ellipsis3">{!!nl2br($b_v['desc'])!!}</p>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="whaq-tit2">
		<p class="whaq-tit2P1">{!!nl2br($index2_box['cat_desc'])!!}</p>
		<p class="whaq-tit2P2"><span class="kefu_btn">{{$index2_box['title2']}}</span></p>
	</div>
@elseif($index2_box['template']=='index2-img')
	<div class="whaq-item2" style="background-image: url({{asset($index2_box['img'])}});"></div>
@elseif($index2_box['template']=='index2-confusion')
	<div class="qgzd-content">
		<div class="confusion_con01">
			<div class="con-in">
				<h3>{{$index2_box['title']}}</h3>
				<ul>
					@foreach($index2_box['article'] as $b_k=>$b_v)
					<li class="animated kefu_btn">
						<img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}">
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		@if(!empty($index2_box['img']))
		<div class="add-tu" style="background-image: url({{asset($index2_box['img'])}});"> </div>
		@endif
	</div>
@elseif($index2_box['template']=='index2-problem')
	<div class="qgzd-content">
		<div class="problem-con02">
			<div class="con-in" style="background-image: url({{asset($index2_box['img'])}});">
				<ul>
					@foreach($index2_box['article'] as $b_k=>$b_v)
					<li class="li{{$b_k+1}}">
						<p class="kefu_btn">老公变心了还能挽回吗？</p>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endif