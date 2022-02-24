@if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        <i class="fa fa-times-circle"></i>
        {{ $errors->first() }}
    </div>
@endif
