<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{app('l')}}" dir="{{app('dir')}}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>{{!empty($title)?$title:trans('admin.dashboard')}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fontlibrary.org/face/droid-arabic-kufi" rel="stylesheet" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap/css/bootstrap{{app('direction')}}.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch{{app('direction')}}.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->

        <link href="{{url('design/admin_panel')}}/assets/global/css/components{{app('direction')}}.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/css/plugins{{app('direction')}}.min.css" rel="stylesheet" type="text/css" />


        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=Almarai&display=swap" rel="stylesheet"> -->

        <script src="{{url('design/admin_panel')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END CORE PLUGINS -->

        <link href="{{ url("design/admin_panel/assets/global/plugins/datatables/datatables.min.css") }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{url("design/admin_panel")}}/assets/global/css/components-rtl.min.css">
        <link rel="stylesheet" href="{{url("design/admin_panel")}}/assets/global/css/plugins-rtl.min.css">
        <link href="{{ url("design/admin_panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css") }}" rel="stylesheet" type="text/css" />
        @if(app("l") != 'ar')
        <link href="{{ url("design/admin_panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css") }}" rel="stylesheet" type="text/css" />
        @endif
        <link href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" /> -->
        <style type="text/css">
            body{
                /* font-family: 'Tajawal', sans-serif !important; */
                /* font-family: 'Almarai', sans-serif!important; */
                font-family: "DroidArabicKufiRegular","Open Sans",sans-serif !important;

            }
            .table-responsive{
                padding-top:70px;
            }
            .form-control {
                border-radius: 4px !important;

            }
            .form .form-row-seperated .form-group {
                border: none !important
            }
        </style>
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout/css/themes/darkblue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('design/admin_panel')}}/assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/css/components-rounded-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('design/admin_panel')}}/assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        @stack('css')

    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
