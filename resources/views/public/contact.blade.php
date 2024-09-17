@extends('public.layouts.main') 
@push('pagetitle')
Contact
@endpush
@section('head')
<!-- head Start -->
@include('public.includes.head_contact')
 <!-- head End -->
@endsection 
@section('headerandsection')
<!-- header Start -->
@include('public.includes.header_contact')
<!-- header End --> 
<!-- Section Start   -->
@include('public.includes.contact_section') 
<!-- Section End   -->
@endsection 

