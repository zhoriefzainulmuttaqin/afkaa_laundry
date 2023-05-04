@extends('navigation.sidebar')
@section('container')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-frame">
                <div class="card-body">
                    <h2>Total Items in Cart</h2>
                    <div class="col-md-12 mt-4">
                        @foreach ($items as $item)
                            @if ($item->id_item != 6)
                                <div class="card d-flex flex-column mt-3">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="card-header p-0 ms-3 mt-3 position-relative z-index-1">
                                                <a href="javascript:;" class="d-block">
                                                    <img src="{{ asset('img/' . $item->transaction->foto) }}"
                                                        class="img-fluid border-radius-lg" style="height:160px;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body pt-3">
                                                <h6 class="card-title h5 d-block text-darker d-flex">
                                                    {{ $item->transaction->nama }}
                                                    <a href="{{ route('delete-cart', $item->id_cart) }}"
                                                        class="ms-auto text-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </h6>
                                                <h6 class="card-description">
                                                    Rp.{{ $item->transaction->harga }}
                                                </h6>
                                                <hr class="horizontal dark">
                                                <h6 class="card-title h5 d-block text-darker">
                                                    <h6>{{ $item->qty }} Items x Rp.{{ $item->transaction->harga }}</h6>
                                                </h6>
                                                <h6 class="card-description">
                                                    Rp. {{ $item->subtotal }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-frame">
                <div class="card-body">
                    <h2>Detail Cart Transaction</h2>
                    {{-- <form method="POST" action="/history">
                        @csrf --}}
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <h5 class="mt-3 ms-4">Kilogram</h5>
                            <div class="d-flex p-0  justify-content-between">
                                <tr>
                                    <span class="ms-4 mb-3">
                                        {{ $kgCount }} Kilogram
                                    </span>
                                </tr>
                                <tr>
                                    <span class="me-4 mb-3">
                                        Rp.{{ $kgTotalPrice }}
                                    </span>
                                </tr>
                            </div>
                            <h5 class="mt-3 ms-4">Items</h5>
                            <div class="d-flex p-0 justify-content-between">
                                <tr>
                                    <span class="ms-4 mb-3">
                                        {{ $itemCount }} Items
                                    </span>
                                </tr>
                                <tr>
                                    <span class="me-4 mb-3">
                                        Rp. {{ $totalPrice }}
                                    </span>
                                </tr>
                            </div>

                        </div>
                        <div class="card mt-3">
                            <h5 class="mt-3 ms-4">Detail Payment</h5>
                            <div class="d-flex p-0  justify-content-between">
                                <tr>
                                    <span class="ms-4 mb-3">
                                        Price
                                    </span>
                                </tr>
                                <tr>
                                    <span class="me-4 mb-3">
                                        Rp.{{ $allPrice }}
                                    </span>
                                </tr>
                            </div>
                            <div class="d-flex p-0  justify-content-between">
                                <tr>
                                    <span class="ms-4 mb-3">
                                        Delivery Payment
                                    </span>
                                </tr>
                                <tr>
                                    <span class="me-4 mb-3">
                                        Rp.{{ $deliveryPayment }}
                                    </span>
                                </tr>
                            </div>
                            <div class="d-flex p-0 mt-4 justify-content-between">
                                <tr>
                                    <span class="ms-4 mb-3">
                                        Total
                                    </span>
                                </tr>
                                <tr>
                                    <span class="me-4">
                                        Rp.{{ $total }}
                                    </span>
                                </tr>
                            </div>
                            <div class="d-flex p-0 mt-4 justify-content-between">
                                <div class="dropdown ms-4">
                                    <button class="btn bg-outline-dark dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        santri
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                        style="max-height: 200px; overflow-y: auto;" id="santriDropdown">
                                        @if ($santri)
                                            @foreach ($santri as $item)
                                                <li>
                                                    <a class="dropdown-item" href="#"
                                                        onclick="selectSantri('{{ $item->nama_santri }}')">{{ $item->nama_santri }}</a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                <a class="dropdown-item" href="#">not found</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div>
                                    <span class="ms-4 me-4" id="selectedSantri">
                                        Santri Selected
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex p-0 mt-4 justify-content-between">
                                <div class="dropdown ms-4">
                                    <span>Saldo</span>
                                </div>
                                <div>
                                    <span class="ms-4 me-4" id="selectedSaldoSantri">
                                        Saldo Total
                                    </span>
                                </div>
                            </div>
                            <div class="card-header p-0 mx-3 position-relative z-index-1">
                                <a href="javascript:;" class="d-block">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="author align-items-center">
                                    <form method="POST" action="/history">
                                        @csrf
                                        <input type="hidden" name="no_order" value="{{ $newOrderNumber }}">
                                        <input type="hidden" name="order_date" value="{{ date('Y-m-d') }}">
                                        <button type="submit" class="btn btn-dark w-100">Pay</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function selectSantri(nama_santri) {
        document.getElementById('selectedSantri').innerHTML = nama_santri;
        var id_santri = getIdSantriByName(nama_santri);
    }



    function getIdSantriByName(nama_santri) {
        var options = document.getElementById('santriDropdown').options;
        for (var i = 0; i < options.length; i++) {
            if (options[i].text == nama_santri) {
                return options[i].value;
            }
        }
        return null;
    }
</script>
