$(function(){
	// 回到顶部
	$('.s_top').click(function(e) {
		$('html,body').animate({ scrollTop:0 },500)
    });
    $(window).scroll(function(){
    	var x = $(window).scrollTop();	//得到现在的卷动高度
    	if(x > 500){
    		$(".s_top").fadeIn();
    	}else{
    		$(".s_top").fadeOut();
    	}
    });
    // 二维码
    $('.side_ewm').hover(function() {
    	$(this).children('.hz_ewm').show();
    }, function() {
    	$(this).children('.hz_ewm').hide();
    });

	$('.side_fixed li').hover(function() {
		$(this).addClass("ab");
	}, function() {
		$(this).removeClass("ab");
	});

    //普通主页-爱情
    $('.trapMan-harvestR .item').hover(function() {
       $(this).addClass('on').siblings().removeClass('on')
    });
    // 五大优势
    var Index= 0;
    function rotate(){
        $("#Image1").attr({
            "src": "/resources/home/images/ico/advantages"+(Index)+".png"
        });
        $('.lunbo-item').eq(Index).show().siblings('.lunbo-item').hide()
        if(Index == 4){
            Index=0
        }else{
            Index++;
        }
    }
    var intYuan = setInterval("rotate()",2000);
    $(".lubo area").hover(function() {
        clearInterval(intYuan);
        Index = $(this).index();
        $("#Image1").attr({
            "src": "/resources/home/images/ico/advantages"+(Index)+".png"
        });
        $('.lunbo-item').eq(Index).show().siblings('.lunbo-item').hide()
    },function () {
        intYuan = setInterval(rotate,2000);
    });
    // 导师滑动
    $('.daoshi_name').hover(function(){
        var $index = $(this).index(),
            $point = $('.point'),
            $daoshi_bglist = $('.daoshi_bglist'),
            $this = $(this);
        $this.addClass('actili').siblings().removeClass('actili');
        if($index ==0){
            $point.css({
                left:170
            })
        }else if($index==1){
            $point.css({
                left:570
            })
        }else{
            $point.css({
                left:970
            })
        }
        $daoshi_bglist.eq($index).fadeIn().siblings().hide();
    })
    //情感困惑
    $('.confusion_con01 ul li.animated').hover(function() {
        $(this).addClass('flipInY').siblings().removeClass('flipInY')
    });

    //视频
    $("body").on('click', '.video_play', function(){
        var elem = $(this);
        x = elem;
        // console.log(elem.data('vid'));
        var vid = elem.data('vid');
        var src = vid;
         // 'http://static.video.qq.com/TPout.swf?vid=' + vid + '&auto=0';
        // console.log(vid, src, elem);
        var attr = {allowFullScreen: true,
            quality: "high",
            width: 480,
            height: 400,
            align: "middle",
            allowScriptAccess: "always",
            wmode: "Opaque"
        };
        var params = {wmode: "Opaque"};
        obj = createSwfObject(src, attr, params);
        $("#flash-player").empty().append(obj);
        $(".video-list-1").show();
        $(".divMask").show();
    });
    function createSwfObject (src, attributes, parameters) {
        var i, html, div, obj, attr = attributes || {}, param = parameters || {};
        attr.type = 'application/x-shockwave-flash';
        if (window.ActiveXObject) {
            attr.classid = 'clsid:d27cdb6e-ae6d-11cf-96b8-444553540000';
            param.movie = src;
        }
        else {
            attr.data = src;
        }
        html = '<object';
        for (i in attr) {
            html += ' ' + i + '="' + attr[i] + '"';
        }
        html += '>';
        for (i in param) {
            html += '<param name="' + i + '" value="' + param[i] + '" />';
        }
        html += '</object>';
        div = document.createElement('div');
        div.innerHTML = html;
        obj = div.firstChild;
        div.removeChild(obj);
        return obj;
    };
    $("body").on("click", ".div-close", function() {
        $("#flash-player").empty();
        $(".video-list-1").hide();
        $(".divMask").hide();
    });


    //导师
    $('.hzgm li').hover(function(event) {
        $(this).children('.show').show()
    },function(){
        $(this).children('.show').hide()
    });

    //导师导航切换
    $('.ds_nav ul li').click(function(event) {
        $(this).addClass('cur').siblings().removeClass('cur');
         var num = $(this).index();
         $('.con_in .item').eq(num).show().siblings('.item').hide();
         $('.ds_js').hide()
    });

    $('.ds_nav h3').click(function(event) {
        $('.ds_js').show().siblings('.item').hide();
        $('.ds_nav ul li').removeClass('cur');
    });
})

