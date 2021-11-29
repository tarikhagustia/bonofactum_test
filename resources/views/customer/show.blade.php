@extends('layouts.customer')

@section('content')
    <div class="row align-items-center">
        <div class="col-sm-8">
            <h3>Inquiry from {{ $inquiry->name }}</h3>
            <p class="m-0">{{ $inquiry->email }}</p>
            <p>{{ $inquiry->country->name }}, {{ $inquiry->zip_code }}</p>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Submitted at</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" value="{{ $inquiry->created_at }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Type</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" disabled value="{{ $inquiry->type->name }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Material</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" disabled value="{{ $inquiry->material->name }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Minimum Order</label>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" disabled value="{{ $inquiry->min_order }}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">pcs</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Acceptable Lead time</label>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $inquiry->acceptable_lead_time }}" disabled>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">days</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    While we are reviewing your inquiry, here some product that may interest you
                </div>
                <div class="card-body">
                    <div class="product-list">
                        <div class="d-flex align-items-center my-2">
                            <img src="https://via.placeholder.com/100" class="img-fluid">
                            <a href="#" class="ml-2">Link</a>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <img src="https://via.placeholder.com/100" class="img-fluid">
                            <a href="#" class="ml-2">Link</a>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <img src="https://via.placeholder.com/100" class="img-fluid">
                            <a href="#" class="ml-2">Link</a>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <img src="https://via.placeholder.com/100" class="img-fluid">
                            <a href="#" class="ml-2">Link</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h3>Description</h3>
        {{ $inquiry->description }}

        <div class="row mt-2">
            @foreach ($inquiry->references as $ref)
                <div class="col-sm-3">
                    <img src="{{ Storage::url($ref['path']) }}" class="img-fluid">
                    @if ($ref['url'])
                        <div class="small">
                            <p class="m-0">{{ $ref['url'] }}</p>
                            <p class="m-0">Fetched at {{ $ref['ts'] }}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
