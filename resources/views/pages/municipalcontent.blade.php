<x-basecomponent>
    <x-pagecomponent asset='{{ asset("storage/uploads/municipality/$m->name/bg/$m->bg_img") }}' nextLink="{{ route('attractions', ['id' => $m->id]) }}" buttonText="Tourist Destination">
        <x-municipalcomponent municipal='{{$m->name}}'></x-municipalcomponent>

        <div class="row"> 
            <div class="col h-100 w-50">    
                <img src="{{ asset("storage/uploads/municipality/$m->name/map/$m->map_img") }}" alt="" width="100%" height="100%">
            </div>
            <div class="col h-100 w-50">
                <p class="text-justify fs-7 text-dark lh-1"> 
                    {{ $m->description }}
                </p>
            </div>
        </div>

        <p class="fw-bold fs-5 mb-2">Festivals</p>
        @foreach ($festivals as $f)
            <p class="text-justify fs-7 my-1">* {{$f->fest_name}} Festival - {{$f->description}}</p>
        @endforeach

    </x-pagecomponent>
</x-basecomponent>