<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .wrapper{
            padding: 6px;
            /* background: rgb(247, 223, 223); */
        }
        /* .wrapper .inter-wrapper{

        } */
        .wrapper .top-bar{
            text-align: center;
        }



        .wrapper table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 6px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <div class="wrapper">
       <div class="inter-wrapper">
            <div class="top-bar">
                <h3>Zahid Super Shop</h3>
                <p>Barguna Sodor Upozila,Barguna</p>
            </div>
            <div class="order-details">
                <div class="customer-info">
                    <p>Customr Name : <strong>{{ $order->name }}</strong></p>
                    <p>Customr Phone : <strong>{{ $order->phone }}</strong></p>
                    <p>Order Date : <strong>{{ $order->order_date }}</strong></p>
                    <p>Order Code : {{ $order->order_code }}
                        <?php echo DNS1D::getBarcodeHTML($order->order_code, 'C93'); ?>
                    </p>

                </div>
                <h4>Order Info:</h4>
                <table>
                    <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    </tr>
                @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->barcode }}</td>
                            <td>{{ $item->product_qty }}</td>
                            <td>{{ $item->details_total_amount }}</td>
                        </tr>
                @endforeach
                        <tr>
                            <td>Total</td>
                            <td >{{ $order->total_product }}</td>
                            <td>{{ $order->total_amount }} Tk</td>
                        </tr>
                </table>

            </div>
            <div class="payment-details">
                <h4>Payment Info:</h4>
                <p>Method : <strong>{{ $order->payment_method }}</strong></p>
                <p>Total : <strong>{{ $order->total_amount }} Tk</strong></p>
                <p>Payable : <strong>{{ $order->payable_amount }} Tk</strong></p>
                <p>Due : <strong>{{ $order->due_amount }} Tk</strong></p>
            </div>
       </div>
    </div>
</body>
</html>
