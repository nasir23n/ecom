@extends('frontend.layouts.app')

@section('content')

@include('frontend.user.inc.panel_top', ['head' => 'Dashboard header'])
@include('frontend.user.inc.panel_bottom')

@endsection