<x-basecomponent>
<x-pagecomponent asset='{{ asset("storage/uploads/attractions/$attraction->attraction_name/bg_img/$attraction->bg_img") }}' nextLink="{{ route('municipalities') }}" buttonText="Return Home">
    
    <div class="d-flex flex-row justify-content-start align-items-center">
        <img src="{{ asset("storage/uploads/attractions/$attraction->attraction_name/img/$attraction->img") }}" alt="" style="width: 100%; height: 100%;">
    </div>

    <div class="fw-bold fs-5 justify-content-center my-3">
        <h5 class="my-2 fw-bold fs-5 text-center ">Reserved</h5>
        <h5 class="my-2 fw-bold fs-5 text-center ">Successfully!</h5>
    </div>

</x-pagecomponent>
</x-basecomponent>