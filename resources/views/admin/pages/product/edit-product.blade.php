@extends('admin.layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Sửa sản phẩm</h1>

    <div class="row">
        <div class="col-lg-6 mx-auto">

            <div class="card shadow mb-4">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Sửa thông tin sản phẩm</h1>                                        
                    </div>
                    <form class="user row" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-0 form-floating">
                            <input type="text" class="form-control form-control-user"
                                id="masp" name="masp" aria-describedby="emailHelp" placeholder="pl" value="{{old('masp')??$data->MaSP}}" hidden>                          
                        </div>
                        <div class="form-group col-md-12 form-floating">
                            <input type="text" class="form-control form-control-user @error('tensp')is-invalid @enderror"
                                id="tensp" name="tensp" aria-describedby="emailHelp" placeholder="pl" value="{{old('tensp')??$data->TenSP}}">
                                <label for="tensp" style="color: #3d3d3d;margin-left: 4px;">Tên sản phẩm</label> 
                            @error('tensp')
                                <p class="message" style="color:red;font-size:12px;margin-bottom:0;">*{{$message}}</p>
                            @enderror                       
                        </div>
                        <div class="form-group col-md-12">
                            <label for="gia" style="color: #3d3d3d;margin-left: 4px;">Danh mục</label>
                            <select class="form-select" aria-label="Default select example" name="madm">                               
                                @if(!empty($dataDanhMuc))
                                    @foreach($dataDanhMuc as $key => $item)
                                        <option value="{{$item->MaDM}}" {{old('madm') == $data->MaDM ||$data->MaDM ==$item->MaDM ? 
                                            'selected' :false}}>{{$item->TenDM}}</option>                                   
                                    @endforeach
                                @endif
                            </select>                           
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gia" style="color: #3d3d3d;margin-left: 4px;">Đơn vị tính</label>
                            <select class="form-select" aria-label="Default select example" name="madvt">
                                @if(!empty($dataDonViTinh))
                                    @foreach($dataDonViTinh as $key => $item)
                                        <option value="{{$item->MaDVT}}" {{old('madvt') == $item->MaDVT||$data->MaDVT==$item->MaDVT ?
                                            'selected' :false}}>{{$item->TenDVT}}</option>                                   
                                    @endforeach
                                @endif
                            </select>                       
                        </div>  
                        <div class="form-group col-md-6">
                            <label for="gia" style="color: #3d3d3d;margin-left: 4px;">Xuất xứ</label>
                            <select class="form-select" aria-label="Default select example" name="maxx">
                                @if(!empty($dataXuatXu))
                                    @foreach($dataXuatXu as $key => $item)
                                        <option value="{{$item->MaXX}}" {{old('maxx') == $item->MaXX||$data->MaXX ==$item->MaXX ?
                                            'selected' :false}}>{{$item->TenQG}}</option>                                   
                                    @endforeach
                                @endif
                            </select>                       
                        </div>                                  
                        <div class="form-group col-md-6 form-floating">
                            <input type="text" class="form-control form-control-user @error('gia')is-invalid @enderror"
                                id="gia" aria-describedby="emailHelp" name="gia" value="{{old('gia')??$data->Gia}}" placeholder="pl">
                                <label for="gia" style="color: #3d3d3d;margin-left: 4px;">Giá (VND)</label> 
                            @error('gia')
                                <p class="message" style="color:red;font-size:12px;margin-bottom:0;">*{{$message}}</p>
                            @enderror                      
                        </div>
                        <div class="form-group col-md-6 form-floating">
                            <input type="text" class="form-control form-control-user"
                                id="giamgia" aria-describedby="emailHelp" name="giamgia" value="{{old('giamgia')??$data->GiamGia}}" placeholder="pl">
                                <label for="giamgia" style="color: #3d3d3d;margin-left: 4px;">Giảm giá (%)</label>                       
                        </div>
                        <div class="form-group col-md-6">
                            <input type="file" name="anh-secondary" class="form-control" value="{{$data->Anh}}">
                            <input type="text" class="input-primary" name="anh" value="{{$data->Anh}}" hidden> 
                            @error('anh')
                                <p class="message" style="color:red;font-size:12px;margin-bottom:0;">*{{$message}}</p>
                            @enderror                      
                        </div>
                        <div class="form-group col-md-4">
                             <img src="{{asset('clients/assets/images/products/'.$data->Anh)}}" alt="" class="demo-img" style="width:60%;">                 
                        </div>                                              
                        <div class="form-group col-md-12 form-floating">
                            <input type="text" class="form-control form-control-user"
                                id="thanhphan" aria-describedby="emailHelp" name="thanhphan" value="{{old('thanhphan')??$data->ThanhPhan}}" placeholder="pl">
                                <label for="thanhphan" style="color: #3d3d3d;margin-left: 4px;">Thành phần</label>                       
                        </div>
                        <div class="form-group col-md-12 form-floating">
                            <input type="text" class="form-control form-control-user"
                                id="hdsd" aria-describedby="emailHelp" name="hdsd" value="{{old('hdsd')??$data->HDSD}}" placeholder="pl">
                                <label for="hdsd" style="color: #3d3d3d;margin-left: 4px;">Hướng dẫn sử dụng</label>                       
                        </div>
                        <div class="form-group col-md-12 form-floating">
                            <input type="text" class="form-control form-control-user"
                                id="baoquan" aria-describedby="emailHelp" name="baoquan" value="{{old('baoquan')??$data->BaoQuan}}" placeholder="pl">
                                <label for="baoquan" style="color: #3d3d3d;margin-left: 4px;">Bảo quản</label>                       
                        </div>
                        <div style="color: #3d3d3d;margin-left: 4px;">Mô tả sản phẩm</div>
                        <div class="form-group col-md-12 form-floating">                                                                                   
                            <div id="editor"></div>                           
                            <input type="text" class="form-control form-control-user"
                                id="mota" aria-describedby="emailHelp" name="mota" placeholder="pl" value="{{old('mota')??$data->MoTa}}" hidden>
                        </div>                       
                        <button type="submit" class="btn btn-primary btn-user btn-block col-md-6 mt-5 mx-auto">
                            Cập nhật
                        </button>
                    </form>
                    <hr>                                 
                </div>                                                        
            </div>

        </div>

    </div>
@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
         $(document).ready(function(){
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
            var inputMT = document.getElementById('mota');
            quill.setText(inputMT.value);
            quill.on('text-change',() => {
            inputMT.value = quill.getText();        
            });
            $('input:file').change(function() {
                var pathVal = this.value.split('\\');
                $('.demo-img').attr('src','/clients/assets/images/products/'+pathVal[pathVal.length-1]);
                $('.input-primary').attr('value',pathVal[pathVal.length-1]);
            });
        });
    </script>
@endsection