@extends('website.layouts.front')
@section('title')
<title> {{ setting()->sitename_ar }} | الموقع قيد الصيانة</title>
<meta property="og:title" content=" الموقع قيد الصيانة |  {{ setting()->sitename_ar }} ">


@endsection

@section('content')

<div class="termsPAge py-5">
            <div class="container">
                <div class="termshead d-flex align-items-center justify-content-between no-border mb-4">
                    <h2>الموقع قيد الصيانة
                    </h2>
                     
                </div>
                <div class="row">
                  
                    <div class="col-12  ">
                        <div class="termsContSections">
                            <div class="termsText pt-0">
                            {!! setting()->system_message !!}

                            </div>
                      
                      
                        </div>
                    </div>
                </div>


            </div>
        </div>
@endsection
