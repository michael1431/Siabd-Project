@extends('layouts.master')
@section('title','Subject List')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Subject List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sl=1;    
                                @endphp
                                @forelse ($subjects as $key=>$country)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{ $key }}</td>
                                    <td>{{ $key }}</td>
                                    <td><a class="btn btn-danger" style="background-color: #ea1b23" href="#">Edit</a></td>
                                </tr> 
                                @empty
                                    <tr><th colspan="7">There is no data for this query</th></tr>
                                @endforelse
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection