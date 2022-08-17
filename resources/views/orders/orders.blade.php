@extends('layouts.master')
@section('title')
    الطلبات
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جميع
                    الطلبات</span>
                </div>
    </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <!--div-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-2 text-right">
                <a class="modal-effect btn btn-sm btn-primary" href=" {{ url('export_orders') }}"
                    style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير اكسيل</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                        <thead>
                            <tr>

                            <th class="wd-15p border-bottom-0">رقم الطلب  </th>
                                <th class="wd-10p border-bottom-0">تاريخ الطلب </th>
                                <th class="wd-10p border-bottom-0">تاريخ التسليم</th>
                                <th class="wd-10p border-bottom-0"> القسم </th>
                                <th class="wd-10p border-bottom-0">الخدمة </th>
                                <th class="wd-10p border-bottom-0">حالةالخدمة </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $order)

                                <tr>

                                    <td>{{ $order->order_number }} </td>
                                    <td>{{ $order->order_Date }}</td>
                                    <td>{{ $order->Due_Date }}</td>
                                    <td>{{ $order->section->name }}</td>
                                    <td>{{ $order->service->name}}</td>
                                    @if(!empty($order->service->deleted_at))
                                    <td class="text-danger">لقد تم حذف هذه الخدمة </td>
                                    @else
                                    <td class="text-success" >الخدمة موجودة وفعالة</td>
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>
<!-- Container closed -->
</div>
@endsection
