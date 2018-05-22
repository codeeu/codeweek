@extends('layout.base')

@section('content')

    @include('include.map')

    <!-- Popular Listing Section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="heading">
                        <h2>Top & Popular <span>Listings</span></h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="listing-shot grid-style">
                        <a href="#">
                            <div class="listing-shot-img">
                                <img src="http://via.placeholder.com/800x800" class="img-responsive" alt="">
                                <span class="like-listing"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="listing-shot-caption">
                                <h4>Art & Design</h4>
                                <p class="listing-location">Bishop Avenue, New York</p>
                            </div>
                        </a>
                        <div class="listing-shot-info">
                            <div class="row extra">
                                <div class="col-md-12">
                                    <div class="listing-detail-info">
                                        <span><i class="fa fa-phone" aria-hidden="true"></i> 807-502-5867</span>
                                        <span><i class="fa fa-globe" aria-hidden="true"></i> www.mysitelink.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listing-shot-info rating">
                            <div class="row extra">
                                <div class="col-md-7 col-sm-7 col-xs-6">
                                    <i class="color fa fa-star" aria-hidden="true"></i>
                                    <i class="color fa fa-star" aria-hidden="true"></i>
                                    <i class="color fa fa-star" aria-hidden="true"></i>
                                    <i class="color fa fa-star-half-o" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-6 pull-right">
                                    <a href="#" class="detail-link">Open Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="listing-shot grid-style">
                        <a href="#">
                            <div class="listing-shot-img">
                                <img src="http://via.placeholder.com/800x800" class="img-responsive" alt="">
                                <span class="like-listing"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="listing-shot-caption">
                                <h4>Education</h4>
                                <p class="listing-location">Bishop Avenue, New York</p>
                            </div>
                        </a>
                        <div class="listing-shot-info">
                            <div class="row extra">
                                <div class="col-md-12">
                                    <div class="listing-detail-info">
                                        <span><i class="fa fa-phone" aria-hidden="true"></i> 807-502-5867</span>
                                        <span><i class="fa fa-globe" aria-hidden="true"></i> www.mysitelink.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listing-shot-info rating">
                            <div class="row extra">
                                <div class="col-md-7 col-sm-7 col-xs-6">
                                    <i class="color fa fa-star" aria-hidden="true"></i>
                                    <i class="color fa fa-star" aria-hidden="true"></i>
                                    <i class="color fa fa-star" aria-hidden="true"></i>
                                    <i class="color fa fa-star-half-o" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-6 pull-right">
                                    <a href="#" class="detail-link">Open Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="listing-shot grid-style">
                        <a href="#">
                            <div class="listing-shot-img">
                                <img src="http://via.placeholder.com/800x800" class="img-responsive" alt="">
                                <span class="like-listing"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="listing-shot-caption">
                                <h4>Documentary</h4>
                                <p class="listing-location">Bishop Avenue, New York</p>
                            </div>
                        </a>
                        <div class="listing-shot-info">
                            <div class="row extra">
                                <div class="col-md-12">
                                    <div class="listing-detail-info">
                                        <span><i class="fa fa-phone" aria-hidden="true"></i> 807-502-5867</span>
                                        <span><i class="fa fa-globe" aria-hidden="true"></i> www.mysitelink.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listing-shot-info rating">
                            <div class="row extra">
                                <div class="col-md-7 col-sm-7 col-xs-6">
                                    <i class="color fa fa-star" aria-hidden="true"></i>
                                    <i class="color fa fa-star" aria-hidden="true"></i>
                                    <i class="color fa fa-star" aria-hidden="true"></i>
                                    <i class="color fa fa-star-half-o" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-6 pull-right">
                                    <a href="#" class="detail-link">Open Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Popular Listing Section -->
@endsection