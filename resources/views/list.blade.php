@extends('layout')

@section('MidContent')
<meta name="csrf-token" content="{{ csrf_token() }}">





<div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Ticket list</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ul>
                    
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="input-group">
                        <form action="{{route('list')}}" method="post">
                        @csrf
                            <div class="form-outline">
                                <label class="form-label" for="form1">Search</label>
                                <input type="search" id="form1" name="auto_box" class="form-control float-right" />
                            </div>
                            <button type="submit" class="btn btn-primary btn-icon float-right right_icon_toggle_btn">                
                        </form>                        
                    <a href="{{route('inp')}}"><button class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-plus"></i></button></a>
                </div>
            </div>
        </div>
        
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card project_list">
                    <div class="table-responsive">
                        <table class="table table-hover c_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <form action="{{route('list')}}" method="post">
                                    @csrf
                                        <input type="hidden" id="custId" name="custId" value="date">
                                        <th>Username<button class="btn btn-danger" id="delBtn">F</button></th>                       
                                    </form>
                                    <th>Created by</th>
                                    <th>Action1</th>
                                    <th>Action2</th>
                                    <th>Agent</th>
                                    <th>Status</th>                                    
                                </tr>
                            </thead>
                            @foreach($user as $u)                                 
                            <tbody>
                                <tr>
                                    <td><strong>A2586</strong></td>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->email}}</td>
                                    <td><a href="ticket-detail.html" title="">Update chart library</a></td>
                                    <td><a href="{{URL::to('edit/'.$u->id)}}" class="btn btn-warning">Edit</a></td>
                                    <td><button class="btn btn-danger" id="delBtn" data-id="{{ $u->id }}" >Delete Record</button></td>                                    
                                    <td>Maryam</td>
                                    <td><span class="badge badge-warning">In Progress</span></td>
                                </tr>
                                
                            </tbody>
                            @endforeach
                        </table>
                    @if(!Session::has('paginate_status'))
                    </div>
                    <ul class="pagination pagination-primary mt-4">
                        <li>{{$user->links()}}</li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('AdditionalJS')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection