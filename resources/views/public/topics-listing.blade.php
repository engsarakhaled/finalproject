@extends('public.layouts.main') 
@push('pagetitle')
topic-listing
@endpush
@section('head')
<!-- head Start -->
@include('public.includes.head_topics-listing')
<!-- head End -->
@endsection 

@section('headerandsection')     
<!-- header Start -->
@include('public.includes.header_topics-listing')
<!-- header End -->
<!-- Section Start   -->
@include('public.includes.topics-listing_section') 
<!-- Section End   -->
@endsection 






    