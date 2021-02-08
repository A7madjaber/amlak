@if ($errors->any())


    <div class="card p-0"  >
        <div class="card-header text-danger font-weight-bold">
            <strong>X</strong> يوجد خطأ

        </div>
        <div class="card-body text-danger"style="background-color: #d212124a">
            @foreach ($errors->all() as $error)
            <strong>  {{ $error }} </strong> <br>
            @endforeach
        </div>
    </div>


@endif
