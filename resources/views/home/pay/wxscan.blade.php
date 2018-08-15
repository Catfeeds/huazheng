@extends('home.layouts.app')
@section('style')
@parent
@endsection
@section('content')
<style type="text/css">
	body{background-color: #333;text-align: center;padding-top: 30px;}
	.tishi{margin-bottom: 10px;font-size: 18px;color: #fff;}
</style>
<div class="wxscan">
	<p class="tishi">微信支付</p>
    {!!QrCode::size(200)->margin(1)->generate($Pay->code_url)!!}
</div>
@endsection
@section('script')
@parent
	<script type="text/javascript">
		// 验证是否支付成功，成功后跳转视频详情
		setTimeout(function(){
		    (function longPolling() {
		        $.ajax({
		            url: "{{url('pay_is')}}",
		            type:"POST",
		            data:"id={{$pay_log['id']}}",
		            timeout:90000,
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            },
		            error: function (XMLHttpRequest, textStatus, errorThrown) {
		                longPolling();
		            },
		            success: function (res) {
		                if(res.code==200){
		                	window.location.replace(res.data);
		                }
		                // longPolling();
		            }
		        });
		    })();
		},500);
	</script>
@endsection