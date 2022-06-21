<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Helmel</title>
</head>

<body>
    <div class="mailContent" style= "width: 600px; margin: 0 auto;">
        <div class="title_mail" style="">
            <h1>Royal Helmel</h1>
        </div>
        <div class="thanks">
            <h3 style="font-size: 16px; font-weight: 600;">
                Cám ơn bạn đã mua hàng!
            </h3>
            <p style="font-size: 16px;">
                Xin chào {{$userName}}, Chúng tôi đã nhận được đơn đặt hàng của bạn và sẵn sàng để vận chuyển. Chúng tôi sẽ thông báo cho bạn khi đơn hàng được gửi đi.
            </p>
        </div>
        <div class="cartContent">
            <table style="width: 100%; border: 1px solid #ccc; border-collapse: collapse;">
                <tr>
                    <th style="font-size: 20px; font-weight: 700; border: 1px solid #ccc; border-collapse: collapse;" colspan="3">
                        Thông tin đơn hàng
                    </th>
                </tr>
                <tr style="border: 1px solid #ccc; border-collapse: collapse;">
                    <th style="font-size: 16px; border: 1px solid #ccc; border-collapse: collapse;">
                        Sản phẩm
                    </th>
                    <th style="font-size: 16px; border: 1px solid #ccc; border-collapse: collapse;">
                        Số lượng
                    </th>
                    <th style="font-size: 16px; border: 1px solid #ccc; border-collapse: collapse;">
                        Thành tiền
                    </th>
                </tr>
                @foreach ($cart as $key => $value)
                <tr style="border: 1px solid #ccc; border-collapse: collapse;">
                    <td style="font-size: 16px; border: 1px solid #ccc; border-collapse: collapse;  padding-left: 12px;">
                        <p style="font-size: 15px; font-weight: 600;">{{$value['productDetail_name']}}</p>
                        <p>Size: {{$value['productDetail_size']}}</p>
                        <p>Màu: {{$value['color']}}</p>
                        <p>Giá: {{number_format($value['productDetail_price'],0, ',', '.')}} đ</p>
                    </td>
                    <td style="font-size: 16px; text-align: center; border: 1px solid #ccc; border-collapse: collapse;">
                        {{$value['productDetail_quantity']}}
                    </td>
                    <td style="font-size: 16px; text-align: right; border: 1px solid #ccc; border-collapse: collapse;">
                        {{number_format($value['productDetail_price']*$value['productDetail_quantity'],0, ',', '.')}} đ
                    </td>
                </tr>
                @endforeach
                <tr style="border: 1px solid #ccc; border-collapse: collapse;">
                    <td style="font-size: 16px; font-weight: 600; border: 1px solid #ccc; border-collapse: collapse; padding-left: 12px;" colspan="2">
                        TỔNG GIÁ TRỊ
                    </td>
                    <td style="font-size: 16px; font-weight: 600; text-align: right; border: 1px solid #ccc; border-collapse: collapse;">
                        {{number_format($totalPrice,0, ',', '.')}} đ
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>