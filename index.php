<?php require_once "Mobile_Detect.php"; 
$detect = new Mobile_Detect;?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/master.css">
<link rel="apple-touch-icon" sizes="152x152" href="gkv.png">
<title>Hoang Si URL</title>
</head>






<?php include('connect.php'); ?>



<script>// Opera 8.0+
    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
 
    // Firefox 1.0+
    var isFirefox = typeof InstallTrigger !== 'undefined';
 
    // Safari 3.0+ "[object HTMLElementConstructor]" 
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
 
    // Internet Explorer 6-11
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
 
    // Edge 20+
    var isEdge = !isIE && !!window.StyleMedia;
 
    // Chrome 1+
    var isChrome = !!window.chrome && !!window.chrome.webstore;
 
    // Blink engine detection
    var isBlink = (isChrome || isOpera) && !!window.CSS;
	
 	
	if(isSafari) {
		<?php
	// Lấy dữ liệu từ cơ sở dữ liệu
$sql_query='SELECT * FROM url';
$result=mysqli_query($sql_connect,$sql_query);
 
$arr_result = array();

while ($row=mysqli_fetch_assoc($result)) { ?>
<?php if($row['url']!='') {  ?>

window.location.href = '<?php echo  $row['url']; ?>';

<?php } else {echo 'Vui lòng nhập đường dẫn.'; } ?>
<?php } ?>

	}
	if(isIE) {

<?php
	// Lấy dữ liệu từ cơ sở dữ liệu
$sql_query='SELECT * FROM url';
$result=mysqli_query($sql_connect,$sql_query);
 
$arr_result = array();

while ($row=mysqli_fetch_assoc($result)) { ?>
<?php if($row['url']!='') {  ?>

window.location.href = '<?php echo  $row['url']; ?>';

<?php } else {echo 'Vui lòng nhập đường dẫn.'; } ?>
<?php } ?>
	}

	
	</script>


<?php if ( $detect->isMobile() ) { ?>
<?php
	// Lấy dữ liệu từ cơ sở dữ liệu
$sql_query='SELECT * FROM url';
$result=mysqli_query($sql_connect,$sql_query);
 
$arr_result = array();

while ($row=mysqli_fetch_assoc($result)) { ?>
<?php if($row['url']!='') {  ?>
<script>
window.location.href = '<?php echo  $row['url']; ?>';
</script>
<?php } else {echo 'Vui lòng nhập đường dẫn.'; } ?>
<?php } ?>
<?php } else { ?>
<body id="wrapper">
<div class="container"  id="input_url" >
<?php
	// Lấy dữ liệu từ cơ sở dữ liệu
$sql_query='SELECT * FROM url';
$result=mysqli_query($sql_connect,$sql_query);
 
$arr_result = array();

while ($row=mysqli_fetch_assoc($result)) { ?>
<form method="post" action="#">
    <div class="input-group">
 <input id="url" type="text" class="form-control" name="url" placeholder="Nhập Url..."  value="<?php echo  $row['url']; ?>" >
        <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="submit_url">Go!</button>
        </span> </div>
</form>
<?php } ?>
</div>

<p style="position:fixed;left:0;width:100%;bottom:0;background:#f1f1f1;padding:10px 0; margin:0;font-size:12px;" class="text-center">1 sản phẩm của <a href="https://hoangsi.com/" target="_blank">Hoang Si</a></p>

<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	
	  $('#submit_url').click(function() {
       	var url = $('#url').val(); 
	  	$.ajax({
			type:"POST",
			url: "https://url.gkv.vn/update.php",  
			data:{url: url},
			success: function(success){
				alert('Done!');
			}
		})
	 });




});
</script>
<script>
jQuery.fn.putCursorAtEnd=function(){return this.each(function(){var t=$(this),n=this;if(t.is(":focus")||t.focus(),n.setSelectionRange){var o=2*t.val().length;setTimeout(function(){n.setSelectionRange(o,o)},1)}else t.val(t.val());this.scrollTop=999999})},
function(){var t=$("#url");t.putCursorAtEnd().on("focus",function(){t.putCursorAtEnd()})}(); // id focus
</script>
</body>
<?php } ?>
</html>
