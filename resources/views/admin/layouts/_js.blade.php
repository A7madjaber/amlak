<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{asset('assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{asset('assets/js/eva-icons.min.js')}}"></script>
<!-- Sticky js -->

<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"></script>
<script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>



@stack('js')




<script src="{{asset('assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{asset('assets/plugins/side-menu/sidemenu.js')}}"></script>





<script>

    @if(Session::has('message'))

    var type="{{Session::get('alert-type','info')}}"

    switch(type) {
        case'info':
            toastr.options = {
                "debug": false,
                "positionClass": "toast-top-left",
            }
            toastr.info("{{Session::get('message')}}");
            break;

        case'success':
            toastr.options = {
                "debug": false,
                "positionClass": "toast-top-left",
            }
            toastr.success("{{Session::get('message')}}");
            break;


        case'warning':
            toastr.options = {
                "debug": false,
                "positionClass": "toast-top-left",
            }
            toastr.warning("{{Session::get('message')}}");
            break;

        case'error':
            toastr.options = {
                "debug": false,
                "positionClass": "toast-top-left",
            }
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif




</script>




<script>

    $(document).on("click", "#markReadAll", function(e){



        var route =  $(this).attr('data-route');

                    $.ajax({

                        url: route,
                        type: "get",
                        dataType: "JSON",
                        success : function(data)
                        {
                            swal({

                                text: data.message,
                                icon: "success",
                                buttons:  "موافق",
                            });

                        },
                        error :function(data) {
                       swal({
                           text: 'لايوجد اشعارات',
                           icon: "info",
                           buttons:  "موافق",
                       })
                   }
                    })
    });
</script>





