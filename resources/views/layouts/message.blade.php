
@if(session('message'))
    <div class="alert alert-info text-center">
        {{ session('message') }}
    </div>
@elseif(session('error-message'))
    <div class="alert alert-danger text-center">
        {{ session('error-message') }}
    </div>
@elseif(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@elseif($errors->any())
    <div class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
