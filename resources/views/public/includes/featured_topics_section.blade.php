<section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">
        
            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <a href="{{route('topicsdetail',$topic1->id)}}">
                        <div class="d-flex">
                            <div> 
                                <h5 class="mb-2">{{ $topic1->topicsTitle }}</h5>

                                <p class="mb-0">{{Str::limit($topic1['content'],20, $end='...')}}.</p>
                            </div>

                            <span class="badge bg-design rounded-pill ms-auto">{{ $topic1->no_of_views }}</span>
                        </div>

                        <img src="{{asset('assets/admin/images/topics/'.$topic1->image)}}"
                            class="custom-block-image img-fluid" alt="{{ $topic1->topicsTitle }}">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-12">    
                <div class="custom-block custom-block-overlay">
                    <div class="d-flex flex-column h-100">
                        <img src="{{asset('assets/admin/images/topics/'.$topic2->image)}}"
                            class="custom-block-image img-fluid" alt="{{ $topic2->topicsTitle }}">
                        <div class="custom-block-overlay-text d-flex">
                            <div>
                                <h5 class="text-white mb-2">{{ $topic2->topicsTitle }}</h5>

                                <p class="text-white">{{Str::limit($topic2['content'],20, $end='...')}}.</p>

                                <a href="{{route('topicsdetail',$topic2->id)}}" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                            </div>

                            <span class="badge bg-finance rounded-pill ms-auto">{{ $topic2->no_of_views }}</span>
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