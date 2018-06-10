@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    <div class="layout">
        {!!$info['content']!!}
    </div>
@endsection
@section('script')
    @parent
@endsection