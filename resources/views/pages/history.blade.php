<style>
    .flex-column {
        display: flex;
        flex-direction: column;
    }

    .text-muted {
        color: #8898aa;
        font-size: 14px;
        margin-top: 5px;
        order: 2;
    }
</style>


@extends('navigation.sidebar')
@section('container')
    <div class="card card-frame col-md-8 m-auto">
        <div class="card-body">
            <form method="post" action="{{ route('add-to-cart') }}">
                @csrf
                <div class="d-flex">
                    <h4 class="mb-3">History</h4>
                    <form action="/history/printPDF" method="POST" target="_blank">
                        @csrf
                        <a href="/history/printPDF" class="ms-auto">
                            <h5 style="color: #E44331">Print</h5>
                        </a>
                    </form>

                </div>
                @foreach ($order as $item)
                    <a href="">
                        <div class="d-flex p-0 mt-4 justify-content-between">
                            <div class="card card-frame col-md-12 m-auto">
                                <div class="card-body">
                                    <div class="d-flex flex-column m-auto">
                                        <h5 class="mb-0">Order No.{{ $item->no_order }}</h5>
                                        <span class="text-muted text-bold">{{ $item->order_date }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </form>
        </div>
    </div>
@endsection
