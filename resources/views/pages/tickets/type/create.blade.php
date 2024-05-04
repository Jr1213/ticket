@extends('layout.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create new Ticket type</h4>
                <form action="{{ route('ticketTpye.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('pages.tickets.type.form')
                    <button class="btn btn-success">add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
