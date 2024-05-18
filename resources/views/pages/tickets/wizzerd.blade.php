@extends('layout.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create new Ticket</h4>
                <form action="{{ route('ticket.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ticket_type_id" id="ticket_type_id" value="{{ $type->id }}">
                    <x-form.input name='title' title="Ticket Name" placcholder='enter ticket name' />
                    <x-form.textarea name='description' title="Ticket Description" placcholder='enter ticket description' />
                    <button class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
