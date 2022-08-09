<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">Product: <strong class="text-secondary">{{ $prodName->material_name}}</strong></h4> <p>Product addition Info </p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item">addition</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-success">Product Addition History </h4>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control col-md-6 col-sm-12" placeholder="Search......"/>
                    <div class="table-responsive mt-3">
                        <table class="display table table-bordered table-hover  table-striped tableNames" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Qty</th>
                                <th>User</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($prodDetails as $addition)
                                <tr>
                                    <td>{{$addition->id}}</td>
                                    <td>{{$addition->created_at}}</td>
                                    <td>{{$addition->product_quantity}}</td>
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
