@props(['asset', 'post_link', 'buttonText'])
<x-basecomponent>
    <div class="container-fluid p-0 bg-app-bgnd bg-gradient vh-100">
        <x-logocomponent> </x-logocomponent>


        <div class="container-fluid px-4 bg-app-bgnd bg-gradient">
            <div class="vh-100 rounded-4"
                style="background-image: url('{{ asset($asset) }}'); background-repeat: no-repeat; background-size: cover;">
                <div class="d-flex flex-column justify-content-between vh-100">

                    <a href="{{ url()->previous() }}" class="ms-2">
                        <i class="bi bi-arrow-left-circle text-white bg-transparent opacity-75 fs-1"></i>
                    </a>

                    <div class="container bg-white rounded-4 d-flex flex-column">
                        <a class="text-center" href="#collapseExample" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="38" fill="currentColor"
                                class="bi bi-dash-lg text-dark" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
                            </svg>
                        </a>
                        <form action="{{ $post_link }}" method="post">
                            @csrf
                            {{ $slot }}
                        
                            <div class="d-flex flex-row justify-content-center mb-2">
                                <button type="submit"
                                    class="btn btn-primary rounded-4 text-dark fw-bold text-nowrap">{{ $buttonText }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </x-basecomponent>