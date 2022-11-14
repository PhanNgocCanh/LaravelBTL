@extends('admin.layouts.master')

@section('content')
     <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tài khoản</h1>    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Quyen</th>
                        </tr>
                    </thead>                                   
                    <tbody>
                        @if(!empty($dataAccount))
                            @foreach($dataAccount as $key => $item)
                                <tr>
                                    <td>{{$item->TenTK}}</td>
                                    <td>{{$item->Email}}</td>
                                    <td>{{$item->Quyen}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection