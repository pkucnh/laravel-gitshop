<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thư liên hệ</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<div class="container" style="background: rgb(79, 79, 79);border-radius: 12px;padding:15px;">
		<div class="col-md-12" >

			<p style="text-align: center;color: #fff">Đây là email khách hàng phản hồi về website</p>
			<div class="row" style="background: #dd1a5b;padding: 15px;">

				
				<div class="col-md-6" style="text-align: center;color: #fff;font-weight: bold;font-size: 30px">
					<h4 style="margin:0">GITSTORE MÔ HÌNH ĐỒ CHƠI CHÍNH HÃNG</h4>
					<h6 style="margin:0">DỊCH VỤ BÁN HÀNG - VẬN CHUYỂN - NHẬP KHẨU CHUYÊN NGHIỆP</h5>
				</div>

				<div class="col-md-6 logo"  style="color: #fff">
                    <h4 style="color: rgb(255, 255, 255);text-transform: uppercase;">Thông tin người gửi</h4>
					<p>Người gửi:<strong style="color: rgb(255, 255, 255);text-decoration: underline;">{{$contact['name']}}</strong></p>
					<p>Email : <strong style="text-transform: uppercase;color:#fff">{{$contact['email']}}</strong></p>
					<p>Số điện thoại : <strong style="text-transform: uppercase;color:#fff">{{$contact['phone']}}</strong></p>
				</div>
				
				<div class="col-md-12">
					<p style="color:#fff;font-size: 17px;">Nội dung thông tin như sau:</p>
					<p style="color: white">Nội dung : <strong style="text-transform: uppercase;color:#fff">{{$contact['message']}}</strong></p>
					
				</div>

				{{-- <p style="color:#fff">Mọi chi tiết xin liên hệ website tại : <a target="_blank" href="#">Shop</a>, hoặc liên hệ qua số hotline : +84 981 799 175.Xin cảm ơn quý khách đã đặt hàng shop chúng tôi.</p> --}}

			</div>
		</div>
	</div>
</body>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
</html>