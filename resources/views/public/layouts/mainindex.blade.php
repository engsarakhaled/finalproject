<!-- head Start -->
@include('public.includes.head_index')
 <!-- head End -->
<body id="top">
<main>
<!-- Nav Start -->
@include('public.includes.nav_index') 
<!-- Nav End -->
<!--Sections Start -->
@yield('sections')
<!--Sections End -->
</main>
<!--Footer Start -->
@include('public.includes.footerforall')
<!--Footer End -->
<!--Js Start -->
@include('public.includes.js_index')
 <!--Js End -->
