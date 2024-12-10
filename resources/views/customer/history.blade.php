@extends('customer.layouts.layout')
@section('customer_title')
History
@endsection
@section('customer_layout')
<div class="card-style mb-30">
        <h6 class="mb-25">Manage Product</h6>
        <div class="card-style mb-30">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="table-wrapper table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><h6>Book</h6></th>
                            <th><h6>Rented at</h6></th>
                            <th><h6>Price</h6></th>
                            <th><h6>Status</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td><p>{{$transaction->book->product_name}}</p></td>
                                <td><p>{{$transaction->created_at}}</p></td>
                                <td><p>{{$transaction->total_price}}</p></td>
                                <td>@if ($transaction->returned_at)
                                    Returned on: {{ $transaction->returned_at->format('Y-m-d') }}
                                @else
                                    Not Returned
                                @endif</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <p class="text-muted">Currently, No Transactions Available</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
