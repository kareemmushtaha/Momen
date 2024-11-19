@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat dashboard-stat-v2 blue">
            <div class="visual"><i class="fa fa-group"></i></div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                        data-value="{{ App\User::get()->count() }}">{{ App\User::get()->count() }}</span>
                </div>
                <div class="desc">المستخدمين </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat dashboard-stat-v2 red">
            <div class="visual"><i class="fa fa-shopping-cart"></i></div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ App\Model\Reservation::get()->count() }}">{{ App\Model\Reservation::get()->count() }}</span>
                </div>
                <div class="desc">الحجوزات</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat dashboard-stat-v2 green">
            <div class="visual"><i class="fa fa-cube"></i></div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ App\Model\Item::get()->count() }}">{{ App\Model\item::get()->count() }}</span>
                </div>
                <div class="desc">الشاليهات</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat dashboard-stat-v2 purple">
            <div class="visual"><i class="fa fa-bell"></i></div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ App\Model\ItemType::get()->count() }}">{{ App\Model\ItemType::get()->count() }}</span>
                </div>
                <div class="desc">انواع الشاليهات</div>
            </div>
        </div>
    </div>

</div>
@endsection
