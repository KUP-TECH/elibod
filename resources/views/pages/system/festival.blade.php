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


        <button class="btn btn-primary text-white btn-sm" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">Add</button>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <td>Festival</td>
                    <td>Description</td>
                    <td>Municipality</td>
                    <td></td>
                </tr>

            </thead>
            <tbody>
                @foreach ($festival as $a)
                    <tr>
                        <td>{{ $a->fest_name }}</td>
                        <td>{{ $a->description }}</td>
                        <td>{{ $a->municipality->name }}</td>
                        <td>
                            <a href="{{ route('delete_festival', ['id' => $a->id]) }}">
                                <i class="bi bi-x fs-1"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </x-systemcomponent>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Attractions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('add_festival')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group my-3">
                            <select name="municipality" class="form-control">
                                @foreach ($municipality as $a)
                                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="" class="form-label">Festival Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="fest_name">
                        </div>
                        <label for="" class="form-label">Description</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="description">
                        </div>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-basecomponent>