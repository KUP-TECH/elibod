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
                    <td>Municipality</td>
                    <td>Attraction</td>
                    <td>Location</td>
                    <td>About</td>
                    <td>Image</td>
                    <td>BG</td>
                    <td>Map</td>
                    <td></td>
                    <td></td>
                </tr>

            </thead>
            <tbody>
                @foreach ($attractions as $a)
                    <tr>
                        <td>{{ $a->municipality->name }}</td>
                        <td>{{ $a->attraction_name }}</td>
                        <td>{{ $a->location }}</td>
                        <td>{{ $a->about }}</td>
                        <td>
                            <img src="{{ asset('storage/uploads/attractions/') . '/' . $a->attraction_name . '/img/' . $a->img }}" 
                                style="width: 50px; height: 50px;">
                        </td>
                        <td>
                            <img src="{{ asset('storage/uploads/attractions/') . '/' . $a->attraction_name . '/bg_img/' . $a->bg_img }}" 
                                style="width: 50px; height: 50px;">
                        </td>
                        <td>
                            <img src="{{ asset('storage/uploads/attractions/') . '/' . $a->attraction_name . '/map_img/' . $a->map_img }}"
                                style="width: 50px; height: 50px;">
                        </td>
                        <td>
                            <td><a href="{{ route('delete_attraction', ['id' => $a->id]) }}"><i class="bi bi-x fs-1"></i></a></td>
                        </td>
                        <td>
                            <td><a href="{{ route('system_attractions', ['id' => $a->id]) }}"><i class="bi bi-pencil-square fs-1"></i></a></td>
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
                <form action="{{ route('add_attraction')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group my-3">
                            <select name="municipality" class="form-control">
                                @foreach ($municipality as $a)
                                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="" class="form-label">Attraction Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="attraction_name">
                        </div>
                        <label for="" class="form-label">Location</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="location">
                        </div>
                        <label for="" class="form-label">About</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="about">
                        </div>
                        <label for="" class="form-label">Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="img">
                        </div>
                        <label for="" class="form-label">BG Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="bg_img">
                        </div>
                        <label for="" class="form-label">Map Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="map_img">
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

    @if (isset($edit))
        <div class="modal fade" id="edit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Modal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('edit_attraction') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$edit->id}}">
                        <div class="modal-body">
                            <div class="input-group my-3">
                                <select name="municipality" class="form-control">
                                    @foreach ($municipality as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="" class="form-label">Attraction Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="attraction_name" value="{{ $edit->attraction_name }}">
                            </div>
                            <label for="" class="form-label">Location</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="location" value="{{ $edit->location }}">
                            </div>
                            <label for="" class="form-label">About</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="about" value="{{ $edit->about }}">
                            </div>
                            <label for="" class="form-label">Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="img" value="{{ $edit->img }}">
                            </div>
                            <label for="" class="form-label">BG Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="bg_img" value="{{ $edit->bg_img }}">
                            </div>
                            <label for="" class="form-label">Map Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="map_img">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var myModal = new bootstrap.Modal(document.getElementById('edit_modal'), {
                    keyboard: false
                });
                myModal.show();
            });
        </script>
    @endif
</x-basecomponent>