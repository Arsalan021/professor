@extends('front.layout.layout')
@section('content')
     <section class="sectionbody1">
        <div class="container">
            <div class="row align-items-center" id="">
                <div class="col-lg-7" id="sectionbodyrespidcol1" data-aos="fade-down" data-aos-duration="3000">
                    <p>{{ $home->title??null }}</p>
                    <h1>{{ $home->name??null }}</h1>
                    <span>{!! $home->body??null !!}</span>
                    <br>
                    <br>
                    <button>Read More</button>


                </div>
                @php
                    $home_image = $home->image??null;
                @endphp

                <div class="col-lg-5" id="sectionbodyrespidcol2">
                    <img src='{{ asset("documents/home_section/$home_image") }}' alt="" class="img-fluid">
                </div>
            </div>
            <div class="row" data-aos="fade-up-left" data-aos-duration="3000">
                <div class="col-md-12 text-center" id="mousetext">
                    <img src="{{ asset('front/assets/img/mouse.png') }}" alt="" id="mousetext"><br>
                    <span>Arrow Down</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="dvline">
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <img src="{{ asset('front/assets/img/cirle111.png') }}" alt="" class="img-fluid circleimg">

    </section>

    <section class="section2">

        <div class="container">
            <div class="row align-items-center row22" id="section22222row">

                 @php
                    $about_image = $about->image??null;
                @endphp

                <div class="col-xl-6" id="colimgess">
                    <img src='{{ asset("documents/about_section/$about_image") }}' alt="" class="img-fluid">
                </div>

                <div class="col-xl-6 p-5" id="colcontennt" data-aos="flip-left" data-aos-duration="3000">
                    <br>
                    <p>About us</p>
                    <h2>{{ $about->title??null }}</h2>
                    <h1>{{ $about->name??null }}</h1>
                   <span>{!! $about->body??null !!}</span>
                    <br>
                    <br>
                    <button>Read More</button>

                </div>
            </div>
        </div>
        <img src="{{ asset('front/assets/img/leftcircle.png') }}" alt="" class="img-fluid leftcircle">
    </section>

    <section class="section3">
        <img src="{{ asset('front/assets/img/redingbookcircle.png') }}" alt="" class="img-fluid circleimgrightimg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7" data-aos="fade-up" data-aos-duration="3000">
                    <p>{{ $section->title??null }}</p>
                    <h1>{{ $section->name??null }}</h1>
                    <span>{!! $section->body??null !!}</span>
                    <br>
                    <button class="mt-4">Read More</button>

                </div>

                <div class="col-md-5" data-aos="zoom-in-down" data-aos-duration="3000">
                    @php
                    $section2_image = $section->image??null;
                @endphp
                    <img src='{{ asset("documents/section2/$section2_image") }}' alt="" class="img-fluid">
                </div>
            </div>
        </div>

    </section>

    <section class="section5">
        <div class="container">

            <div class="row text-center pt-5" id="section4dvid">
                <div class="col-md-12 text-center" data-aos="zoom-out" data-aos-duration="3000">
                    <p>Risar</p>
                </div>
                <div class="col-md-12" data-aos="zoom-out" data-aos-duration="3000">
                    <h2>Our Blog</h2>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6" id="ullidev" data-aos="flip-left" data-aos-duration="3000">
                    @if (isset($blog[0]->body))
                    {!! $blog[0]->body??null !!}
                    @endif
                </div>

                <div class="col-lg-6 text-white" data-aos="flip-right" data-aos-duration="3000">
                    <div class="ourbloggs_right_col">
                         @if (isset($blog[1]->body))
                        {!! $blog[1]->body??null !!}
                          @endif
                    </div>
                </div>
            </div>
        </div>
        F
        <img src="{{ asset('front/assets/img/leftrec.png') }}" alt="" class="img-fluid leftrec">
    </section>

    <section class="section6 pt-5">

        <div class="row">
            <div class="col-md-12 text-center mt-4" data-aos="zoom-in-up"data-aos-duration="3000">
                <button style="float:center">Read More</button>
            </div>
        </div>
        </div>


    </section>

    <section class="section7 mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6" id="writer-imagee" data-aos="zoom-in-up">
                    <img src="{{ asset('front/assets/img/last-img.png') }}" alt="" class="">
                </div>
                <div class="col-xl-6" id="writer-content" data-aos="zoom-out-down">
                    <p>Writer</p>
                    <h1>{{ $home->name??null }}</h1>
                    <div class="title">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                    data-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Writter</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                    data-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Professor</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                    data-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Human</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="readmore">
                                    {{-- writter --}}
                                    {!! $writter->body??null !!}

                                    <a class="btn" href="{{ route('web.write') }}">Read More</a>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                {{-- professor --}}
                                {!! $professor->body??null !!}


                                <br>
                                <a class="btn"  href="{{ route('web.professor') }}">Read More</a>
                                <br>
                                <br>
                                <br>
                                <br>

                            </div>

                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                 {{-- Human --}}
                                 {!! $human->body??null !!}
                                <br>
                                <a class="btn" href="{{ route('web.human') }}">Read More</a>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </section>
@endsection
