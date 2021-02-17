@extends('frontend.layouts.app')
@section('content')
    <section class="body-wrapper  bg-off-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">Gallery</button>
                <p>{!! $description !!}</p>
            </div>
            <div class="row" id="gallery" data-toggle="modal" data-target="#gallerymodal">
                @foreach($images as $key => $image)
                    @php
                        $fact = (($key % 5) < 3) ? 4 : 6;
                    @endphp

                    <div class="col-md-{{$fact}} ">
                       
                        <img class="gallery-details-grid" src="{{$image->getImagePathAttribute()}}" data-target="#gallery-slide" data-slide-to="{{$key}}">
                    </div>
                @endforeach
            </div>

            <!-- Modal -->
            <div class="modal fade sci-slider-grid modal-gallery" id="gallerymodal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-body p-0">
                    <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div id="gallery-slide" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <?php $active="active";?>
                        @foreach($images as $key => $image)

                         <div class="carousel-item {{$active}}">
                          <img class="d-block w-100" src="{{$image->getImagePathAttribute()}}" alt="First slide">
                        </div>
                        <?php $active='';?>
                        @endforeach
                       
                      </div>
                      <a class="carousel-control-prev" href="#gallery-slide" role="button" data-slide="prev">
                        <i class="fas fa-angle-left"></i>
                      </a>
                      <a class="carousel-control-next" href="#gallery-slide" role="button" data-slide="next">
                       <i class="fas fa-angle-right"></i>
                      </a>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>

        </div>
    </section>
@endsection