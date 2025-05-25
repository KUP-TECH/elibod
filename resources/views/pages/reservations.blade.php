<x-pagecomponentpost asset='{{ asset("storage/uploads/attractions/$attraction->attraction_name/bg_img/$attraction->bg_img") }}' buttonText="Reserve" post_link="{{ route('add_reservation') }}">
    <a href="{{ url()->previous() }}" class="ms-2">
        <i class="bi bi-arrow-left-circle text-white bg-transparent opacity-75 fs-1"></i>
    </a>
    <h5 class="text-center mb-4 fw-bold">Reservation Request Form</h5>

    <input type="hidden" name="attraction_id" value="{{ $attraction->id }}">
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ $user->name }}" disabled>
    </div>

    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}">
    </div>

    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Mobile Number" name="no" value="{{ old('no') }}">
    </div>

    <div class="mb-3">
        <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ $user->email }}" disabled>
    </div>

    <div class="mb-3">
        <input type="date" class="form-control" placeholder="Arrival Date" name="arrival" value="{{ old('arrival') }}">
    </div>

    <div class="mb-3">
        <input type="time" class="form-control" placeholder="Arrival Time" name="time" value="{{ old('time') }}">
    </div>

    <div class="mb-3">
        <input type="time" class="form-control" placeholder="Check Out Time" name="t_checkout" value="{{ old('t_checkout') }}">
    </div>

    <div class="row">
        <div class="col-6 mb-3">
            <select class="form-select" name="adults">
                <option selected>Adults</option>
                <option value="1">1 Adult</option>
                <option value="2">2 Adults</option>
                <option value="3">3 Adults</option>
                <option value="4">4 Adults</option>
                <option value="5">5 Adults</option>
                <option value="6">6 Adults</option>
                <option value="7">7 Adults</option>
                <option value="8">8 Adults</option>
                <option value="9">9 Adults</option>
                <option value="10">10 Adults</option>
                <option value="11">10+</option>
            </select>
        </div>
        <div class="col-6 mb-3">
            <select class="form-select" name="kids">
                <option selected>Kids</option>
                <option value="0">No Kids</option>
                <option value="1">1 Kid</option>
                <option value="2">2 Kids</option>
                <option value="3">3+ Kids</option>
            </select>
        </div>
    </div>


</x-pagecomponentpost>