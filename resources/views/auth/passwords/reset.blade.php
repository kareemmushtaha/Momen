@extends('website.layouts.front')

@section('content')

<nav aria-label="breadcrumb" id="breadcrumb">
    <div class="container">
        <div class="breadcrumb_all">
            <h3>كلمة مرور جديدة</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">كلمة مرور جديدة</li>
            </ol>
        </div>


    </div>
</nav>
<!--====================================================================
							Start Content Home ppage
	=====================================================================-->
    <!--  -->
<div class="header_freelancer mt-100 mb-30">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="login text-center">
                    <h5 class="card-title">كلمة مرور جديدة</h5>
                    <form method="POST" action="{{ route('password.update') }}"  style="padding: 20px 0;">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}" />
                        <div class="col-md-12" style="margin: 15px auto 0 auto;">
                            <div class="form-group">
                                <label class="label-control text-right" for="">البريد الالكترونى</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12" style="margin: 15px auto 0 auto;">
                            <div class="form-group">
                                <label class="label-control text-right" for="">كلمة المرور</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12" style="margin: 15px auto 0 auto;">
                            <div class="form-group">
                                <label class="label-control text-right" for="">تاكيد كلمة المرور </label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin: 15px auto 0 auto;">

                            <div class="form-group">
                                <button type="submit" class="login-btn"><i class="fas fa-sign-in-alt"></i> تغير كلمة المرور</button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

<!--====================================================================
					End Content Home ppage
    =====================================================================-->
@endsection
