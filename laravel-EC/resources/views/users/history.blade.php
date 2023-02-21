@extends('layouts.app')


@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <th>Transaction ID</th>
                <th>Status</th>
                <th>Order Date</th>
            </thead>
            <tbody>
                @foreach ($orders as $cart)
                    <tr>
                        <td>
                            <a href="{{ route('history.show', $cart->transaction_id) }}" class="text-decoration-none">
                                {{ $cart->transaction_id }}
                            </a>
                        </td>
                        <td>
                            <div class="text-uppercase badge bg-success">
                                {{ $cart->status }}
                            </div>
                        </td>
                        <td>
                            {{ $cart->created_at->format('F j Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
