<?php
$home_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$title =  'Chuyển số thành mã vạch code 128';
$desc = 'Cung cấp dịch vụ chuyển số thành mã vạch CODE 128, in mã vạch ra giấy, có thể hoạt động với số lượng lớn, nhanh, ổn định phù hợp với mọi thiết bị.';
$favicon = 'favicon.png';
$keyword = 'chuyển số thành barcode, code 128, in mã vạch, chuyển số thành barcode 128';
$author = 'IT Miền Bắc 2';
$image = $home_url.'img/image-barcode128.jpg';
$verification = '';
$ID_googletagmanager = '165867589-1';
?>
<!DOCTYPE html>
<html lang="vi">
<head>

<title><?php echo $title; ?></title>
<meta name="name" content="content">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="https://gmgp.org/xfn/11" />
<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/png"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- SEO -->
<link rel="canonical" href="<?php echo $home_url;?>" />
<meta name="author" content="<?php echo $author; ?>">
<meta name="keywords" content="<?php echo $keyword; ?>">
<meta name="description" content="<?php echo $desc; ?>"/>
<meta name="robots" content="noodp,index,follow" />
<meta name="revisit-after" content="1 days" />
<meta http-equiv="content-language" content="vi" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="geo.region" content="VN-DN" />
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $desc; ?>" />
<meta property="og:url" content="https://hostvn.net/" />
<meta property="og:site_name" content="barcode.jthp.net" />
<meta property="og:image" content="<?php echo $image; ?>" />
<meta property="og:image:secure_url" content="<?php echo $image; ?>" />
<meta property="og:image:width" content="254" />
<meta property="og:image:height" content="182" />
<?php if($verification != ''){ ?>
<!-- google-site-verification -->
<meta name="google-site-verification" content="<?php echo $verification; ?>" />
<?php } ?>
<link href="css/option.css?ver=1.2" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/JsBarcode.all.min.js" type="text/javascript"></script>
<script src="js/option.js?ver=1.2" type="text/javascript"></script>
<!-- Global site tag (gtag.0js) - Google Analytics -->
<?php if($ID_googletagmanager != ''){ ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-<?php echo $ID_googletagmanager;?>"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-<?php echo $ID_googletagmanager;?>');
</script>
<?php } ?>
<!-- //SEO -->

</head>
<body>
	<div class="body">
		<div class="table">
			<h1 class="title">Chuyển số thành mã Barcode</h1>
			<form action="" method="post" accept-charset="utf-8">
				<div class="table-box">
					<div class="input">
						<textarea rows="10" cols="50" name="input" placeholder="Nhập số cần chuyển"><?php if(isset($_POST['input']) and $_POST['input'] != null){  echo $_POST['input']; } ?></textarea>
						<label>Kiểu dữ liệu</label>
						<select name="input-type">
							<option value="1" <?php echo (isset($_POST['input-type']) and $_POST['input-type'] == 1)? 'selected' : ''; ?>>Chỉ có số</option>
							<option value="2" <?php echo (isset($_POST['input-type']) and $_POST['input-type'] == 2)? 'selected' : ''; ?>>Số & chữ cái</option>
						</select>
						<div class="checkbox-wap">
							<label>Số barcode trên 1 dòng</label>
							<select name="number">
								<option value="3" <?php echo (isset($_POST['number']) and $_POST['number'] == 3) ? 'selected' : ''; ?>>3 dòng</option>
								<option value="4" <?php echo (!isset($_POST['number']) or (isset($_POST['number']) and $_POST['number'] == 4)) ? 'selected' : ''; ?>>4 dòng</option>
								<option value="5" <?php echo (isset($_POST['number']) and $_POST['number'] == 5) ? 'selected' : ''; ?>>5 dòng</option>
							</select>
						</div>
					</div>
					<div class="submit">
						<button type="submit">OK</button>
					</div>
				</div>
			</form>
		</div>
		<button id="doPrint">Print</button>
		<p>Chú ý: 1 mặt giấy là <b>50 mã Barcode</b> với In giấy <b>A4</b> và Tỉ lệ <b>mặc định</b></p>
		<div class="dont">
		Nếu cần hỗ trợ hay liên hệ qua <a  target="_blank" href="<?php echo $home_url;?>img/zalo.png" title=""><b>ZALO</b> <img src="<?php echo $home_url;?>img/Logo-Zalo.png" alt="zalo"></a> <b></b> :D. Chân thành cảm ơn !
		</div>
		<div class="ket-qua"><b>Kết quả:</b></div>
		<div id="print">
			<?php $type = (isset($_POST['input-type']))? $_POST['input-type'] : ''; ?>
			<div id="barcode" class="line-<?php echo (isset($_POST['number']))? $_POST['number'] : '4'; ?>">
			<?php
			if(isset($_POST['input']) and isset($_POST['input-type']) and $_POST['input'] != null){ 
				$data = explode("\n", $_POST['input']);
				foreach ($data as $key => $value){
					$value = preg_replace('/\s+/','',$value); //remove space
					if($value == '') continue;
					if($type == 1 and !is_numeric($value)) continue; //leave number only
					if($type == 2) $value = preg_replace('/[^A-Za-z0-9.]+/', '', $value); //removes ALL characters
					?>
					<div class="barcode-item"><svg class="barcode" data-barcode="<?php echo $value;?>"></svg></div>
				<?php }
			}else{
				echo '<p>Không có kết quả</p>';
			} ?>
			</div>
		</div>
		<div class="footer"><span>Devby <?php echo $author; ?></span></div>
	</div>
<script type="text/javascript">
	jQuery('#barcode .barcode').each(function() {
		var $data = jQuery(this).attr('data-barcode');
		$target = '[data-barcode="'+$data+'"]';
		//alert($target);
		JsBarcode($target, $data);
	});
	document.getElementById("doPrint").addEventListener("click", function() {
		var printContents = document.getElementById('print').innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
    document.body.innerHTML = originalContents;
	});
</script>
</body>
</html>