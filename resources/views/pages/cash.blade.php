@extends('navigation.sidebar')
@section('container')
    <div class="card card-frame">
        <div class="card-body">
            <form method="post" action="{{ route('add-to-cart') }}">
                @csrf
                <h4 class="mb-3">Cash Payment</h4>
                <div class="d-flex p-0 mt-4 justify-content-between">
                    <div class="dropdown ms-4">
                        <button class="btn bg-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Select Santri
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                            style="max-height: 200px; overflow-y: auto;">
                            <li><a class="dropdown-item" href="#">
                                    uu
                            </li>
                        </ul>
                    </div>
                    <div>
                        <span class="ms-4 me-4" id="selectedSantri">
                            Santri Selected
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
