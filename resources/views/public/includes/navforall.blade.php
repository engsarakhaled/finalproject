<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <i class="bi-back"></i>
            <span>Topic</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item{{ Request::routeIs('index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>

                <li class="nav-item{{ Request::routeIs('topicslisting') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('topicslisting')}}">Topics Listing</a>
                </li>

                <li class="nav-item{{ Request::routeIs('contact') ? 'active' : '' }}">  
                    <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                </li>

                <li class="nav-item{{ Request::routeIs('testimonials') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('testimonials')}}">Our Client Says</a>
                </li>
            </ul>

            <div class="d-none d-lg-block">
                <a href="{{route('register')}}" class="navbar-icon bi-person smoothscroll"></a>
            </div>
        </div>
    </div>
</nav>
