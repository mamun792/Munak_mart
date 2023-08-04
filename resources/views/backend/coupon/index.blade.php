@extends('layouts.dashboardmaster')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Coupon List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-solid" href="add-new-product.html">Add Coupon</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package coupon-list-table table-hover theme-table"
                                    id="table_id">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="form-check user-checkbox m-0 p-0">
<p>Select</p>
                                                </span>
                                            </th>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="form-check user-checkbox m-0 p-0">
                                                    <input class="checkbox_animated check-it"
                                                        type="checkbox" value="">
                                                </span>
                                            </td>
                                            <td>10% Off</td>
                                            <td>5488165</td>
                                            <td class="theme-color">10%</td>
                                            <td class="menu-status">
                                                <span class="danger">Restitute</span>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->


</div>
@endsection
