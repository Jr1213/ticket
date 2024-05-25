@extends('layout.app')
@section('content')
    <!-- row -->
    <div class="row">
        {{-- @session('success') --}}
        {{-- @session  --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> <a href="{{ route('ticket.create') }}" class="btn btn-success"><i
                                class=" fas fa-plus"></i></a> Tickets
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>type</th>
                                    <th>user</th>
                                    <th>date</th>
                                    <th>status</th>
                                    <th>assgined</th>
                                    <th colspan="1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tikets as $tiket)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tiket->title }}</td>
                                        <td>{{ $tiket->description }}</td>
                                        <td>
                                            {{ $tiket->type?->name }}
                                        </td>
                                        <td>{{ $tiket->user?->name }}</td>
                                        <td>{{ date('Y-m-d', strtotime($tiket->created_at)) }} </td>
                                        <td>{{ $tiket->status }}</td>
                                        <td colspan="1">{{ $tiket->assgined?->name }}</td>
                                        <td colspan="1">
                                            <div class="flex">
                                                <a class="btn btn-warning mx-1 my-1 rounded-circle d-inline-block"
                                                    href="{{ route('ticket.edit', ['ticket' => $tiket->id]) }}">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <a class="btn btn-primary mx-1 my-1 rounded-circle d-inline-block"
                                                    href="{{ route('ticket.show', ['ticket' => $tiket->id]) }}">
                                                    <i class="fa fa-comment-alt"></i>
                                                </a>

                                            </div>
                                            {{-- <form action="{{ route('ticketTpye.destroy', ['tickettiket' => $tiket->id]) }}"
                  
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger rounded-circle">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <a class="btn btn-info  rounded-circle"
                                                    href="{{ route('ticketTpye.edit', ['tickettiket' => $tiket->id]) }}"> <i
                                                        class="far fa-edit"></i></a>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $tikets->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- row -->
@endsection
