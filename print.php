<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
Tiket Pemesanan Bus Budiman <br><br>
<a href="javascript:Clickheretoprint()">Print</a>
<div id="print_content" style="width: 400px;">
<strong>Detail Pemesanan Tiket</strong><br><br>
<?php
include('db.php');
$id=$_GET['id'];
$setnum=$_GET['setnum'];
$result = mysql_query("SELECT * FROM customer WHERE transactionum='$id'");
while($row = mysql_fetch_array($result))
	{
		echo 'Nomor Transaksi: '.$row['transactionum'].'<br>';
		echo 'Nama: '.$row['fname'].' '.$row['lname'].'<br>';
		echo 'Alamat: '.$row['address'].'<br>';
		echo 'Kontak: '.$row['contact'].'<br>';
		echo 'Total Harga: '.$row['payable'].'<br>';
	}
$results = mysql_query("SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysql_fetch_array($results))
	{
		$ggagaga=$rows['bus'];
		echo 'Jurusan & Tipe Bus: ';
		$resulta = mysql_query("SELECT * FROM route WHERE id='$ggagaga'");
		while($rowa = mysql_fetch_array($resulta))
			{
			echo $rowa['route'].'     & '.$rowa['type'];
			$time=$rowa['time'];
			}
		echo '<br>';
		echo 'Waktu Pemberangkatan: '.$time;
		echo '<br>';
		echo 'Nomor Kursi: '.$setnum.'<br>';
		echo 'Tanggal Keberangkatan: '.$rows['date'].'<br>';
		
	}
?>
</div>
<a href="index.php">Beranda</a>