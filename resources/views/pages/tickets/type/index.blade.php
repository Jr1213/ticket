@extends('layout.app')
@section('content')
    <!-- row -->
    <div class="row">
        {{-- @session('success') --}}
        <x-alert.success />
        {{-- @session  --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> <a href="{{ route('ticketTpye.create') }}" class="btn btn-success"><i
                                class=" fas fa-plus"></i></a> Ticket Types
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>image</th>
                                    <th>last update</th>
                                    <th>created at</th>
                                    <th colspan="1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $type->name }}</td>
                                        <td>{{ $type->description }}</td>
                                        <td>
                                            <img src="{{ $type->imageUrl }}" class="img-fluid rounded" width="100"
                                                alt="type image">
                                        </td>
                                        <td>{{ $type->lastUpdate }}</td>
                                        <td>{{ $type->dateOfcreation }}</td>
                                        <td colspan="1">
                                            <form action="{{ route('ticketTpye.destroy', ['ticketType' => $type->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger rounded-circle">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <a class="btn btn-info  rounded-circle"
                                                    href="{{ route('ticketTpye.edit', ['ticketType' => $type->id]) }}"> <i
                                                        class="far fa-edit"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row -->
@endsection
