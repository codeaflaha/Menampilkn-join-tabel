<html>
   <head>
      <title>Menampilkan Data Tabel MySQL Dengan mysqli_fetch_array</title>
      <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
   </head>
   <body>
      <h3>Tabel Pelanggan (mysqli_fetch_array)</h3>
      <table>
         <thead>
            <tr>
               <th>ID Pelnggan</th>
               <th>Nama</th>
               <th>Email</th>
            </tr>
         </thead>
         <?php
            include 'koneksi.php';		
            $sql = 'SELECT  * FROM pelanggan';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['id_pelanggan'] ?></td>
               <td><?php echo $row['nama'] ?></td>
               <td><?php echo $row['email'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      <h3>Tabel Barang (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>ID Barang</th>
               <th>Nama Barang</th>
               <th>Harga</th>
               <th>Stok</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM barang';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
               <td><?php echo $row[3] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Inner Join (mysqli_fetch_assoc)</h3>
      <h4> (mampilkan semua data pelanggan dari tabel pelanggan yang melakukan Pesanan)</h4>
      <table>
         <thead>
            <tr>
               <th>ID Pelanggan</th>
               <th>Nama </th>
               <th>tgl transaksi</th>
               <th>Total transaksi</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT pl.id_pelanggan, nama, tgl_transaksi, total_transaksi
            FROM pelanggan pl
            JOIN penjualan pn USING(id_pelanggan)';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['id_pelanggan'] ?></td>
               <td><?php echo $row['nama'] ?></td>
               <td><?php echo $row['tgl_transaksi'] ?></td>
               <td><?php echo $row['total_transaksi'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      </table>
      <h3>left outer Join </h3>
      <h4> (mampilkan semua data pelanggan dari tabel pelanggan beserta data transaksinya dari tabel penjulan )</h4>
      <table>
         <thead>
            <tr>
               <th>ID Pelanggan</th>
               <th>Nama </th>
               <th>tgl transaksi</th>
               <th>Total transaksi</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT pl.id_pelanggan, nama, tgl_transaksi, total_transaksi
            FROM pelanggan pl
            LEFT JOIN penjualan USING(id_pelanggan)';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['id_pelanggan'] ?></td>
               <td><?php echo $row['nama'] ?></td>
               <td><?php echo $row['tgl_transaksi'] ?></td>
               <td><?php echo $row['total_transaksi'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
   </body>
</html>