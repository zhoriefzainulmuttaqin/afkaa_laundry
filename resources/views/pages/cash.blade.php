@extends('navigation.sidebar')
@section('container')
    <div class="card card-frame">
        <div class="card-body">
            <form method="post" action="{{ route('add-to-cart') }}">
                @csrf
                <h4 class="mb-3">Cash Payment</h4>
                <div class="d-flex p-0 mt-4 justify-content-between">
                    <div class="dropdown">
                        <table>
                            <th class="col-5">Date</th>
                            <th class=""> <span class="" id="selectedSantri">
                                    <input class="form-control" type="date" value="0" id="example-number-input"
                                        name="qty" min="0">
                                </span></th>
                        </table>
                        <table class="mt-3">
                            <th class="col-5">No</th>
                            <th class=""> <span class="" id="selectedSantri">
                                    <input class="form-control" type="number" value="0" id="example-number-input"
                                        name="qty" min="0">
                                </span></th>
                        </table>
                        <table class="mt-3">
                            <th class="col-5">Name</th>
                            <th class=""> <span class="" id="selectedSantri">
                                    <input class="form-control" type="number" value="0" id="example-number-input"
                                        name="qty" min="0">
                                </span></th>
                        </table>
                        <table class="mt-3">
                            <th class="col-5">Total Cash</th>
                            <th class=""> <span class="" id="selectedSantri">
                                    <input class="form-control" type="number" value="0" id="example-number-input"
                                        name="qty" min="0">
                                </span></th>
                        </table>
                        <table class="mt-3">
                            <th class="col-5">Grand Total</th>
                            <th class=""> <span class="ms-3" id="selectedSantri">
                                    10000
                                </span></th>
                        </table>
                        <table class="mt-3">
                            <th class="col-5">Change</th>
                            <th class=""> <span class="ms-5" id="selectedSantri">
                                    10000
                                </span></th>
                        </table>
                    </div>
                    {{-- <div class="me-10">
                        <span class="" id="selectedSantri">
                            <input class="form-control" type="number" value="0" id="example-number-input"
                                name="qty" min="0">
                        </span>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
@endsection
