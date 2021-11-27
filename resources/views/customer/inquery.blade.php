@extends('layouts.customer')

@section('content')
    <div class="card">
        <div class="card-header">
            Made for me form
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('inquiry.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-right">Contact Person*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-right">Email*</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-right">Address</label>
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label text-right">Country</label>
                                    <div class="col-sm-8">
                                        <select class="form-control @error('country') is-invalid @enderror" id="country"
                                            name="country">
                                            @foreach ($countries as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="zip_code" class="col-sm-4 col-form-label text-right">Zip Code*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                                            id="zip_code" name="zip_code" value="{{ old('zip_code') }}">
                                        @error('zip_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="min_order" class="col-sm-4 col-form-label text-right">Minimum Order*</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <input type="text" name="min_order"
                                        class="form-control @error('min_order') is-invalid @enderror" id="min_order"
                                        value="{{ old('min_order') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Piece</span>
                                    </div>
                                    @error('min_order')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="acceptable_lead_time" class="col-sm-4 col-form-label text-right">Acceptable Lead
                                Time*</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <input type="text" name="acceptable_lead_time"
                                        class="form-control @error('acceptable_lead_time') is-invalid @enderror"
                                        id="acceptable_lead_time" value="{{ old('acceptable_lead_time') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">day(s)</span>
                                    </div>
                                    @error('acceptable_lead_claim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="type" class="col-sm-4 col-form-label text-right">Types*</label>
                            <div class="col-sm-8">
                                <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                    @foreach ($types as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="material" class="col-sm-4 col-form-label text-right">Material*</label>
                            <div class="col-sm-8">
                                <select class="form-control" @error('material') is-invalid @enderror name="material"
                                    id="material">
                                    @foreach ($materials as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>

                                @error('material')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-right">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                    name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reference_image" class="col-sm-4 col-form-label text-right">Reference Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('reference_image') is-invalid @enderror"
                                    id="reference_image" name="reference_image">
                                @error('reference_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reference" class="col-sm-4 col-form-label text-right">Or Reference link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('reference') is-invalid @enderror"
                                    id="reference" name="reference" value="{{ old('description') }}">
                                @error('reference')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-small text-danger small">We require that you fill item with marked with an asterik (*)</p>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
