@extends('layouts.master')

@section('template_title')
    Medicine Prescription
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Medicine Prescription') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('medicine-prescriptions.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
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

                                        <th>Medicine Id</th>
                                        <th>Prescription Id</th>
                                        <th>Dose</th>
                                        <th>Duration In Days</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicinePrescriptions as $medicinePrescription)
                                        <tr>
                                            <td>{{ $medicinePrescription->id }}</td>

                                            <td>{{ $medicinePrescription->medicine->name }}</td>
                                            <td>{{ $medicinePrescription->prescription_id }}</td>
                                            <td>{{ $medicinePrescription->dose }}</td>
                                            <td>{{ $medicinePrescription->duration_in_days }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('medicine-prescriptions.destroy', $medicinePrescription->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('medicine-prescriptions.show', $medicinePrescription->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('medicine-prescriptions.edit', $medicinePrescription->id) }}"><i
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
                {!! $medicinePrescriptions->links() !!}
            </div>
        </div>
    </div>
@endsection
