<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.harnishdesign.net/html/koice/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Apr 2021 14:53:56 GMT -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://demo.harnishdesign.net/html/koice/images/favicon.png" rel="icon"/>
    <title>General Invoice - Koice</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
    ======================= -->
    <link rel="stylesheet" type="text/css" href="http://demo.harnishdesign.net/html/koice/vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="http://demo.harnishdesign.net/html/koice/vendor/font-awesome/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="http://demo.harnishdesign.net/html/koice/css/stylesheet.css"/>
</head>
<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center">
                <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
                    <a href="">
                        <h1>S<span style="color: #d20000">y</span>ndash</h1>
                    </a>
                </div>
                <div class="col-sm-5 text-center text-sm-right">
                    <h4 class="text-7 mb-0">Invoice</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6"><strong>Date:</strong> {{ date('d/m/Y') }}</div>
                <div class="col-sm-6 text-sm-right"><strong>Invoice No:</strong> {{ invoice_num($order->id, $order->id) }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-sm-right order-sm-1"><strong>Pay To:</strong>
                    <address>
                        {{ $order->shipping->first_name . ' ' .$order->shipping->last_name }}<br/>
                        {{ $order->payment->type }}<br/>
                        mdmunnakhan85@gmail.com
                    </address>
                </div>
                <div class="col-sm-6 order-sm-0"><strong>Invoiced To:</strong>
                    <address>
                        {{ $order->shipping->first_name . ' ' .$order->shipping->last_name }}<br/>
                        {{ $order->shipping->address }}<br/>
                        {{ "Bangladesh" }}
                    </address>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="card-header">
                                <tr>
                                    <td class="col-3 border-0"><strong>Service</strong></td>
                                    <td class="col-4 border-0"><strong>Description</strong></td>
                                    <td class="col-2 text-center border-0"><strong>Rate</strong></td>
                                    <td class="col-1 text-center border-0"><strong>QTY</strong></td>
                                    <td class="col-2 text-right border-0"><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sum = 0;
                                @endphp
                                @foreach($order->order_info as $items)
                                    <tr>
                                        <td class="col-3 border-0">{{ $items->product_name }}</td>
                                        <td class="col-4 text-1 border-0">{{ $items->product->description }}</td>
                                        @php
                                            $special_price = false;
                                            if ($items->product->special_price_form <= date('Y-m-d') && $items->product->special_price_to >= date('Y-m-d')){
                                                $special_price = true;
                                            }
                                        @endphp
                                        <td class="col-2 text-center border-0">{{ $special_price == true ?  $items->product->special_price:$items->product->selling_price}}</td>
                                        <td class="col-1 text-center border-0">{{ $items->product_qty }}</td>
                                        <td class="col-2 text-right border-0">{{ number_format($items->product_price) }} &#2547</td>
                                        @php
                                            $sum = $items->product_qty * $items->product_price
                                        @endphp
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="card-footer">
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Sub Total:</strong></td>
                                    <td class="text-right">{{ $sum }} &#2547</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                    <td class="text-right">{{ number_format($sum) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
            <div class="btn-group btn-group-sm d-print-none"><a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a href="#"
                                                                                                                                                                                                 class="btn btn-light border text-black-50 shadow-none"><i
                        class="fa fa-download"></i> Download</a></div>
        </footer>
    </div>
</body>

<!-- Mirrored from demo.harnishdesign.net/html/koice/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Apr 2021 14:53:56 GMT -->
</html>
