<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style> 
            body {
            font-family: DejaVu Sans, sans-serif; 
            }

            form {
            padding: 0;
            margin: 0;
            display: inline;
            }
            a, a:focus {
            color: #0071cc;
            text-decoration: none;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
            }

            a:hover, a:active {
            color: #005da8;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
            }

            a:focus, a:active,
            .btn.active.focus,
            .btn.active:focus,
            .btn.focus,
            .btn:active.focus,
            .btn:active:focus,
            .btn:focus,
            button:focus,
            button:active {
            outline: none;
            }

            p {
            line-height: 1.9;
            }

            blockquote {
            border-left: 5px solid #eee;
            padding: 10px 20px;
            }

            iframe {
            border: 0 !important;
            }

            h1, h2, h3, h4, h5, h6 {
            color: #0c2f54;
            }
            .row{
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: center;
            }
            .col-sm-4{
                width: 50%;
            }
            .table {
            color: #535b61;
            }

            .table-hover tbody tr:hover {
            background-color: #f6f7f8;
            }

            /* =================================== */
            /*  Helpers Classes
            /* =================================== */
            /* Border Radius */
            /* Text Size */
            .text-0 {
            font-size: 11px !important;
            font-size: 0.6875rem !important;
            }

            .text-1 {
            font-size: 12px !important;
            font-size: 0.75rem !important;
            }
            /* Line height */
            hr {
            opacity: 0.15;
            }

            .card-header {
            padding-top: .75rem;
            padding-bottom: .75rem;
            }

            /* Table */
            .table > :not(:last-child) > :last-child > * {
            border-bottom-color: inherit;
            }

            .table:not(.table-sm) > :not(caption) > * > * {
            padding: 0.75rem;
            }

            .table-sm > :not(caption) > * > * {
            padding: 0.3rem;
            }

            /* =================================== */
            /*  Layouts
            /* =================================== */
            .invoice-container {
            margin: 15px auto;
            padding: 70px;
            max-width: 850px;
            background-color: #fff;
            border: 1px solid #ccc;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            -o-border-radius: 6px;
            border-radius: 6px;
            }
            /* =================================== */
            /*  Extras
            /* =================================== */

            .text-secondary {
            color: #0c2f55 !important;
            }

            .text-primary {
            color: #0071cc !important;
            }
            table {
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
    </style>
</head>
<body>
    <div class="container-fluid invoice-container">
        <main>
            <div class="row">
                <div class="col-sm-4"> <strong>Số đơn hàng:</strong> {{$dataOrder['SoDH']}}</div>
                <p class="col-sm-4">Ngày đặt hàng: {{$dataOrder['NgayDat']}}</p>      
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Gửi từ: Mixi siêu thị của mọi nhà</strong>
                </div>
                <div class="col-sm-6 order-sm-0"> <strong>Người đặt hàng:</strong>
                <p>
                {{$dataOrder['HoTen']}}<br />
                Địa chỉ: {{$dataOrder['DiaChi']}}<br />
                Số điện thoại: {{$dataOrder['SDT']}}<br />
                </p>
                </div>
            </div>
            @php
                $STT =1;
            @endphp
            <div class="card">
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                    <thead class="card-header">
                        <tr>
                            <td class="col-3"><strong>STT</strong></td>
                            <td class="col-4"><strong>Tên sản phẩm</strong></td>
                            <td class="col-2 text-center"><strong>Số lượng</strong></td>
                            <td class="col-1 text-center"><strong>Giá</strong></td>
                            <td class="col-2 text-end"><strong>Thành tiền</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $item)
                            <tr>
                                <td class="col-3">{{$STT++}}</td>
                                <td class="col-4 text-1">{{$item['TenSP']}}</td>
                                <td class="col-2 text-center">{{$item['SoLuong']}}</td>
                                <td class="col-1 text-center">{{$item['Gia']}} VND</td>
                                <td class="col-2 text-end">{{$item['SoLuong']*$item['Gia']}} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="card-footer">
                        <tr>
                        <td colspan="4" class="text-end border-bottom-0"><strong>Tổng tiền:</strong></td>
                        <td class="text-end border-bottom-0">{{$dataOrder['TongTien']}}</td>
                        </tr>
                    </tfoot>
                    </table>
                </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>