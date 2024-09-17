@extends('public.layouts.mainindex') 
@push('pagetitle')
Index
@endpush
                                  <!--Sections Start -->
@section('sections')                                  
<!--SearchSection Start -->
@include('public.includes.search_section') 
<!-- SearchSection End -->
<!--FeaturedTopic Start -->
@include('public.includes.featured_topics_section')
<!--FeaturedTopic End -->
<!--BrowseTopic Start -->
@include('public.includes.browse_topics_section') 
<!--BrowseTopic End -->
<!--HowSection Start -->
@include('public.includes.how_section')  
<!--HowSection End -->
<!--AskedSection Start -->
@include('public.includes.asked_section')
<!--Testimonials Start -->
@include('public.includes.testimonials_section') 
<!--Testimonials End -->
<!--GetTouch Start -->
@include('public.includes.get_touch_section') 
<!--GetTouch End -->
@endsection
                                    
                                         <!--Sections End -->
  