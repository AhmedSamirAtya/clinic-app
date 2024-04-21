@extends('layouts.app')

@section('template_title')
    Location
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Location') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('locations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Address</th>
										<th>City</th>
										<th>State</th>
										<th>Postal Code</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locations as $location)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $location->clinic_id }}</td>
											<td>{{ $location->address }}</td>
											<td>{{ $location->city }}</td>
											<td>{{ $location->state }}</td>
											<td>{{ $location->postal_code }}</td>

                                            <td>
                                                <form action="{{ route('locations.destroy',$location->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('locations.show',$location->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('locations.edit',$location->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $locations->links() !!}
            </div>
        </div>
    </div>
@endsection
