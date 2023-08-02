<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png') }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('admin/icons/font-awesome/css/all.min.css'                          ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/morrisjs/morris.css'                                 ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/toast-master/css/jquery.toast.css'                   ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css'    ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/html5-editor/bootstrap-wysihtml5.css'                ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables.net-bs4/css/responsive.dataTables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css'   ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/dist/css/select2.min.css'                    ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/switchery/dist/switchery.min.css'                    ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-select/bootstrap-select.min.css'           ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'         ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-touchspin/bootstrap-touchspin.min.css'     ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/wizard/steps.css'                                    ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/multiselect/css/multi-select.css'                    ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2/dist/sweetalert2.min.css'                ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/dropify/dist/css/dropify.min.css'                    ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/multiselect/css/multi-select.css'                    ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/css/pages/user-card.css'                                     ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/Magnific-Popup-master/magnific-popup.css'            ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/css/style.css'                                               ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/css/pages/dashboard1.css'                                    ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/css/pages/widget-page.css'                                   ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/css/pages/widget-page.css'                                   ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/css/pages/widget-page.css'                                   ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css'       ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist-js/dist/chartist-init.css'                  ) }}"/>
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist-js/dist/chartist.min.css'                   ) }}"/>
</head>
<body class="skin-blue fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                @include('admin.layout.include.header')
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    @include('admin.layout.include.sidebar')
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    @yield('breadcrumb')
                </div>
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
				</div>
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title">Service Panel<span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            © 2021 Eliteadmin by themedesigner.in
            <a href="https://www.wrappixel.com/">WrapPixel</a>
        </footer>
    </div>
    
    <script src="{{ asset('admin/plugins/jquery/dist/jquery.min.js'                           ) }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/dist/js/bootstrap.bundle.min.js'           ) }}"></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js'                          ) }}"></script>
    <script src="{{ asset('admin/js/waves.js'                                                 ) }}"></script>
    <script src="{{ asset('admin/js/sidebarmenu.js'                                           ) }}"></script>
    <script src="{{ asset('admin/plugins/sticky-kit-master/dist/sticky-kit.min.js'            ) }}"></script>
    <script src="{{ asset('admin/plugins/jquery-sparkline/jquery.sparkline.min.js'            ) }}"></script>
    <script src="{{ asset('admin/plugins/switchery/dist/switchery.min.js'                     ) }}"></script>
    <script src="{{ asset('admin/plugins/select2/dist/js/select2.full.min.js'                 ) }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js'      ) }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-touchspin/bootstrap-touchspin.js'          ) }}"></script>
    <script src="{{ asset('admin/plugins/multiselect/js/jquery.multi-select.js'               ) }}"></script>
    <script src="{{ asset('admin/plugins/raphael/raphael-min.js'                              ) }}"></script>
    <script src="{{ asset('admin/plugins/morrisjs/morris.min.js'                              ) }}"></script>
    <script src="{{ asset('admin/plugins/toast-master/js/jquery.toast.js'                     ) }}"></script>
    <script src="{{ asset('admin/js/pages/validation.js'                                      ) }}"></script>
    <script src="{{ asset('admin/plugins/datatables.net/js/jquery.dataTables.min.js'          ) }}"></script>
    <script src="{{ asset('admin/plugins/datatables.net-bs4/js/dataTables.responsive.min.js'  ) }}"></script>
    <script src="{{ asset('admin/plugins/dff/dff.js'                                          ) }}"></script>
    <script src="{{ asset('admin/plugins/tinymce/tinymce.min.js'                              ) }}"></script>
    <script src="{{ asset('admin/plugins/wizard/jquery.steps.min.js'                          ) }}"></script>
    <script src="{{ asset('admin/plugins/wizard/jquery.validate.min.js'                       ) }}"></script>
    <script src="{{ asset('admin/plugins/sweetalert2/dist/sweetalert2.all.min.js'             ) }}"></script>
    <script src="{{ asset('admin/plugins/dropify/dist/js/dropify.min.js'                      ) }}"></script>
    <script src="{{ asset('admin/plugins/knob/jquery.knob.js'                                 ) }}"></script>
    <script src="{{ asset('admin/plugins/Magnific-Popup-master/jquery.magnific-popup.min.js'  ) }}"></script>
    <script src="{{ asset('admin/plugins/Magnific-Popup-master/jquery.magnific-popup-init.js' ) }}"></script>
    <script src="{{ asset('admin/plugins/chartist-js/dist/chartist.min.js'                    ) }}"></script>
    <script src="{{ asset('admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')  }}"></script>
    <script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js'                   ) }}"></script>
    <script src="{{ asset('admin/js/pages/widget-charts.js'                                   ) }}"></script>
    <script src="{{ asset('admin/plugins/flot/excanvas.js'                                    ) }}"></script>
    <script src="{{ asset('admin/plugins/flot/jquery.flot.js'                                 ) }}"></script>
    <script src="{{ asset('admin/plugins/flot/jquery.flot.time.js'                            ) }}"></script>
    <script src="{{ asset('admin/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js'          ) }}"></script>
    <script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js'          ) }}"></script>
    
    @yield('scripts')
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            $.toast({ 
                heading: 'Success',
                text: "{{Session::get('success')}}",
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 3500, 
                stack: 6
            });
        @endif
        @if(Session::has('warning'))
            $.toast({ 
                heading: 'Warning',
                text: "{{Session::get('warning')}}",
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'warning',
                hideAfter: 3500, 
                stack: 6
            });
        @endif
        @if(Session::has('info'))
            $.toast({ 
                heading: 'Info',
                text: "{{Session::get('info')}}",
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'info',
                hideAfter: 3500, 
                stack: 6
            });
        @endif
        @if(Session::has('error'))
            $.toast({ 
                heading: 'Error',
                text: "{{Session::get('error')}}",
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'error',
                hideAfter: 3500, 
                stack: 6
            });
        @endif
    </script>
</body>
</html>