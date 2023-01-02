@extends('layouts.user')
@section('content')
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-laptop"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    News
                </h3>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($events as $event)
            <div class="col-lg-6">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">{{ $event->name }}
                            {{-- <small>sub title</small> --}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! truncate($event->description, 300) !!}
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('user.news.show', $event->slug) }}" class="btn btn-outline-secondary font-weight-bold">view more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- end:: Content -->
@endsection
