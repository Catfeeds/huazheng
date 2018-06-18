@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    @if(!empty($cate_info['img']))
    <div class="banner" style="background-image: url({{asset($cate_info['img'])}}); height: 482px;"></div>
    @endif
    @foreach($cate_list as $v)
        @include('home.layouts.index2-box',['index2_box'=>$v])
    @endforeach
    @include('home.layouts.fhns-bottom')
@endsection
@section('script')
    @parent
@endsection