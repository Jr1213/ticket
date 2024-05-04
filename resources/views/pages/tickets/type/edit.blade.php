@extends('layout.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit {{ $type->name }}</h4>
                <form action="{{ route('ticketTpye.update', ['ticketType' => $type->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('pages.tickets.type.form')
                    <button class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
