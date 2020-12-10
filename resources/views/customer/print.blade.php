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
                    <p>Customr Name : <strong>{{ $customer->name }}</strong></p>
                    <p>Customr Phone : <strong>{{ $customer->phone }}</strong></p>
                    <p>Payment Code: <strong>{{ $payment['payment_code'] }}</strong>
                        <?php echo DNS1D::getBarcodeHTML($payment['payment_code'], 'C93'); ?>
                    </p>


                </div>
                <h4>Payment Info:</h4>
                <table>
                    <tr>
                        <th>Total Due</th>
                        <th>{{ $payment['befor_payment_amount'] }} Tk</th>
                    </tr>
                    <tr>
                        <th>Payment Amount</th>
                        <th>{{ $payment['payment_amount'] }} Tk</th>
                    </tr>
                    <tr>
                        <th>Update Due</th>
                        <th>{{ $payment['after_payment_amount'] }} Tk</th>
                    </tr>
                    <tr>
                        <th>Payment Date</th>
                        <th>{{ $payment['payment_date'] }}</th>
                    </tr>


                </table>

            </div>
       </div>
    </div>
</body>
</html>
