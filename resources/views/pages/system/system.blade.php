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
       
        
        <button class="btn btn-primary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <td>Municipality Name</td>
                    <td>Icon</td>
                    <td>Image</td>
                    <td>BG</td>
                    <td>Map</td>
                    <td>Desc</td>
                    <td></td>
                    <td></td>
                </tr>
                
            </thead>
            <tbody>
                @foreach($municipality as $key => $v)
                    <tr>
                        <td>{{ $v->name }}</td>
                        <td><img src="{{ asset('storage/uploads/municipality/') . '/' . $v->name .'/icon/' . $v->icon }}" alt="" style="width: 50px; height: 50px;"></td>
                        <td><img src="{{ asset('storage/uploads/municipality/') . '/' . $v->name .'/img/' . $v->img }}" alt="" style="width: 50px; height: 50px;"></td>
                        <td><img src="{{ asset('storage/uploads/municipality/') . '/' . $v->name . '/bg/' . $v->bg_img }}" alt="" style="width: 50px; height: 50px;"></td>
                        <td><img src="{{ asset('storage/uploads/municipality/') . '/' . $v->name .'/map/' . $v->map_img }}" alt="" style="width: 50px; height: 50px;"></td>
                        <td>{{ $v->description }}</td>
                        <td><a href="{{ route('delete_municipality', ['id' => $v->id]) }}"><i class="bi bi-x fs-1"></i></a></td>
                        <td><a href="{{ route('system_municipality', ['id' => $v->id]) }}"><i class="bi bi-pencil-square fs-1"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </x-systemcomponent>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Municipality</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route( 'add_municipality')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" name="municipality" placeholder="Surigao">
                        </div>
                        <label for="" class="form-label">Icon</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="icon">
                        </div>
                        <label for="" class="form-label">Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="img">
                        </div>
                        <label for="" class="form-label">BG Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="bg">
                        </div>
                        <label for="" class="form-label">Map Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="map">
                        </div>
                        <label for="" class="form-label">Description</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" rows="10" name="desc"></textarea>
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
        <div class="modal fade" id="edit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="{{ route( 'edit_municipality')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $edit->id }}">
                        <div class="modal-body">
                            <div class="input-group my-3">
                                <input type="text" class="form-control" name="municipality" value="{{ $edit->name }}">
                            </div>
                            <label for="" class="form-label">Icon</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="icon" value="{{ $edit->icon }}">
                            </div>
                            <label for="" class="form-label">Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="img" value="{{ $edit->img }}">
                            </div>
                            <label for="" class="form-label">BG Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="bg" value="{{ $edit->bg_img }}">
                            </div>
                            <label for="" class="form-label">Map Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="map" value="{{ $edit->map_img }}">
                            </div>
                            <label for="" class="form-label">Description</label>
                            <div class="input-group">
                                <textarea type="text" class="form-control" rows="10" name="desc">{{ $edit->description }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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