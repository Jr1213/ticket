@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Assgine Employee</h4>
            <form method="POST" action="{{ route('ticket.update', ['ticket' => $ticket->id]) }}">
                @csrf
                @method('patch')
                <div class="form-group mb-4">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select</label>
                    <select required name="assgined_id" class="form-select mr-sm-2" id="inlineFormCustomSelect">
                        <option value="" disabled selected>select</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @selected($ticket->assgined_id == $user->id)>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">save</button>
            </form>
        </div>
    </div>
@endsection
