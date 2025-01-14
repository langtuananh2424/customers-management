@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('customers.create')}}" class="btn btn-primary">Add Customer</a>
        @if(session(key:'success'))
            <div class="alert alert-success">{{session(key:'success')}}</div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th>User Id</th>
                <th>Email</th>
                <th>Account Type</th>
                <th>Status</th>
                <th>Login Time</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->account_type}}</td>
                    <td>{{$customer->status}}</td>
                    <td>{{$customer->last_login}}</td>
                    <td><a href="{{route('customers.edit', $customer->id)}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form action="{{route('customers.destroy', $customer->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xoá ?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $customers->links('pagination::bootstrap-4') }}  <p>Showing page {{ $customers->currentPage() }} of {{ $customers->lastPage() }}</p>  </div>
@endsection
