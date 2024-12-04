@extends('layouts.app')

@section('content')
    <h1>Courses</h1>
    <thead>
    <a href="/invoice/add">Add New Event</a>
    <tr>
        <th>Invoice Number: </th>
        <th>Client Id: </th>
        <th>Items: </th>
        <th>Total amount: </th>
        <th>Due date: </th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{  $invoice->invoice_number  }}</td>
            <td>{{  $invoice->client_id  }}</td>
            <a href="{{route('invoice.edit', $invoice->id)}}">Edit</a>
            <form method="post" action="{{route('invoice.destroy', $invoice->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </tr><br/>
    @endforeach
    </tbody>
@endsection
