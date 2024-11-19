@extends('website.layouts.front')
@section('title')
<title> {{ setting()->sitename_ar }} | {{ $page->title }}</title>
<meta property="og:title" content="{{ $page->title }} |  {{ setting()->sitename_ar }} ">


@endsection

@section('content')
<div class="termsPAge py-5">
            <div class="container">
                <div class="termshead d-flex align-items-center justify-content-between no-border mb-4">
                    <h2>{{ $page->title }}
                    </h2>
                     
                </div>
                <div class="row">
                  
                    <div class="col-12  ">
                        <div class="termsContSections">
                            <div class="termsText pt-0">
                            {!! $page->content !!}

                            </div>
                      
                      
                        </div>
                    </div>
                </div>


            </div>
        </div>
@endsection
