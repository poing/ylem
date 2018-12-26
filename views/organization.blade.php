@extends('ylem.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Organization</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

@include('organization.tradingName')
@include('organization.nameType')
@include('organization.type')
@include('organization.status')
@include('organization.href')
@include('organization.isLegalEntity')
@include('organization.existsDuring')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
