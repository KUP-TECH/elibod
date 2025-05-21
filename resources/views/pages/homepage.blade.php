<x-basecomponent>
  <div class="container-fluid p-0 bg-app-bgnd bg-gradient min-vh-100 d-flex flex-column">

    <!-- Logo + App Name -->
    <x-logocomponent />

    <!-- Search bar -->
    <div class="px-4 pt-2">
      <form action="" method="GET">
        <input type="text" class="form-control rounded-pill shadow-sm px-3 bg-white" name="search" placeholder="Search">
        
      </form>
    </div>

    <!-- Municipalities Grid -->
    <div class="container-fluid px-4 py-3">
      @for ($i = 0; $i < count($municipalities); $i += 2)
        <div class="d-flex mb-3 gap-3 justify-content-center">
          @php $item1 = $municipalities[$i]; @endphp
          <div class="text-center" style="width: 48%;">
            <a href="#" class="text-decoration-none">
              <img src="{{ asset('storage/uploads/municipality/' . $item1->name . '/img/' . $item1->img) }}" 
                  class="rounded-3 shadow-sm w-100" 
                  style="aspect-ratio: 1 / 1; object-fit: cover;">
              <div class="fw-medium text-dark mt-1 small">{{ $item1->name }}</div>
            </a>
          </div>

          @php $item2 = $municipalities[$i + 1] ?? null; @endphp
          @if ($item2)
          <div class="text-center" style="width: 48%;">
            <a href="#" class="text-decoration-none">
              <img src="{{ asset('storage/uploads/municipality/' . $item2->name . '/img/' . $item2->img) }}" 
                  class="rounded-3 shadow-sm w-100" 
                  style="aspect-ratio: 1 / 1; object-fit: cover;">
              <div class="fw-medium text-dark mt-1 small">{{ $item2->name }}</div>
            </a>
          </div>
          @else
          <div style="width: 48%;"></div>
          @endif
        </div>
      @endfor

    </div>

  </div>
</x-basecomponent>
