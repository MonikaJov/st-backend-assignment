@extends('layouts.app')
@section('content')
    <h1>Add Invoice</h1>
    <form method="post" action="{{route('invoice.store')}}">
        @csrf
        <div>
            <label for="invoice_number">Invoice Number</label>
            <input type="text" name="invoice_number" required>
        </div>
        <div>
            <label for="client_id">Client</label>
            {{--            <input type="text" name="client_id" required>--}}
            <select name="client_id">
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}} {{$client->surname}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="items">Items</label>
            {{--            <input type="text" name="client_id" required>--}}
            <select name="items" multiple>
                @foreach($items as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="total_amount">Total Amount</label>
            <input type="number" name="total_amount" required>
        </div>
        <div>
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" required>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
