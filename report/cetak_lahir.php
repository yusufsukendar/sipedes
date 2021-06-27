<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['lahir'];
	}

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    <main>
        <header>
            <!-- logo -->
            <div class="logo1">
			<img class="ciamis" src="../dist/img/izin.png">
            </div>
            <div class="kop">
                <h1>PEMERINTAH KABUPATEN CIAMIS</h1>
                <h2>KECAMATAN CISAGA</h2>
                <H2>DESA CISAGA</H2>
                <p>Jln. Raya Ciamis-Banjar No.231 CISAGA 46386 </p>

			<?php
				$sql_tampil = "select * from tb_lahir where id_lahir='$id'";
				$query_tampil = mysqli_query($koneksi, $sql_tampil);
				$no=1;
				while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
			?>
            </div>
        </header>
        <div class="line"></div>

        <div class="nomor__surat">
            <h1>SURAT KETERANGAN KELAHIRAN</h1>
            <h2>Nomor : 
			<?php echo $data['id_lahir']; ?>/Ket.Kelahiran/
			<?php echo $tanggal; ?>
			</h2>
        </div>

        <article>
            <p class="pembuka">&#9; Yang bertandatangan dibawah ini Kepala Desa Cisaga, Kecamatan Cisaga, Kabupaten Ciamis, dengan ini menerangkan
                bahawa :</p>

            <div class="table">
                <table>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>
								<?php echo $data['nama']; ?>
							</td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
								<?php if ($data['jekel'] == "LK"){ ?>
										<?php echo 'Laki-Laki'; ?>
										<?php	} else { ?>
											<?php	echo 'Perempuan'; ?>
											<?php	} ?>
							</td>
                    </tr>

                    <tr>
                        <td>Tgl lahir</td>
                        <td>:</td>
                        <td>
							<?php $s = $data['tgl_lh']; ?>
							<?php $date = strtotime($s); ?>
							
							<?php echo $data['tempat_lh'] . " - " . date('d/F/Y ', $date);; ?>	
						</td>
                </tr>
                    </tbody>
					<?php } ?>
                    </table>
            </div>

			<p class="penutup">&#9; Adalah benar-benar warga Desa Cisaga, Kecamatan Cisaga, Kabupuaten Ciamis.</p>
			<p class="penutup">&#9; Demikian Surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</p>
        </article>

				<div class="tanda__tangan">
					<p>	Cisaga, 
						<?php echo $tgl; ?>	
					</p>
					<p class="space__for__sign">Kepala Desa Cisaga</p>
					<p>Enip</p>
				</div>
    </main>
</body>
</html>

	<script>
		//window.print();
	</script>

</body>

</html>