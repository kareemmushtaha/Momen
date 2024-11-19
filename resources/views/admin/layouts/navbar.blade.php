<!-- BEGIN HEADER -->


<div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
          <!-- BEGIN LOGO -->
          <div class="page-logo">
            <a href="index.html">
              <!-- <img src="{{ url('storage/app/public/'.setting()->logo) }}" alt="logo"  style="margin: 8px; -->
    <!-- width: 100px;" class="logo-default"> -->
            </a>
            <div class="menu-toggler sidebar-toggler"><span></span></div>
          </div>
          <!-- END LOGO -->
          <!-- BEGIN RESPONSIVE MENU TOGGLER -->
          <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"><span></span></a>
          <!-- END RESPONSIVE MENU TOGGLER -->
          <!-- BEGIN TOP NAVIGATION MENU -->
          <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

              <!-- END INBOX DROPDOWN -->
              <!-- BEGIN USER LOGIN DROPDOWN -->
              <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
              <li class="dropdown dropdown-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                  <img alt="" class="img-circle" src="{{ it()->url(auth('admin')->user()->photo_profile) }}">
                  <span class="username username-hide-on-mobile">{{ auth('admin')->user()->name}}</span>
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                  <li>
                    <a href="{{ aurl("account") }}"><i class="icon-user"></i> الملف الشخصي</a>
                  </li>
                  <!-- <li>
                    <a href="app_inbox.html"><i class="icon-envelope-open"></i> البريد <span class="badge badge-danger"> 3 </span></a>
                  </li> -->
                  <li class="divider"></li>
                  <li><a href="{{ url("admin/logout") }}"><i class="icon-key"></i> تسجيل الخروج</a></li>
                </ul>
              </li>
              <!-- END USER LOGIN DROPDOWN -->
            </ul>
          </div>
          <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
      </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
<!-- BEGIN SIDEBAR -->
<div class="clearfix"></div>
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">


    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
