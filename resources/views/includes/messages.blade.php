@if (session('error'))
<div class="alert bg-danger" style="color:white"
    role="alert">
    {{ session('error') }} <a href="#"
        class="pull-right"><em
            class="fa fa-lg fa-close"></em></a></div>
@endif

@if (session('success'))
<div class="alert bg-success"
    style="color:white" role="alert">
    {{ session('success') }} <a href="#"
        class="pull-right"><em
            class="fa fa-lg fa-close"></em></a></div>
@endif
