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
                    <td>Attraction</td>
                    <td>Image</td>
                    <td></td>
                </tr>

            </thead>
            <tbody>
                @foreach ($attraction_img as $a)
                    <tr>
                        <td>{{ $a->attraction->attraction_name }}</td>
                        <td>{{ $a->img }}
                            <td>
                                @php $id = $a->attraction->id; @endphp
                                <img src="{{ asset("storage/uploads/attractions/$id/extra/$a->img") }}" alt=""
                                    style="width: 50px; height: 50px;">
                            </td>
                        </td>
                        <td>
                            <a href="{{ route('delete_img_attraction', ['id' => $a->id]) }}">
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
                <form action="{{ route('add_img_attraction')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group my-3">
                            <select name="attraction" class="form-control">
                                @foreach ($attractions as $a)
                                    <option value="{{ $a->id }}">{{ $a->attraction_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <label for="" class="form-label">Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="img">
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