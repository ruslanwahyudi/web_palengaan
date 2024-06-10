@extends('../../index')
@section('content')
<!-- Carousel Start -->
<!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Dokumen Perencanaan</h2>
                        </div>
                        <div class="col-12">
                            <a href="">Beranda</a>
                            <a href="">Data Perencanaan</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Portfolio Start -->
            <div class="portfolio">
                <div class="container">
                    <!-- <div class="section-header text-center">
                        <p>Our Projects</p>
                        <h2>Visit Our Projects</h2>
                    </div> -->
                    <div class="row">
                        <div class="col-12">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">Semua</li>
                                <li data-filter=".first">2024</li>
                                <li data-filter=".second">2023</li>
                                <li data-filter=".third">2022</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row portfolio-container">
                        @foreach($sakip as $itemsakip)
                            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                                <div class="portfolio-warp">
                                    <div class="portfolio-img">
                                        <img height="300" src="{{ asset('uploads/admin_images/sakip/') }}/{{ $itemsakip->image }}" alt="Image">
                                        <div class="portfolio-overlay">
                                            <p>
                                                {{$itemsakip->deskripsi}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="portfolio-text">
                                        <h3>{{$itemsakip->title}}</h3>
                                        <i class="fa fa-telegram" aria-hidden="true"></i>
                                        <a class="btn" href="{{$itemsakip->link_download}}" target="_blank" ><i class="fa fa-download fa-xs" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                    <div class="row">
                        <div class="col-12 load-more">
                            <a class="btn" href="#">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio End -->
@endsection