@extends('layouts.master')

@section('template_title')
    Clinic Doctor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clinic Doctor') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clinic-doctors.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Clinic Id</th>
										<th>Doctor Id</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Working Days</th>
										<th>Appointment Price</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clinicDoctors as $clinicDoctor)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $clinicDoctor->clinic->name }}</td>
											<td>{{ $clinicDoctor->doctor->name }}</td>
											<td>{{ $clinicDoctor->start_time }}</td>
											<td>{{ $clinicDoctor->end_time }}</td>
											<td>{{ implode(', ', $clinicDoctor->working_days ?? []) }}</td>
											<td>{{ $clinicDoctor->appointment_price }}</td>

                                            <td>
                                                <form action="{{ route('clinic-doctors.destroy',$clinicDoctor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clinic-doctors.show',$clinicDoctor->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clinic-doctors.edit',$clinicDoctor->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $clinicDoctors->links() !!}
            </div>
        </div>
    </div>
@endsection
