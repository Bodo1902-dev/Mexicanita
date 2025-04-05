{{--  @if($errors->any())
    @foreach ( $errors->all() as $e)
        <div class="alert alert-danger">
            {{$e}}
        </div>
    @endforeach
@endif  --}}
<div class="text-danger">
<p><em>{{$message}}</em></p>

</div>
