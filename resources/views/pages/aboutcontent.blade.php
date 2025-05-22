<x-basecomponent>
    <x-pagecomponent asset='assets/Cantilan/agila white Beach/IMG_1312.JPG' nextLink="#" buttonText="Reserve">
        <p class="fw-bold fs-6 m-0">{{ $a->attraction_name }}</p>
        <p class="fw-bold fs-6 mt-1">About</p>
        <p class="fs-6">{{ $a->about }}</p>
        <p class="fw-bold fs-6 mt-1">Image</p>

        <div class="container-fluid overflow-scroll d-flex flex-row mb-2">
            <div class="p-0 mx-1">
                <img src="{{ asset('assets/Cantilan/Agila White Beach/IMG_1314.JPG') }}" class="rounded-4" style="width: calc(100vw * 0.24); height: calc(100vw * 0.24);">
            </div>
            <div class="p-0 mx-1">
                <img src="{{ asset('assets/Cantilan/Agila White Beach/IMG_1315.JPG') }}" class="rounded-4" style="width: calc(100vw * 0.24); height: calc(100vw * 0.24);">
            </div>
            <div class="p-0 mx-1">
                <img src="{{ asset('assets/Cantilan/Sagmay Beach/IMG_1374.JPG') }}" class="rounded-4" style="width: calc(100vw * 0.24); height: calc(100vw * 0.24);">
            </div>
            <div class="p-0 mx-1">
                <img src="{{ asset('assets/Cantilan/Agila White Beach/IMG_1317.JPG') }}" class="rounded-4" style="width: calc(100vw * 0.24); height: calc(100vw * 0.24);">
            </div>
            <div class="p-0 mx-1">
                <img src="{{ asset('assets/Cantilan/Agila White Beach/IMG_1318.JPG') }}" class="rounded-4" style="width: calc(100vw * 0.24); height: calc(100vw * 0.24);">
            </div>
        </div>
        <div class="p-0 mx-1 mt-3 mb-1 rounded-3">
            <img src="{{ asset("storage/uploads/attractions/Kakupalan/map_img/Kakupalan.png") }}" class="rounded-4 align-items-center" style="width: 100%; height: calc(100vh * 0.2);">
        </div>
        
        
    </x-pagecomponent>
</x-basecomponent>