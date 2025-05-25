<x-basecomponent>
    <x-pagecomponent asset='{{ asset("storage/uploads/attractions/$a->attraction_name/bg_img/$a->bg_img") }}' nextLink="{{ route('reservations', ['id' => $a->id]) }}" buttonText="Reserve">
        <p class="fw-bold fs-6 m-0">{{ $a->attraction_name }}</p>
        <p class="fw-bold fs-6 mt-1">About</p>
        <p class="fs-6">{{ $a->about }}</p>
        <p class="fw-bold fs-6 mt-1">Image</p>

        <div class="container-fluid overflow-scroll d-flex flex-row mb-2">
            @foreach ($img as $i)
                <div class="p-0 mx-1">
                    <img src="{{ asset("storage/uploads/attractions/$i->attractions_id/extra/$i->img") }}" class="rounded-4"
                        style="width: calc(100vw * 0.24); height: calc(100vw * 0.24);">
                </div>
            @endforeach
           
           
        </div>
        <div class="p-0 mx-1 mt-3 mb-1 rounded-3">
            <img src="{{ asset("storage/uploads/attractions/$a->attraction_name/img/$a->img") }}" class="rounded-4 align-items-center" style="width: 100%; height: calc(100vh * 0.2);">
        </div>
        
        
    </x-pagecomponent>
</x-basecomponent>