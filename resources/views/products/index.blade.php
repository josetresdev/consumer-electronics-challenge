@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-0">Gestión de productos</h2>
        <small class="text-muted">Control de inventario, estados y lotes</small>
    </div>

    <a href="{{ route('products.create') }}" class="btn btn-primary">
        Crear producto
    </a>
</div>

<div class="row g-3">

    @foreach($products as $product)

        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body d-flex flex-column">

                    <div class="mb-2">
                        <h5 class="mb-1">{{ $product->name }}</h5>

                        <div class="text-muted small">
                            Modelo: {{ $product->model }}
                        </div>

                        <div class="text-muted small">
                            Lote: {{ $product->batch }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <span class="badge bg-dark">
                            {{ ucfirst($product->status) }}
                        </span>

                        @if($product->isExpired())
                            <span class="badge bg-danger">Vencido</span>
                        @else
                            <span class="badge bg-success">Vigente</span>
                        @endif
                    </div>

                    @if($product->notes)
                        <div class="alert alert-light border small mb-3">
                            {{ $product->notes }}
                        </div>
                    @endif

                    <div class="mt-auto">

                        <div class="d-grid gap-2">

                            {{-- EXPIRED FLOW --}}
                            @if($product->isExpired())

                                <form method="POST" action="{{ route('products.changeStatus', [$product->id, 'disposed']) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-danger btn-sm w-100">
                                        Marcar como Disponer
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('products.changeStatus', [$product->id, 'reserved']) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-warning btn-sm w-100">
                                        Marcar como Reservar
                                    </button>
                                </form>

                            @else

                                {{-- NORMAL FLOW --}}
                                @if($product->status === 'available')

                                    <form method="POST" action="{{ route('products.changeStatus', [$product->id, 'reserved']) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-warning btn-sm w-100">
                                            Reservar producto
                                        </button>
                                    </form>

                                @elseif($product->status === 'reserved')

                                    <form method="POST" action="{{ route('products.changeStatus', [$product->id, 'available']) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-success btn-sm w-100">
                                            Liberar producto
                                        </button>
                                    </form>

                                @endif

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>

<div class="mt-4">
    {{ $products->links() }}
</div>

@endsection