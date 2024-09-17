
<section class="section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Popular Topics</h3>
            </div>
            <div class="col-lg-8 col-12 mt-3 mx-auto">
                @foreach($paginatedTopics as $topic)
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="{{asset('assets/admin/images/topics/'.$topic->image)}}" class="custom-block-image img-fluid" alt={{$topic->topicsTitle}}"">

                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">{{$topic->topicsTitle}}</h5>

                                <p class="mb-0">{{Str::limit($topic['content'],50, $end='...')}}.</p>

                                <a href="{{route('topicsdetail',$topic->id)}}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                            </div>

                            <span class="badge bg-design rounded-pill ms-auto">{{ $topic->no_of_views }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="col-lg-12 col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mb-0">
                {{ $paginatedTopics->links() }}
                   </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

            
<section class="section-padding section-bg">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h3 class="mb-4">Trending Topics</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <a href="{{route('topicsdetail',$topic1->id)}}">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-2">{{$topic1->topicsTitle}}</h5>

                                <p class="mb-0">{{Str::limit($topic1['content'],20, $end='...')}}</p>
                            </div>
                            <span class="badge bg-finance rounded-pill ms-auto">{{$topic1->no_of_views}}</span>
                        </div>
                        <img src="{{asset('assets/admin/images/topics/'.$topic1->image)}}" class="custom-block-image img-fluid" alt="{{$topic1->topicsTitle}}">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-lg-3">
                <div class="custom-block custom-block-overlay">
                    <div class="d-flex flex-column h-100">
                        <img src="{{asset('assets/admin/images/topics/'.$topic2->image)}}" class="custom-block-image img-fluid" alt="{{$topic2->topicsTitle}}">

                        <div class="custom-block-overlay-text d-flex">
                            <div>
                                <h5 class="text-white mb-2">{{$topic2->topicsTitle}}</h5>

                                <p class="text-white">{{Str::limit($topic1['content'],20, $end='...')}}</p>

                                <a href="{{route('topicsdetail',$topic2->id)}}" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                            </div>

                            <span class="badge bg-finance rounded-pill ms-auto">{{$topic2->no_of_views}}</span>
                        </div>

                        <div class="social-share d-flex">
                            <p class="text-white me-4">Share:</p>

                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-pinterest"></a>
                                </li>
                            </ul>
                            <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                        </div>
                        <div class="section-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>