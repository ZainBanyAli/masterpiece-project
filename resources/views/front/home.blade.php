@extends('front.layout.master')
@section('main_content')
        <div class="slider">
            <div class="slide-carousel owl-carousel">
             {{-- dynamic slider using foreach (photo,heading,text,button) --}}

             @foreach($sliders as $slider)
             <div class="item" style="background-image:url({{ asset('uploads/'.$slider->photo) }});">
                 <div class="bg"></div>
                 <div class="text">
                     <div class="container">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="text-wrapper">
                                     <div class="text-content">
                                        <h2 style="font-size: 3rem; font-weight: 800; color: #FFFFFF; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7); ">
                                            {{ $slider->heading }}
                                        </h2>
                                         <p>
                                             {!! $slider->text !!}
                                         </p>
                                         @if($slider->button_text!='')
                                         <div class="button-style-1 mt_20">
                                            <a href="{{ route('destinations') }}" target="_blank">{{ $slider->button_text }}</a>
                                         </div>
                                         @endif
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             @endforeach
         </div>
     </div>
    </div>


{{-- welcomeItem section --}}
        @if($welcome_item->status == 'Show')
        <div class="special pt_70 pb_70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="left-side">
                                        <div class="inner">
                                            <h3>{{ $welcome_item->heading }}</h3>
                                            {!! $welcome_item->description !!}
                                            @if($welcome_item->button_text != '')
                                            <div class="button-style-1 mt_20">
                                                <a href="{{ $welcome_item->button_link }}">{{ $welcome_item->button_text }}</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="right-side" style="background-image: url({{ asset('uploads/'.$welcome_item->photo) }});">
                                        <a class="video-button" href="https://www.youtube.com/watch?v={{ $welcome_item->video }}"><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif


        <div class="destination pt_70 pb_70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Popular Destinations</h2>
                            <p>
                                Explore our most popular travel destinations around the world
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($destinations as $destination)
                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_25">
                            <div class="photo">
                                <a href="{{ route('destination',$destination->slug) }}"><img src="{{ asset('uploads/'.$destination->featured_photo) }}" alt=""></a>
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('destination',$destination->slug) }}">{{ $destination->name }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="see-more">
                            <div class="button-style-1 mt_20">
                                <a href="{{ route('destinations') }}">View All Destinations</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


{{-- Features section --}}
        <div class="why-choose pt_70">
            <div class="container">
                <div class="row">


                    <div class="why-choose pt_70">
                        <div class="container">
                            <div class="row">
                                @foreach($features as $feature)
                                <div class="col-md-4">
                                    <div class="inner pb_70">
                                        <div class="icon">
                                            <i class="{{ $feature->icon }}"></i>
                                        </div>
                                        <div class="text">
                                            <h2>{{ $feature->heading }}</h2>
                                            <p>
                                                {!! $feature->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>







<div class="package pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="heading">
                    <h2>Travel packages</h2>
                    <p>
                        Explore our most Travel packages around the world
                    </p>
                </div>
            </div>
            @foreach($packages as $item)
            <div class="col-lg-4 col-md-6">
                <div class="item pb_25">
                    <div class="photo">
                        <a href="{{ route('package',$item->slug) }}"><img src="{{ asset('uploads/'.$item->featured_photo) }}" alt=""></a>
                        <div class="wishlist">
                            <a href="{{ route('wishlist',$item->id) }}"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="text">
                        <div class="price">
                            ${{ $item->price }} @if($item->old_price != '')<del>${{ $item->old_price }}</del>@endif
                        </div>
                        <h2>
                            <a href="{{ route('package',$item->slug) }}">{{ $item->name }}</a>
                        </h2>

                        @if($item->total_score || $item->total_rating)
                        <div class="review">
                            @php
                            $rating = $item->total_score/$item->total_rating;
                            @endphp
                            @for($i=1; $i<=5; $i++)
                                @if($i <= $rating)
                                    <i class="fas fa-star"></i>
                                @elseif($i-0.5 <= $rating)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                            ({{ $item->reviews->count() }} Reviews)
                        </div>
                        @else
                        <div class="review">
                            @for($i=1; $i<=5; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                            ({{ $item->reviews->count() }} Reviews)
                        </div>
                        @endif
                        <div class="element">
                            <div class="element-left">
                                <i class="fas fa-plane-departure"></i> {{ $item->destination->name }}
                            </div>
                            <div class="element-right">
                                <i class="fas fa-th-large"></i> {{ $item->package_amenities->count() }} Amenities
                            </div>
                        </div>
                        <div class="element">
                            <div class="element-left">
                                <i class="fas fa-users"></i> {{ $item->tours->count() }} Tours
                            </div>
                            <div class="element-right">
                                <i class="fas fa-clock"></i> {{ $item->package_itineraries->count() }} Days
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="see-more">
                    <div class="button-style-1 mt_20">
                        <a href="{{ route('packages') }}">View All Packages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




{{--testimonials section  --}}
        <div class="testimonial pt_70 pb_70 "  style="background-image: url(uploads/testimonial-bg.jpg)">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main-header">Client Testimonials</h2>
                        <h3 class="sub-header">
                            See what our clients have to say about their experience with us
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-carousel owl-carousel">

                            @foreach($testimonials as $testimonial)
                            <div class="item">
                                <div class="photo">
                                    <img src="{{ asset('uploads/'.$testimonial->photo) }}" alt="" />
                                </div>
                                <div class="text">
                                    <h4>{{ $testimonial->name }}</h4>
                                    <p>{{ $testimonial->designation }}</p>
                                </div>
                                <div class="quote">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="description">
                                    <p>
                                        {!! $testimonial->comment !!}
                                    </p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>


{{--posts section  --}}

        <div class="blog pt_70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Latest News</h2>
                            <p>
                                Check out the latest news and updates from our blog post
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="item pb_70">
                            <div class="photo">
                                <img src="{{ asset('uploads/'.$post->photo) }}" alt="">
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a>
                                </h2>
                                <div class="short-des">
                                    <p>
                                        {!! $post->short_description !!}
                                    </p>
                                </div>
                                <div class="button-style-2 mt_20">
                                    <a href="{{ route('post',$post->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>



@endsection