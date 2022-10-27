<div class="flash-error">
    <b>There are some errors in your submission:</b>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</div>
