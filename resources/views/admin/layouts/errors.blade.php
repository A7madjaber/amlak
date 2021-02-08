@if ($errors->any())


    <div class="card bd-0 mg-b-20 bg-danger-transparent alert p-0">
        <div class="card-header text-danger font-weight-bold">
            <i class="far fa-times-circle"></i> يوجد خطأ
            <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
        </div>
        <div class="card-body text-danger">
            @foreach ($errors->all() as $error)
            <strong>  {{ $error }} </strong> <br>
            @endforeach
        </div>
    </div>


@endif
