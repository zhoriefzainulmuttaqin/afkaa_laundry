@extends('navigation.sidebar')
@section('container')
    {{-- Select by Kilogram --}}
    <div class="card card-frame">
        <div class="card-body">
            <form method="post" action="{{ route('add-to-cart') }}">
                @csrf
                <h4 class="mb-3">Fill Data by Kilogram</h4>
                <div class="form-group d-flex" style="height: 40px;">
                    <input class="form-control" type="number" value="0" id="example-number-input" name="qty" min="0">
                    <input type="hidden" name="id_item" value="6" id="id_item_6">
                    <div class="d-flex">
                        <button type="button" class="btn btn-dark bg-gradient-default d-grid ms-2"
                                style="height: 40px; text-align: center;" onclick="calculate()">check
                        </button>
                    </div>
                </div>
                <div>
                    <h6>Detail Payment</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <tr>
                        <span id="detail-payment">0 Kilogram</span>
                        <span id="price-per-kg" style="text-align: left;">x 4.500/kg</span>
                    </tr>
                    <tr>

                    </tr>
                    <tr class="ml-auto" style="text-align: left;">
                        <span id="sub-total">0</span>
                    </tr>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <tr>
                        <span>Total</span>
                    </tr>
                    <tr class="ml-auto" style="text-align: left;">
                        <span id="total">0</span>
                    </tr>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-dark btn-lg w-100">Add to Cart</button>
                </div>
            </form>
        </div>

    </div>
    {{-- End Select by Kilogram --}}

    {{-- Select by Items --}}
    <div class="card card-frame mt-4">
        <div class="card-body">
            <h4 class="mb-3">Fill Data by Items</h4>
            <div class="row">
                @foreach ($items as $item)
                    @if ($item->id_item != 6)
                        <div class="col-md-3 mt-4">
                            <div class="card">
                                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <a href="javascript:;" class="d-block">
                                        <img src="{{ asset('img/' . $item->foto) }}" class="img-fluid border-radius-lg"
                                            style="height: 200px; width: 300px;">
                                    </a>
                                </div>

                                <div class="card-body pt-2">
                                    <h5 href="javascript:;" class="card-title d-block text-darker">
                                        {{ $item->nama }}
                                    </h5>
                                    <p class="card-description mb-3">
                                        Rp. {{ $item->harga }}
                                    </p>
                                    <form method="post" action="{{ route('add-to-cart') }}">
                                        @csrf
                                        <input type="hidden" name="id_item" value="{{ $item->id_item }}">
                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="qty" name="qty"
                                                aria-label="qty" placeholder="Total" min="0">
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="subtotal" name="subtotal"
                                                aria-label="subtotal" placeholder="Subtotal" min="0" hidden>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-dark w-100">Add to Cart</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- End Select by Items --}}
@endsection

<script>
    function calculate() {
        var kg = document.getElementById("example-number-input").value;
        var pricePerKg = 4500;
        var detailPayment = document.getElementById("detail-payment");
        var subTotal = document.getElementById("sub-total");
        var total = document.getElementById("total");

        detailPayment.innerHTML = kg + " Kilogram";
        subTotal.innerHTML = "Rp " + (kg * pricePerKg);
        total.innerHTML = "Rp " + (kg * pricePerKg);
    }
</script>
