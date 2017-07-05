@if(count($errors))
    <div class="form-group">
        @foreach($errors->all() as $error)
            <div class="alert alert-error">
                {{$error}}
            </div>
        @endforeach
    </div>
@endif