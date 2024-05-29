@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-7">
        <div class="card mb-4 px-4">
            <div class="card-header pb-2">
                <h5>Add New Customer</h5>
            </div>

            <form action="{{ route('customer.update', $customer->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="customer_name" class="form-label">Customer</label>
                    <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name"
                    placeholder="Kamal Udin" value="{{ old('customer_name', $customer->customer_name) }}">
                    @error('customer_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email', $customer->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select" name="country" id="country">
                        <option selected value="{{ $customer->country->id }}">{{ $customer->country->country_name }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status">
                        <option selected value="{{ $customer->status }}">{{ $customer->status }}</option>
                        <option value="Work">Work</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ordered" class="form-label">Ordered</label>
                    <input type="number" name="ordered" class="form-control @error('ordered') is-invalid @enderror" id="ordered" value="{{ old('ordered', $customer->ordered) }}">
                    @error('ordered')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection