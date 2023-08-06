<?php
error_reporting(0);
$flag = 0;
if(!empty($_POST["ho_ten"]) && !empty($_POST["email"]) && !empty($_POST["ten_dn"]) && !empty($_POST["mat_khau"]))
{
	$ho_ten = $_POST["ho_ten"];
	$email = $_POST["email"];
	$ten_dn = $_POST["ten_dn"];
	$mat_khau = $_POST["mat_khau"];

  $data = array(
    'ho_ten' => $ho_ten,
    'email' => $email,
    'ten_dn' => $ten_dn,
    'mat_khau' => $mat_khau,
  );
  $json_data = json_encode($data);
  $thongtin = setcookie("user",$json_data, time()+ 3600, '/');

if (isset($_COOKIE["user"])) {
  $json_data = $_COOKIE["user"];

  $xuat = json_decode($json_data, true);

}
$flag = 1;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cookie</title>
<style>
    body{
        font-family: Lucida Sans Unicode, Lucida Grande, sans-serif;
    } 
    #button {
            background-color: #800080;
            color: white;
            padding: 5px 10px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
        }
</style>
</head>

<body bgcolor="#E6E6FA">
    <form id="form1" name="form1" method="post" action="cookie.php">
        <table width="400" border="0" cellpadding="5" align="center" cellspacing="0">
            <tr bgcolor="#6600CC">
                <td colspan="2" align="center"><strong><font color="#ffffff">THÔNG TIN ĐĂNG NHẬP</font></strong></td>
            </tr>
            <tr bgcolor="#CCCCFF">
                <td width="135"><strong><font color="#000077">Họ và tên:</font></strong></td>
                <td width="232"><label for="textfield9"></label>
            <input name="ho_ten" type="text" id="textfield9" style="background-color:#FFE1FF" value="<?php echo $xuat["ho_ten"];?>" size="30"/></td>
            </tr>
            <tr bgcolor="#CCCCFF">
                <td><strong><font color="#000077">Email:</font></strong></td>
                <td><label for="textfield10"></label>
            <input name="email" type="text" id="textfield10" style="background-color:#FFE1FF" value="<?php echo $xuat["email"];?>" size="30"/></td>
            </tr>
            <tr bgcolor="#CCCCFF">
                <td><strong><font color="#000077">Tên Đăng nhập:</font></strong></td>
                <td><label for="textfield11"></label>
            <input name="ten_dn" type="text" id="textfield11" style="background-color:#FFE1FF" value="<?php echo $xuat["ten_dn"];?>" size="30"/></td>
            </tr>
            <tr bgcolor="#CCCCFF">
                <td><strong><font color="#000077">Mật khẩu:</font></strong></td>
                <td><label for="textfield12"></label>
            <input name="mat_khau" type="password" id="textfield12" style="background-color:#FFE1FF" value="<?php echo $xuat["mat_khau"];?>" size="30"/></td>
            </tr>
            <tr bgcolor="#CCCCFF">
                <td colspan="2" align="center"><input type="submit" name="Submit" id="button" value="Đăng nhập"></td>
            </tr>
        </table>
    </form>

    <p align="center"><font color=#FFBBFF></font></p>
    <form id="form" name="form" method="post" action="">
        <?php
            if($flag==1){
                echo "<table width='400' border='0' align='center' cellpadding='2' cellspacing='2' bgcolor='#FFBBFF' class='style10'>
                <tr bgcolor='##FFBBFF' align='center'><td>";
                echo "<font color='#ffffff'>Xin chào ". $xuat['ho_ten']."<br>";
		        echo "Email: ".$xuat['email']."<br>";
		        echo "Tên đăng nhập: <b><i> ".$xuat['ten_dn']."</b></i><br>";
		        echo "Mật khẩu: ".$xuat['mat_khau']."<br>";
                echo "<a href='cookie_doc.php'>Click here to from cookie!</a>";
		        echo "</td></tr></table>";
            }
        ?>
    </form>
</body>
</html>