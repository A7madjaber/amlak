<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript" src="{{asset('front/js/responsive-nav.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/jquery.flexslider.js')}}"></script>

@stack('js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"></script>

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
