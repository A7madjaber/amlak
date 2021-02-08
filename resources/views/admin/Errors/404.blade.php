@extends('admin.layouts.master2',['title'=>'الصفحة غير موجودة'])
@push('css')
<!--- Internal Fontawesome css-->
<link href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!---Ionicons css-->
<link href="{{asset('assets/plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
<!---Internal Typicons css-->
<link href="{{asset('assets/plugins/typicons.font/typicons.css')}}" rel="stylesheet">
<!---Internal Feather css-->
<link href="{{asset('assets/plugins/feather/feather.css')}}" rel="stylesheet">
<!---Internal Falg-icons css-->
<link href="{{asset('assets/plugins/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
@endpush
@section('content')
		<!-- Main-error-wrapper -->
		<div class="main-error-wrapper  page page-h ">
			<img src="{{asset('assets/img/media/404.png')}}" class="error-page" alt="error">
			<h2>نعتذر. الصفحة التي تبحث عنها غير موجودة.</h2>
			<h6>ربما أخطأت في كتابة العنوان أو ربما تم نقل الصفحة.</h6><a class="btn btn-outline-danger" href="{{ route('home') }}">العودة الى الرئيسية</a>
		</div>
		<!-- /Main-error-wrapper -->
@endsection
