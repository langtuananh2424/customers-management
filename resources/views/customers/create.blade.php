@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Customer') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customers.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="banned">Banned</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="account_type">Account Type:</label>
                                <select class="form-control" id="account_type" name="account_type">
                                    <option value="basic">Basic</option>
                                    <option value="premium">Premium</option>
                                    <option value="enterprise">Enterprise</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

