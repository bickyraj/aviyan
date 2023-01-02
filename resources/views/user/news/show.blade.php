@extends('layouts.user')
@section('content')

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ $event->name }}
                        {{-- <small>sub title</small> --}}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="image mb-4">
                        <img style="width: 100%;" src="{{ $event->imageUrl }}" alt="">
                    </div>
                    <p>
                        {!! $event->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Content -->
@endsection
