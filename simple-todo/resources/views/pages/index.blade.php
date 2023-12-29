@extends('layout.app')

@section('content')

<div class="container">

    <h3 align="center" class="mt-5">Todo List</h3>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('task.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label class="fs-3">Task</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Add New">
                        </div>

                    </div>
                </form>
            </div>

            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach( $todos as $key => $todo )

                        <tr>
                            <td scope="col">{{ $todo->id }}</td>
                            <td scope="col">{{ $todo->name }}</td>
                            <td scope="col">

                                <a>
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>

                                <form action="{{ route('task.destroy', $todo->id) }}"
                                    method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>

                        </tr>

                    @endforeach




                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@push('css')
    <style>
        .form-area {
            padding: 20px;
            margin-top: 20px;
            background-color: #b3e5fc;
        }

        .bi-trash-fill {
            color: red;
            font-size: 18px;
        }

        .bi-pencil {
            color: green;
            font-size: 18px;
            margin-left: 20px;
        }

    </style>
@endpush
