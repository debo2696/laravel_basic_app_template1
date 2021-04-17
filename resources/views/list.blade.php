@extends('layout')

@section('MidContent')



<div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Ticket list</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <button class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-plus"></i></button>
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
                                    <th>Username</th>
                                    <th>Created by</th>
                                    <th>Date</th>
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
                                    <td>02 Jan 2019</td>
                                    <td>Maryam</td>
                                    <td><span class="badge badge-warning">In Progress</span></td>
                                </tr>
                                <!--<tr>
                                    <td><strong>A4578</strong></td>
                                    <td><a href="ticket-detail.html" title="">Update chart library</a></td>
                                    <td>Alpino Bootstrap</td>
                                    <td>Tim Hank</td>
                                    <td>04 Jan 2019</td>
                                    <td>Hossein</td>
                                    <td><span class="badge badge-warning">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td><strong>A6523</strong></td>
                                    <td><a href="ticket-detail.html" title="">Mega Menu Open OnClick</a></td>
                                    <td>Hexabit Admin</td>
                                    <td>Gary Camara</td>
                                    <td>09 Jan 2019</td>
                                    <td>Maryam</td>
                                    <td><span class="badge badge-info">Opened</span></td>
                                </tr>
                                <tr>
                                    <td><strong>A9514</strong></td>
                                    <td><a href="ticket-detail.html" title="">Nexa Theme Side Menu Open OnClick</a></td>
                                    <td>Nexa Template</td>
                                    <td>Tim Hank</td>
                                    <td>12 Jan 2019</td>
                                    <td>Hossein</td>
                                    <td><span class="badge badge-info">Opened</span></td>
                                </tr>
                                <tr>
                                    <td><strong>A2548</strong></td>
                                    <td><a href="ticket-detail.html" title="">Update Angular version</a></td>
                                    <td>Lucid Admin</td>
                                    <td>Fidel Tonn</td>
                                    <td>22 Jan 2019</td>
                                    <td>Frank</td>
                                    <td><span class="badge badge-danger">Closed</span></td>
                                </tr>
                                <tr>
                                    <td><strong>A1346</strong></td>
                                    <td><a href="ticket-detail.html" title="">Add new hospital</a></td>
                                    <td>Lucid Hospital</td>
                                    <td>Fidel Tonn</td>
                                    <td>13 Jan 2019</td>
                                    <td>Hossein</td>
                                    <td><span class="badge badge-danger">Closed</span></td>
                                </tr>
                                <tr>
                                    <td><strong>A7845</strong></td>
                                    <td><a href="ticket-detail.html" title="">Update latest bootstrap version</a></td>
                                    <td>Compass Dashboard</td>
                                    <td>Tim Hank</td>
                                    <td>07 Jan 2019</td>
                                    <td>Frank</td>
                                    <td><span class="badge badge-warning">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td><strong>A2586</strong></td>
                                    <td><a href="ticket-detail.html" title="">Add new extra page</a></td>
                                    <td>Lucid Admin</td>
                                    <td>Tim Hank</td>
                                    <td>02 Jan 2019</td>
                                    <td>Maryam</td>
                                    <td><span class="badge badge-warning">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td><strong>A4578</strong></td>
                                    <td><a href="ticket-detail.html" title="">Update chart library</a></td>
                                    <td>Alpino Bootstrap</td>
                                    <td>Tim Hank</td>
                                    <td>04 Jan 2019</td>
                                    <td>Hossein</td>
                                    <td><span class="badge badge-warning">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td><strong>A6523</strong></td>
                                    <td><a href="ticket-detail.html" title="">Mega Menu Open OnClick</a></td>
                                    <td>Hexabit Admin</td>
                                    <td>Gary Camara</td>
                                    <td>09 Jan 2019</td>
                                    <td>Maryam</td>
                                    <td><span class="badge badge-info">Opened</span></td>
                                </tr>-->
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    <ul class="pagination pagination-primary mt-4">
                        <li>{{$user->links()}}</li>
                    </ul>
                    <!--<ul class="pagination pagination-primary mt-4">
                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                    </ul>-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection