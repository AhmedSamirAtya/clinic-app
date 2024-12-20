@extends('layouts.master')

@section('template_title')
    Medicine
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Medicine') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('medicines.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>unit</th>
                                        <th>concentration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicines as $medicine)
                                        <tr>
                                            <td>{{ $medicine->id }}</td>

                                            <td>{{ $medicine->name }}</td>
                                            <td>{{ $medicine->description }}</td>
                                            <td>{{ $medicine->unit }}</td>
                                            <td>{{ $medicine->concentration }}</td>

                                            <td>
                                                <form action="{{ route('medicines.destroy', $medicine->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('medicines.show', $medicine->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('medicines.edit', $medicine->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $medicines->links() !!}
            </div>
        </div>
    </div>
@endsection
