
<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.dashboard')}}</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start  ">
    <a href="{{url('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">زيارة الواجهة</span>
        <span class="selected"></span>
    </a>
</li>


<li class=" {{active_link('users','active open')}}">
    <a href="javascript:;" class="sidebar-nav-menu {{active_link('users','active open')}} ">
        <i class="fa fa-users"></i>
        <span class="title">{{ trans('admin.users') }}</span>
        <span class="selected"></span>
        <span class="arrow {{ active_link('users','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('users','block')}}">
        <li class=" {{active_link('News','active open')}}  ">
            <a href="{{aurl('users')}}?status=active" class="nav-link ">
                <i class="fa fa-users"></i>
                <span class="title">{{ trans('admin.users') }}
                </span>
                <span class="selected"></span>
            </a>
        </li>

        <li class="">
            <a href="{{ aurl('users/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>



<li class="nav-item start {{active_link('reservation','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-hospital-o"></i>
        <span class="title">{{trans('admin.reservation')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('reservation','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('reservation','active open')}}  ">
            <a href="{{aurl('reservation')}}" class="nav-link ">
                <i class="fa fa-hospital-o"></i>
                <span class="title">{{trans('admin.reservation')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('reservation/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>






<li class="nav-item start  {{ (request()->route()->getName() == 'item.index') ? 'active open' :  'fwefwe' }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-sitemap"></i>
        <span class="title">{{trans('admin.item')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('item','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('item','active open')}}  ">
            <a href="{{aurl('item')}}" class="nav-link ">
                <i class="fa fa-sitemap"></i>
                <span class="title">{{trans('admin.item')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('item/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<!-- <li class="nav-item start {{active_link('imageitem','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-photo"></i>
        <span class="title">{{trans('admin.imageitem')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('imageitem','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('imageitem','active open')}}  ">
            <a href="{{aurl('imageitem')}}" class="nav-link ">
                <i class="fa fa-photo"></i>
                <span class="title">{{trans('admin.imageitem')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('imageitem/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li> -->
<li class="nav-item start {{active_link('bank','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-dollar"></i>
        <span class="title">{{trans('admin.bank')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('bank','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('bank','active open')}}  ">
            <a href="{{aurl('bank')}}" class="nav-link ">
                <i class="fa fa-dollar"></i>
                <span class="title">{{trans('admin.bank')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('bank/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item start {{ (request()->route()->getName() == 'itemtype.index') ? 'active open' :  'fwefwe' }} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-cubes"></i>
        <span class="title">{{trans('admin.itemtype')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('itemtype','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('itemtype','active open')}}  ">
            <a href="{{aurl('itemtype')}}" class="nav-link ">
                <i class="fa fa-cubes"></i>
                <span class="title">{{trans('admin.itemtype')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('itemtype/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>

<li class="{{ active_link('admin.*','active open') }}">
<a href="javascript:;" class="sidebar-nav-menu {{active_link('admin','active open')}}">
<i class="fa fa-user"></i>
<span class="title">المشرفين </span>
<span class="selected"></span>
<span class="arrow {{active_link('admin','open')}}"></span>
</a>
<ul class="sub-menu" style="{{active_link('','block')}}">
<li class=" {{active_link('admin','active open')}}  ">
    <a href="{{aurl('admin')}}" class="nav-link ">
        <i class="fa fa-user"></i>
        <span class="title">المشرفين  </span>
        <span class="selected"></span>
    </a>
</li>

<li class="">
    <a href="{{ aurl('admin/create') }}" class="nav-link ">
        <i class="fa fa-plus"></i>
        <span class="title"> {{trans('admin.create')}}  </span>
        <span class="selected"></span>
    </a>
</li>
</ul>
</li>

<li class="nav-item start  {{ active_link('area','active open') }}">
    <a href="javascript:;" class="sidebar-nav-menu {{ active_link('area','active open')}} ">
        <i class="fa fa-globe"></i>
        <span class="title">{{ trans('admin.area') }}</span>
        <span class="selected"></span>
        <span class="arrow {{active_link('area','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('area','block')}}">
        <li class=" {{active_link('area','active open')}}  ">
            <a href="{{aurl('area')}}" class="nav-link ">
                <i class="fa fa-globe"></i>
                <span class="title">{{ trans('admin.area') }}
                </span>
                <span class="selected"></span>
            </a>
        </li>

        <li class="">
            <a href="{{ aurl('area/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}} </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item start   {{ active_link('city','active open') }}">
    <a href="javascript:;" class="sidebar-nav-menu {{active_link('city','active open')}} ">
        <i class="fa fa-calendar"></i>
        <span class="title">{{ trans('admin.city') }}</span>
        <span class="selected"></span>
        <span class="arrow {{ active_link('city','open') }}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('city','block')}}">
        <li class=" {{active_link('city','active open')}}  ">
            <a href="{{aurl('city')}}" class="nav-link ">
                <i class="fa fa-calendar"></i>
                <span class="title">{{ trans('admin.city') }}
                </span>
                <span class="selected"></span>
            </a>
        </li>

        <li class="">
            <a href="{{ aurl('city/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}} </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="{{ active_link('pages','active open') }}">
<a href="javascript:;" class="sidebar-nav-menu {{active_link('pages','active open')}}">
<i class="fa fa-file-text"></i>
<span class="title">{{trans('admin.pages')}} </span>
<span class="selected"></span>
<span class="arrow {{active_link('pages','open')}}"></span>
</a>
<ul class="sub-menu" style="{{active_link('','block')}}">
<li class=" {{active_link('pages','active open')}}  ">
    <a href="{{aurl('pages')}}" class="nav-link ">
        <i class="fa fa-file-text"></i>
        <span class="title">{{trans('admin.pages')}}  </span>
        <span class="selected"></span>
    </a>
</li>


<li class="{{ active_link('pages','active open') }}">
    <a href="{{ aurl('pages/create') }}" class="nav-link ">
        <i class="fa fa-plus"></i>
        <span class="title"> {{trans('admin.create')}}  </span>
        <span class="selected"></span>
    </a>
</li>
</ul>
</li>


<li class="{{ active_link('links','active open') }}">
<a href="javascript:;" class="sidebar-nav-menu {{active_link('links','active open')}}">
<i class="fa fa-link"></i>
<span class="title">{{trans('admin.links')}} </span>
<span class="selected"></span>
<span class="arrow {{active_link('links','open')}}"></span>
</a>
<ul class="sub-menu" style="{{active_link('','block')}}">
<li class=" {{active_link('links','active open')}}  ">
    <a href="{{aurl('links')}}" class="nav-link ">
        <i class="fa fa-link"></i>
        <span class="title">{{trans('admin.links')}}  </span>
        <span class="selected"></span>
    </a>
</li>
<li class="">
    <a href="{{ aurl('links/create') }}" class="nav-link ">
        <i class="fa fa-plus"></i>
        <span class="title"> {{trans('admin.create')}}  </span>
        <span class="selected"></span>
    </a>
</li>
</ul>
</li>



<li class="{{active_link('socials','active open')}}">
<a href="javascript:;" class="sidebar-nav-menu {{active_link('socials','active open')}}">
<i class="fa fa-lightbulb-o"></i>
<span class="title">{{trans('admin.socials')}} </span>
<span class="selected"></span>
<span class="arrow {{active_link('socials','open')}}"></span>
</a>
<ul class="sub-menu" style="{{active_link('','block')}}">
<li class="  {{active_link('socials','active open')}}  ">
    <a href="{{aurl('socials')}}" class="nav-link ">
        <i class="fa fa-lightbulb-o"></i>
        <span class="title">{{trans('admin.socials')}}  </span>
        <span class="selected"></span>
    </a>
</li>
<li class="">
    <a href="{{ aurl('socials/create') }}" class="nav-link ">
        <i class="fa fa-plus"></i>
        <span class="title"> {{trans('admin.create')}}  </span>
        <span class="selected"></span>
    </a>
</li>
</ul>

<li class="nav-item start {{active_link('contactus','active open')}}  ">
    <a href="{{aurl('contactus')}}" class="nav-link nav-toggle">
        <i class="fa fa-cog"></i>
        <span class="title">{{trans('admin.contactus')}}</span>
        <span class="selected"></span>
    </a>
</li>


<li class="nav-item start {{active_link('settings','active open')}}  ">
    <a href="{{aurl('settings')}}" class="nav-link nav-toggle">
        <i class="fa fa-cog"></i>
        <span class="title">{{trans('admin.settings')}}</span>
        <span class="selected"></span>
    </a>
</li>
