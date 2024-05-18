@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">
            <h3>Select Ticket Type</h3>
        </div>
        <div class="col-12">
            <!-- Row -->
            <div class="row">
                <!-- column -->
                @foreach ($types as $type)
                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{ $type->image_url }}" alt="{{ $type->name }} image">
                            <div class="card-body">
                                <h4 class="card-title">{{ $type->name }}</h4>
                                <p class="card-text">{{ $type->description }}</p>
                                <a href="{{ route('ticket.wizzerd',['type' => $type->id]) }}" class="btn btn-primary">Select</a>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                    <!-- column -->
                @endforeach

            </div>
            <!-- Row -->
        </div>
    </div>
@endsection
