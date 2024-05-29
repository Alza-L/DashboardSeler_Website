@extends('layouts.main')

@section('container')

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><button>
            </div>
        @endif

<a href="{{ route('customer.create') }}">
    <button type="button" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
        </svg>
    </button>
</a>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <h6>Customers table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">customer</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">country</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ordered</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>
                                    <div class="d-flex px-3 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $customer->customer_name }}</h6>
                                        <p class="text-xs text-secondary mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="650f0a0d0b2506170004110c130048110c084b060a08">{{ $customer->email }}</a></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-secondary text-xs font-weight-bold">{{ $customer->country->country_name }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $customer->status }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $customer->ordered }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('customer.edit', $customer->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"><button class="badge rounded-pill bg-primary border-0">Update</button></a>
                                    |
                                    <form action="{{ route('customer.destroy', $customer->id) }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"><button class="badge rounded-pill bg-danger border-0" onclick="return confirm('Are you sure?')">Delete</button></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection