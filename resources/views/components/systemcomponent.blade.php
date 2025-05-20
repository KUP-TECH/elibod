<div class="card">
    <div class="card-header">
        <h5 class="card-title my-2 mb-3">System Settings</h5>
        <ul class="nav nav-tabs">
            @foreach(config('tabs') as $key => $value)
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route($value)}}">{{$key}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    
</div>
