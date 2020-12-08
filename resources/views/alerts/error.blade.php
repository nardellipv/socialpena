@if (count($errors) > 0)
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h6 class="alert-heading">Por favor revise los siguientes errores</h6>
        <p class="mb-0">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
        </p>
    </div>
@endif
