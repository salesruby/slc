@extends('layout.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@stop

@section('content')

<div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Data Table Default</h4>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Organisation</th>
                                                <th>Sms Action</th>
                                                <th>Sms Action</th>
                                                <th>Email Action</th>
                                                <th>Email Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($leads as $lead)
                                            <tr>
                                            <td>{{$lead->full_name}}</td>
                                                <td>{{$lead->email}}</td>
                                                <td>{{$lead->phone}}</td>
                                                <td>{{$lead->organisation}}</td>
                                                <td><button class="btn btn-danger">Stop SMS 1</button></td>
                                                <td><button class="btn btn-danger">Stop SMS 2</button></td>
                                                <td><button class="btn btn-danger">Stop Email 1</button></td>
                                                <td><button class="btn btn-danger">Stop Email 2</button></td>
                                            </tr>

                                            @empty

                                            @endforelse
                                      
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @stop

                        @section('script')
                        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
                        @stop