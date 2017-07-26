<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(! current_user_can('administrator')) exit;

// if this fails, check_admin_referer() will automatically print a "failed" page and die.
if ( ! empty( $_POST ) && check_admin_referer( 'nonce_verify', 'chkNonce' ) ) {
   // process form data, e.g. update fields
}

if(isset($_POST['submit']))
{
	$f = $_POST['LFS_fonts'];
	if($f=== ''){
		$f = 'phetsarath';
	}
	
	$safe_f = sanitize_text_field($f);
	update_post_meta($post->ID,'LFS_fonts',$safe_f);
	update_option("LFS_lao_font",$safe_f);
	echo '<div id="message" class="updated fade"><p><h1>ອັບເດດແລ້ວ!</h1></p></div>';
	echo '<script>location.reload();</script>';
}
?>

<?php
global $wpdb;
$tbl = $wpdb->options;
$chosen = $wpdb->get_row( "SELECT * FROM $tbl WHERE option_name='LFS_lao_font'");

if($chosen->option_value === "phetsarath")
{
	$fname = "Phetsarath OT";
}
else if($chosen->option_value === "LaoSansPro")
{
	$fname = "Lao Sans Pro";
}
else if($chosen->option_value === "Saysettha")
{
	$fname = "Saysettha OT";
}
else if($chosen->option_value === "Souliyo")
{
	$fname = "Souliyo Key";
}
else if($chosen->option_value === "Dhyana")
{
	$fname = "Dhyana";
}
else if($chosen->option_value === "NotoSerifLao")
	$fname = "Noto Serif Lao";


?>

<div class="wrap">
<h1><span class="dashicons dashicons-admin-customizer"></span> ຕັ້ງຄ່າ Lao Fonts</h1>
<br>
<br>

<img src="<?= esc_url(plugins_url('laoflag.png',__FILE__)); ?>" width="150" height="150">
<h1 stlye="text-shadow: 2px 2px #ff0000;"><u>ພາສາລາວ ສຳລັບ Wordpress</u></h1>
<p style="font-size:22px">ທ່ານກຳລັງໃຊ້ຟ້ອນ <strong><span style="color:red"><?= esc_html($fname); ?></span></strong></p>
<br>
<form method="post">
<table style="font-size:22px">
	<tr>
		<td>ເລືອກ Font ທີ່ຕ້ອງການ: </td>
		<td>
			<select style="font-size:18px;width:300px;" name="LFS_fonts" id="LFS_fonts">
				<option value="phetsarath">Phetsarath OT</option>
				<option value="NotoSerifLao">Noto Serif Lao</option>
				<option value="LaoSansPro">Lao Sans Pro</option>
				<option value="Saysettha">Saysettha OT</option>
				<option value="Souliyo">Souliyo Key</option>
				<option value="Dhyana">Dhyana</option>
			</select>
		</td>
	<tr>
	<tr>
		<td><?php wp_nonce_field( 'nonce_verify', 'chkNonce' ); ?></td>
		<td><input type="submit" value="ປ່ຽນ Font" name="submit" style="font-size:18px"></td>
	</tr>
</table>
</form>
<br>
<p style="font-weight:bold;font-size:18px;">ພັດທະນາໂດຍ : ທ.ແສງໄຊ ໄຊຍະຈັກ</p>
<p><a href="http://frankkung.com/" target="_blank"><img src="<?= esc_url(plugins_url('Globe.png',__FILE__)); ?>" width="50" height="50"></a> <a href="http://facebook.com/frank.xayachack" target="_blank"><img src="<?= esc_url(plugins_url('facebook.png',__FILE__)); ?>" width="50" height="50"></a></p>
<p style="font-weight:bold;font-size:18px;">ສົ່ງເສີມການພັດທະນາ:</p>
<p><img src="<?= esc_url(plugins_url('bcelone.png',__FILE__)); ?>" width="120px" height="120px"></p>
<p style="font-weight:bold;font-size:18px;">ຊື່ບັນຊີ: SENGXAY XAYACHACK MR</p>
<p style="font-weight:bold;font-size:18px;">ເລກບັນຊີ: 0301-2010-0370-1520-01</p>
</div>