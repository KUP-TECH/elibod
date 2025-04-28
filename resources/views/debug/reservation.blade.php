<x-basecomponent>
    <x-pagecomponent asset='assets/Cantilan/Agila White Beach/IMG_2020.JPG' nextLink="#" buttonText="Reservation">
        
            <h5 class="text-center mb-4 fw-bold">Reservation Request Form</h5>

            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Full Name">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Address">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Mobile Number">
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email Address">
                </div>

                <div class="mb-3">
                    <input type="date" class="form-control" placeholder="Arrival Date">
                </div>

                <div class="mb-3">
                    <input type="time" class="form-control" placeholder="Arrival Time">
                </div>

                <div class="mb-3">
                    <input type="time" class="form-control" placeholder="Check Out Time">
                </div>

                <div class="row">
                    <div class="col-6 mb-3">
                        <select class="form-select">
                            <option selected>Adults</option>
                            <option value="1">1 Adult</option>
                            <option value="2">2 Adults</option>
                            <option value="3">3 Adults</option>
                            <option value="4">4+ Adults</option>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <select class="form-select">
                            <option selected>Kids</option>
                            <option value="0">No Kids</option>
                            <option value="1">1 Kid</option>
                            <option value="2">2 Kids</option>
                            <option value="3">3+ Kids</option>
                        </select>
                    </div>
                </div>
            </form>

    </x-pagecomponent>
</x-basecomponent>