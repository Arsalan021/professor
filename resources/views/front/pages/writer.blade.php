@extends('front.layout.layout')

@section('content')
    <section id="line">
        <div class="container">
            <div class="line">
                <hr>
            </div>

        </div>
    </section>


    <section class="section7 mt-5">
        <div class="container-fluid">
            <div class="row">
                 @php
                    $image = $data->image??null
                @endphp
                <div class="col-xl-6" id="writer-imagee" data-aos="flip-up"data-aos-duration="3000">
                    <img src='{{ asset("documents/writter_section/$image") }}' alt="" class="">
                </div>

                <div class="col-lg-6 p-5" id="writer-content" data-aos="flip-left" data-aos-duration="3000">



                    <p>Writer</p>
                    <h1>{{$data->name??null}}</h1>
                    <div class="title">
                        <br>
                        <span>{!! $data->body??null !!}
                        </span>
                        <br>
                        <br>
                        @if (isset($data))
                        <button>Read More</button>
                        @endif
                        <br>
                        <br>

                    </div>


                </div>


            </div>
        </div>
        <img src="{{ asset('front/assets/img/recccctangle.png') }}" alt="" class="img-fluid recccctangle">
    </section>

    <section class="section10">
        <div class="container mt-5">
              {!! $data->add_info??null !!}
        </div>

        <img src="{{ asset('front/assets/img/rightsidetoprec.png') }}" alt="" class="img-fluid rightsidetoprec">
        <img src="{{ asset('front/assets/img/leftsiderectangle.png') }}" alt="" class="img-fluid leftsiderectangle">
        <img src="{{ asset('front/assets/img/rightsidebottomrec.png') }}" alt="" class="img-fluid rightsidebottomrec">
    </section>
@endsection
