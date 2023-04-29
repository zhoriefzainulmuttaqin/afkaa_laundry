@extends('navigation.sidebar')
@section('container')
    <div class="card card-frame col-md-4 m-auto">
        <div class="card-body">
            <form method="post" action="{{ route('add-to-cart') }}">
                @csrf
                <h4 class="mb-3">Cash Payment</h4>
                <div class="d-flex p-0 mt-4 justify-content-between">
                    <div class="dropdown">
                        <div class="row mb-3">
                            <h6 class="col-5">Date</h6>
                            <div class="col">
                                <span class="date">
                                    <input class="form-control" type="date" value="0" id="example-number-input"
                                        name="qty" min="0">
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <h6 class="col-5">No Transaction</h6>
                            <div class="col">
                                <span class="noTransaction">
                                    <input class="form-control" type="number" value="0" id="example-number-input"
                                        name="qty" min="0">
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <h6 class="col-5">Name</h6>
                            <div class="col">
                                <span class="selectedSantri">
                                    <input class="form-control" type="text" id="example-number-input" name="qty"
                                        value="Nama Santri" readonly>
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <h6 class="col-5">Total Cash</h6>
                            <div class="col">
                                <span class="totalCash">
                                    <input class="form-control" type="number" value="0" id="example-number-input"
                                        name="qty" min="0">
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <h6 class="col-5">Total Price</h6>
                            <div class="col">
                                <span class="totalPrice">
                                    10000
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <h6 class="col-5">Change</h6>
                            <div class="col">
                                <span class="change">
                                    10000
                                </span>
                            </div>
                        </div>
                        <div class="author align-items-center">
                            <a href="/cart" class="w-50 me-2">
                                <button type="button" class="btn btn-outline-dark w-100">Back</button>
                            </a>
                            <a href="cart/cash" class="w-50">
                                <button type="button" class="btn btn-dark w-100">Print </button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
