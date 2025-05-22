<x-basecomponent>
    <div class="container-fluid p-0 bg-app-bgnd bg-gradient min-vh-100 d-flex flex-column">

        <!-- Logo + App Name -->
        <x-logocomponent />

        <!-- Search bar -->
        <div class="px-4 pt-2">
            <form action="" method="GET">
                <input type="text" class="form-control rounded-pill shadow-sm px-3 bg-white" name="search"
                    placeholder="Search">

            </form>
        </div>

        <!-- Municipalities Grid -->
        <div class="container-fluid px-4 py-3">
            @for ($i = 0; $i < count($attractions); $i += 2)

                <div class="d-flex mb-3 gap-3 justify-content-center">
                    @php $item = $attractions[$i]; @endphp
                    <div class="card card-body px-1" style="width: 48%" onclick="location.href='{{ route('view_attraction', ['id' => $item->id]) }}'">
                        <p class="fs-6 text-center mb-0 text-primary">{{$item->attraction_name}}</p>
                        <p class="fw-light text-center fs-10">{{$item->attraction_name}}</p>
                        <img src="{{ asset("storage/uploads/attractions/$item->attraction_name/img/$item->img") }}"
                            class="rounded-3 shadow-sm w-100 px-3" style="aspect-ratio: 1 / 1; object-fit: cover;">
                    </div>
                    @php $item2 = $attractions[$i + 1] ?? null; @endphp
                    @if ($item2)
                        <div class="card card-body px-1" style="width: 48%" onclick="location.href='{{ route('view_attraction', ['id' => $item2->id]) }}'">
                            <p class="fs-6 text-center mb-0 text-primary">{{$item2->attraction_name}}</p>
                            <p class="fw-light text-center fs-10">{{$item2->attraction_name}}</p>
                            <img src="{{ asset("storage/uploads/attractions/$item2->attraction_name/img/$item2->img") }}"
                                class="rounded-3 shadow-sm w-100 px-3" style="aspect-ratio: 1 / 1; object-fit: cover;">
                        </div>
                    @endif



                </div>
            @endfor


        </div>

    </div>
</x-basecomponent>
  