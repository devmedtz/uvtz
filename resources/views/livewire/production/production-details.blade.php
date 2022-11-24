<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">Material: <strong class="text-secondary">{{$prodMaterials->material_name}}</strong></h4> <p>Details of Production Materials</p></div>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">Usage History (Total Used: {{$usage->sum('qty')}})</h4>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control col-md-6 col-sm-12" placeholder="Search......"/>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-centered mb-0" >
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Qty</th>
                                <th>Reason</th>
                                <th>User</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($usage as $used)
                                    <tr>
                                        <td>{{$used->mat_date}}</td>
                                        <td>{{$used->qty}}</td>
                                        <td>{{$used->material_note}}</td>
                                        <td>{{$used->created_by}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-success">Addition History (Total Addition: {{$additions->sum('qty')}})</h4>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control col-md-6 col-sm-12" placeholder="Search......"/>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-centered mb-0" >
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Qty</th>
                                <th>Note</th>
                                <th>User</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($additions as $addition)
                                    <tr>
                                        <td>{{$addition->mat_date}}</td>
                                        <td>{{$addition->qty}}</td>
                                        <td>{{$addition->material_note}}</td>
                                        <td>{{$addition->created_by}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
