@extends('admin.layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hoá đơn nhập</h1>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="p-4">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Thông tin phiếu nhập</h1>                                                                         
                    </div>
                    <form class="user row" method="POST" action="">
                        @csrf
                        <div class="form-group col-md-12 form-floating">
                                <input type="text" class="form-control form-control-user sopn"
                                     aria-describedby="emailHelp" id="sopn" name="sopn" placeholder="pl" 
                                      value="@php if(!empty($SoPN)) echo $SoPN; else echo old('sopn'); @endphp" data-masp = "@php if(!empty($SoPN)) echo $SoPN @endphp">
                                    <label for="sopn" style="color: #3d3d3d;margin-left: 4px;">Số phiếu nhập</label>
                            @error('sopn')
                                <p class="message" style="color:red;font-size:12px;margin-bottom:0;">*{{$message}}</p>
                            @enderror                                                
                        </div>   
                        <div class="form-group col-md-6">
                            <label for="ncc" style="color: #3d3d3d;margin-left: 4px;">Nhà cung cấp</label>
                                <select class="form-select" aria-label="Default select example" name="ncc">
                                    @php
                                        $NhaCungCap = null;
                                        if(!empty($Ncc)) $NhaCungCap = $Ncc;
                                    @endphp
                                    @if(!empty($dataSupplier))
                                        @foreach($dataSupplier as $key => $item)
                                            <option value="{{$item->MaNCC}}" {{ $item->MaNCC == $NhaCungCap ? 'selected':false}}>{{$item->TenNCC}}</option>                                   
                                        @endforeach
                                    @endif
                                </select>                        
                        </div>                                                                                                          
                        <div class="form-group col-md-6 form-floating mt-3">
                            <input type="text" class="form-control form-control-user"
                                id="masp" aria-describedby="emailHelp" placeholder="pl" id="masp" name="masp" value="{{old('masp')}}">
                                <label for="masp" style="color: #5e5e5e;margin-left: 4px;">Mã sản phẩm</label>  
                            @error('masp')
                                <p class="message" style="color:red;font-size:12px;margin-bottom:0;">*{{$message}}</p>
                            @enderror                        
                        </div>                                
                        <div class="form-group col-md-6 form-floating">
                            <input type="text" class="form-control form-control-user"
                             aria-describedby="emailHelp" placeholder="pl" id="slnhap" name="slnhap" value="{{old('slnhap')}}">
                                <label for="soluongnhap" style="color: #3d3d3d;margin-left: 4px;">Số lượng nhập</label>  
                            @error('slnhap')
                                <p class="message" style="color:red;font-size:12px;margin-bottom:0;">*{{$message}}</p>
                            @enderror                      
                        </div>
                        <div class="form-group col-md-6 form-floating">
                            <input type="text" class="form-control form-control-user"
                                id="gianhap" aria-describedby="emailHelp"placeholder="pl" id="gianhap" name="gianhap" value="{{old('gianhap')}}">
                                <label for="gianhap" style="color: #3d3d3d;margin-left: 4px;">Giá nhập(VND)</label> 
                            @error('gianhap')
                                <p class="message" style="color:red;font-size:12px;margin-bottom:0;">*{{$message}}</p>
                            @enderror                         
                        </div>
                        <div class="col-md-12 row">
                            <button class="btn btn-primary btn-user btn-block col-md-6 mx-auto" onclick="getDetail('@php if(!empty($SoPN)) echo $SoPN @endphp')">
                                Thêm mới
                            </button>
                        </div>                                                       
                    </form>
                    <hr>                                 
                </div>                                                        
            </div>

        </div>
        <div class="col-md-8">
            <div class="row d-flex mb-3">
                <div class="col-md-4">
                    <form class="">
                        <div class="input-group">
                            <input type="search" class="form-control bg-light border-1 small" placeholder="Tìm kiếm..."
                                aria-label="Search" aria-describedby="basic-addon2" id="search-order" name="search-order">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="Search()">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> 
                </div>
                <div class="col-md-8 d-flex justify-content-end" id="tongtien"></div>
            </div>
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Thông tin phiếu</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá nhập</th>
                            <th style="width:110px">Sửa</th>
                            <th style="width:110px">Xoá</th>
                        </tr>
                    </thead>
                    <tbody id="detail-order">
                    </tbody>
                </table>
                <div class="col-md-4" id="button-delete_order">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var SoPN = $('.sopn').data('masp');
            if(!SoPN && $('.sopn').val()) SoPN = $('.sopn').val();
            if(SoPN){
                getDetail(SoPN);
                getTotal(SoPN);           
            }
        });
        function getDetail(SoPN){
            $.ajax({
                url: "/admin-area/import-order/detail/"+SoPN,
                method: "GET",
                data:{
                    _token:'{{ csrf_token() }}'},
                dataType: "json",
                contentType: "json",
                success: function (data) { 
                    if(data == 0 && $('#search-order').val()) {
                        let notification = '<p>Không tìm thấy kết quả tìm kiếm !</p>';
                        $('#detail-order').html('');
                        $('#tongtien').html('');
                        $('#button-delete_order').html(notification);
                        return;
                    }
                    if(data.length>0){      
                        var html = '';
                            var len = data.length;
                            for(var i =0 ;i<len;i++){             
                                html += '<tr>';
                                html += '<td>' +(data[i].SoPN?data[i].SoPN:'')+'-'+(data[i].MaSP?data[i].MaSP:'') + '</td>';       
                                html += '<td>' +(data[i].TenSP?data[i].TenSP:'') + '</td>';
                                html += '<td>' + (data[i].SoLuong?data[i].SoLuong:'') + '</td>';
                                html += '<td>' + (data[i].GiaNhap?data[i].GiaNhap:'') + '</td>';
                                html +='<td style="width:110px"><button class="btn btn-primary" onclick="getOneDetailOrder(\''+data[i].SoPN+'\',\''+data[i].MaSP+'\')"> Sửa<i class="fas fa-fw fa-edit pl-2"></i></button></td>';
                                html += '<td style="width:110px"><button class="btn btn-primary" onclick="Delete(\''+data[i].SoPN+'\',\''+data[i].MaSP+'\')"> Xoá<i class="fas fa-fw fa-trash pl-2"></i></button></td>';
                                html += '</tr>' ;
                            }
                        $('#detail-order').html(html);
                        let btn ='<button class="btn btn-primary" onclick="DeleteOrder(\''+SoPN+'\')">Xoá phiếu nhập</button>';
                        $('#button-delete_order').html(btn);
                    }
                },
                error: function(err){
                      console.log(err);
                }
            });
        }
        function getTotal(SoPN){
            $.ajax({
                url: "/admin-area/import-order/"+SoPN,
                method: "GET",
                data:{
                    _token:'{{ csrf_token() }}'},
                dataType: "json",
                contentType: "json",
                success: function (data) {    
                    if(data.length==0){
                        $('#tongtien').html(html);
                        return;
                    }      
                    var html ='';
                    if(data[0].TongTien!=0){
                        html +='<p style="color:black;font-weight:bold">Tổng tiền:'+data[0].TongTien+' VND</p>';
                    }
                    $('#tongtien').html(html);
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
        function getOneDetailOrder(SoPN,MaSP){
            $.ajax({
                url: "/admin-area/import-order/one-detail/"+SoPN+"-"+MaSP,
                method: "GET",
                data:{
                    _token:'{{ csrf_token() }}'},
                dataType: "json",
                contentType: "json",
                success: function (data) {          
                    $('#sopn').attr('value',data.SoPN);
                    $('#masp').attr('value',data.MaSP);
                    $('#slnhap').attr('value',data.SoLuong);
                    $('#gianhap').attr('value',data.GiaNhap);
                },
                error: function(err){
                    
                }
            });
        }
        function Search(){
                if($('#search-order').val()){
                    getDetail($('#search-order').val())
                    getTotal($('#search-order').val());
                }
        }
        function DeleteOrder(SoPN) {
            if(confirm('Bạn có chắc chắn muốn xoá không?')){
                $.ajax({
                    url: "/admin-area/import-order/delete/"+SoPN,
                    method: "GET",
                    data:{
                        _token:'{{ csrf_token() }}'},
                    dataType: "json",
                    contentType: "json",
                    success: function (data) {          
                        alert("Xoá phiếu nhập thành công!");
                        $('#detail-order').html('');
                        $('#button-delete_order').html('');
                        $('#tongtien').html('');
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
            }
        }
        function Delete(SoPN,MaSP){
            if(confirm('Bạn có chắc chắn muốn xoá không?')){
                $.ajax({
                    url: "/admin-area/import-order/delete/one-detail/"+SoPN+"-"+MaSP,
                    method: "GET",
                    data:{
                        _token:'{{ csrf_token() }}'
                    },
                    dataType: "json",
                    contentType: "json",
                    success: function (data) {   
                        alert('Xoá Dữ liệu thành công!');
                        getDetail(SoPN);
                        getTotal(SoPN); 
                        if(data == 0){
                            $('#detail-order').html('');
                            $('#tongtien').html('');
                            $('#button-delete_order').html('');
                        }   
                    },
                    error: function(err){
                        alert('Lỗi xoá dữ liệu!');
                    }
                });
            }
        }
    </script>
@endsection