// var Index= 0;
// function rotate(){
//     $("#Image1").attr({
//         "src": "/huazhen_revision/pc/topic/common/images/img_5" + (Index) + ".png"
//     });
//     if(Index == 4){
//         Index=0
//     }else{
//         Index++;
//     }
// }
// $(function(){
//     var intYuan = setInterval("rotate()",2000);
//     $(".lubo area").hover(function() {
//         clearInterval(intYuan);
//         Index = $(this).index();
//         $("#Image1").attr({
//             "src": "/huazhen_revision/pc/topic/common/images/img_5" + (Index) + ".png"
//         });
//         $('.lunbo-item').eq(Index).show().siblings('.lunbo-item').hide()
//     },function () {
//         intYuan = setInterval(rotate,2000);
//     });
//     var header_wp = new Swiper('.header-container', {
//         pagination: '.header-pagination',
//         paginationClickable: true,
//         loop: true,
//         autoplay: 3000,
//         speed: 600
//     });
// })


// $('.trapMan-harvestR .item').hover(function() {
//    $(this).addClass('on').siblings().removeClass('on')
// });
// // 导师滑动
// $('.daoshi_name').hover(function(){
//     var $index = $(this).index(),
//         $point = $('.point'),
//         $daoshi_bglist = $('.daoshi_bglist'),
//         $this = $(this);
//     $this.addClass('actili').siblings().removeClass('actili');
//     if($index ==0){
//         $point.css({
//             left:170
//         })
//     }else if($index==1){
//         $point.css({
//             left:570
//         })
//     }else{
//         $point.css({
//             left:970
//         })
//     }
//     $daoshi_bglist.eq($index).fadeIn().siblings().hide();
// })

// $(".anli-cosTit a").hover(function () {
//     $(this).find("p").addClass("cl");
// },function () {
//     $(this).find("p").removeClass("cl");
// })

// $('.trapMan-classD').hover(function() {
//     $(this).addClass('cur')
// }, function() {
//     $(this).removeClass('cur')
// });
//  $(function(){
//     $('.apply_box_btn').live('click',function(event) {
//         console.log($(this).data('channel'));
//         if($(this).data('channel'))
//            $('.contact-box  input[name="channel"]').val($(this).data('channel'));
//         $('.contact-box').show();
        
//     });
//     $('.contact-box .close').live('click',function(event) {
//         $('.contact-box').hide();
//     });
// });
// function getVcode(){
	
// }

// // 意向单提交
//  $(function(){
//     var $form = $('#contact-form');

//     $form.submit(function (e) {
//         e.preventDefault();

//         var name = $form.find('input[name="realname"]').val();
//         var phone = $form.find('input[name="mobile"]').val();

//         if (!/^1[3|4|5|7|8]\d{9}$/.test(phone)) {
//             alert('号码格式错误～请检查～');
//             return false;
//         }

//         $.ajax({
//             url: 'http://api.junzhinuo1314.com/api/newWillInput',
//             type: 'post',
//             data: $form.serialize(),
//             // xhrFields: {
//             //     withCredentials: true
//             // },
//             success: function () {
//                 alert('感谢提交,我们的顾问会稍后联系您!');
//                 $('.contact-box').slideUp();
//                 $form[0].reset();
//             },
//             error: function () {
//                 alert('抱歉～出错了～请稍后重试～');
//             }
//         });
//     })
//  });


// $(function(){
// 	$('.arr_top').click(function(e) {

// 			$('html,body').animate({ scrollTop:0 },500)
// 	    });



// 		//修改头像
// 	 $('.bg-banner .avatar .avat').click(function(event) {
// 	 	$('.tx_fixed').show();
// 	 });
// 	//头像选择
// 	$('.tx_fixed .pre span').click(function(event) {
// 		$(this).addClass('on').siblings().removeClass('on')
// 	});

// 	//关闭上传头像
// 	$('.tx_fixed .close').click(function(event) {
// 		$('.tx_fixed').hide();
// 	});


	


// 	// 意向单
// 	$('.side_qgzx').hover(function() {
// 		$(this).children('.side_yxd').show();
// 	}, function() {
// 		$(this).children('.side_yxd').hide();
// 	});

	

	


// 	// 用户登录下滑
// 	$('.hy_show').hover(function() {
// 		$(this).children('.user-card').show();
// 	}, function() {
// 		$(this).children('.user-card').hide();
// 	});

// 	$('.dl-avatar').hover(function() {
// 		$(this).children('.user-card').show();
// 	}, function() {
// 		$(this).children('.user-card').hide();
// 	});

	


// });