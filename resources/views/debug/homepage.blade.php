<x-basecomponent>

  <div class="container-fluid p-0 bg-app-bgnd bg-gradient vh-100">
    <x-logocomponent> </x-logocomponent>
  
    <div class="container-fluid px-4 py-2 ">
      <input type="text" class="form-control rounded-4" placeholder="Search">
    </div>

    <div class="container-fluid px-2 py-2">
    
      @for ($i = 0; $i < count(config('items')); $i+=2)
        
        <div class="d-flex flex-row align-items-center justify-content-evenly">
          @php
            $item = config('items')[$i];
          @endphp
          <div class="p-1">
            <a href="{{ url($item['route']) }}" class="text-decoration-none">
              <img src="{{ asset($item['img']) }}" class="rounded-2" style="width: calc(100vw * 0.40); height: calc(100vw * 0.40);">
              <h5 class="fw-bold text-dark fs-6">{{ $item['label'] }}</h5>
            </a>
          </div>
          @php
            
            $item = isset(config('items')[$i + 1]) ? config('items')[$i + 1] : null;

          @endphp
          
          <div class="p-1">
            @if($item != null) 
              <a href="{{ url($item['route']) }}" class="text-decoration-none" >
                <img src="{{ asset($item['img']) }}" class="rounded-2" style="width: calc(100vw * 0.40); height: calc(100vw * 0.40);">
                <h5 class="fw-bold text-dark fs-6">{{ $item['label'] }}</h5>
              </a>
            @endif
          </div>
        </div>
      @endfor
      
    </div>
  
  </div>


  

     

</x-basecomponent>
