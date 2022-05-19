@extends('admin.Layouts')
@section('admin_content')
    <style>
        input {
            border: 1px solid #CED4DA !important;
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row mt-3 pl-5">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Our Doctors</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            Customer Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Doctor Name
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Message
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Approve
                                        </th>
                                        <th>
                                            Canceled
                                        </th>
                                        <th>
                                            Delete
                                        </th>
                                        <th>
                                            Send Mail
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($appointments as $appointment)
                                        <tr>
                                            <td>
                                                {{ $appointment->name }}
                                            </td>

                                            <td>
                                                {{ $appointment->email }}
                                            </td>

                                            <td>
                                                {{ $appointment->phone }}
                                            </td>

                                            <td>
                                                {{ $appointment->doctor }}
                                            </td>

                                            <td>
                                                {{ $appointment->date }}
                                            </td>

                                            <td>
                                                {{ $appointment->message }}
                                            </td>

                                            <td>
                                                {{ $appointment->status }}
                                            </td>

                                            <td>
                                                <a href="{{ url('/appoint-approved/'.$appointment->id) }}"
                                                   style="padding: 10px 10px" class="btn btn-success">Approved</a>
                                            </td>

                                            <td>
                                                <a href="{{ url('/appoint-cancel/'.$appointment->id) }}"
                                                   style="padding: 10px 10px" class="btn btn-danger">Cancel</a>
                                            </td>

                                            <td>
                                                <form action="{{ url('/appoint-delete/'.$appointment->id) }}"
                                                      method="POST" class="mt-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn"
                                                            style="padding: 10px 13px; background: red; color: white">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>

                                            <td>
                                                <a href="{{ url('/send-mail/'.$appointment->id) }}"
                                                   style="padding: 10px 10px" class="btn btn-info">
                                                    Send Mail
                                                </a>
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
        </div>
    </div>
@endsection
