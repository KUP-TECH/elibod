<x-basecomponent>

    <x-systemcomponent>
        @if (session('status'))
            <div class="alert {{session('status')['alert']}} alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status')['msg'] }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>There were some problems with your upload:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        
        <table class="table table-responsive">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Attraction</td>
                    <td>Location</td>
                    <td>Arrival</td>
                    <td>Time-In</td>
                    <td>Time-Out</td>
                    <td>Kids</td>
                    <td>Adults</td>
                </tr>

            </thead>
            <tbody>
                @foreach ($reservations as $r)
                    <tr>
                        <td>{{ $r->user->name }}</td>
                        <td>{{ $r->attraction->attraction_name }}</td>
                        <td>{{ $r->attraction->location }}</td>
                        <td>{{ $r->arrival }}</td>
                        <td>{{ $r->time }}</td>
                        <td>{{ $r->t_checkout }}</td>
                        <td>{{ $r->kids }}</td>
                        <td>{{ $r->adults }}</td>
                    </tr>                
                @endforeach
                
            </tbody>
        </table>


    </x-systemcomponent>


    
</x-basecomponent>