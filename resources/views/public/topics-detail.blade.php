@extends('public.layouts.main') 
@push('pagetitle')
Topics-detail
@endpush
@section('head')
<!-- head Start -->
@include('public.includes.head_topics-detail')
<!-- head End -->
@endsection 

@section('headerandsection')  
 <!-- header Start -->  
@include('public.includes.header_topics-detail')
<!-- header End --> 
<!-- Section Start -->
@include('public.includes.topics-detail_section') 
<!-- Section End  -->
@endsection 



