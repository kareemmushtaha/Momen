@extends('website.layouts.front')
@section('title')
<title> {{ setting()->sitename_ar }} | {{ auth()->user()->name }}</title>
<meta property="og:title" content="{{ auth()->user()->name }} |  {{ setting()->sitename_ar }} ">

@endsection

@section('content')

<nav aria-label="breadcrumb" id="breadcrumb">
    <div class="container">
        <div class="breadcrumb_all">
            <h3>{{ auth()->user()->name }}</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ auth()->user()->name }}</li>
            </ol>
        </div>


    </div>
</nav>
<!--====================================================================
							Start Content Home ppage
	=====================================================================-->
    <!--  -->
<div class="single_project mt-100 mb-30">

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 owner">
                <div class="card profile_card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="top_photo">
                            <img src="{{ avatar() }}" class="rounded" alt="...">
                        </div>
                        <div class="data_user text-center">
                            <h5>{{ auth()->user()->name }}</h5>
                            <p>{{ auth()->user()->job }}</p>
                        </div>
                        <div class="wsam">
                            <img src="{{ wsam(auth()->user()->points)  }}" alt="" srcset="">
                        </div>
                        <div class="count">
                            <ul>
                                <li>
                                    مشروع خيرى
                                    <p>{{ count_project(auth()->user()->id) }}</p>
                                </li>
                                <li>
                                    نقاط
                                    <p> {{ auth()->user()->points }}</p>
                                </li>
                            </ul>
                        </div>
                        <!-- <i class="fas fa-compact-disc"></i> -->

                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-12">
                <div class="number_project">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card text-left">
                                <div class="card-body text-right">

                                    <h3 class="card-title">تعديل البيانات</h3>
                                    <form action="{{ route('update_date') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                <!-- <label>صور المستخدم</label> -->
                                                    <div class="img_div" style="max-width: 200px;padding: 10px;margin: auto;">
                                                        <img id="blah" src="{{ avatar() }}" alt="your image" class="rounded mx-auto d-block"  style="min-width: 100px; height: 100px;border-radius: 50% !important;display:block" />
                                                        <br />
                                                        <br />
                                                        <br />
                                                        <input type='file' id="imgInp"  name="photo" style="margin-top: 25px;" />
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                <label>اسم المستخدم</label>
                                                <input type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ auth()->user()->name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                <label>رقم الهاتف</label>
                                                <input type="text" class="form-control" name="phone" placeholder="رقم الهاتف" value="{{ auth()->user()->phone }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                <label>الوظيفة</label>
                                                <input type="text" class="form-control" name="job" placeholder="الوظيفة" value="{{ auth()->user()->job }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                <label> البريد الالكترونى </label>
                                                <input type="text" class="form-control" name="email" placeholder=" البريد الالكترونى " value="{{ auth()->user()->email }}">
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                <label>كلمة المرور الجديدة</label>
                                                <input type="text" class="form-control" name="password" placeholder="كلمة المرور الجديدة" >
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                <div class="form-group">
                                                <label>المهارات</label>
                                                <select class="select2 form-control"  name="Skills[]" multiple="multiple">
                                                    @foreach(App\Model\SubCategory::get() as $item)
                                                    <option value="{{ $item->id}}"
                                                        @if( in_array($item->id , $skills ) )  {{ "selected" }} @esle   {{ "" }}  @endif  >
                                                        {{ $item->SubCategory_name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                <label>نبذة</label>
                                                <textarea name="Abstract" id="" >
                                                    {{ auth()->user()->Abstract }}
                                                </textarea>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <hr >
                                            <input class="btn btn-info" type="submit" value="حفظ">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!--====================================================================
					End Content Home ppage
    =====================================================================-->

    <style>
.select2-container--default .select2-selection--multiple .select2-selection__choice{
    background-color: #28a745 !important;
    border: none
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    margin-right: 10px;
    color: #fffafa;
}
.single_project .number_project ul li {
    margin-right: 0;
    font-weight: bold;
    padding: 0;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 0;
    color: #fff;
    font-size: 12px;
    display: inline-block;
    margin-bottom: 0;
}
.select2-container .select2-selection--multiple {
    height: auto !important;
}
</style>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
@endsection
