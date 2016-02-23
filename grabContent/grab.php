<?php 
    include "func.php";
?>

<style>
    table,th,td{
        border:1px solid #000;
        font-size:12px;
    }
</style>
 
<h2>Grabbing dari Kompas.com</h2>
<table>
    <thead>
        <th>No</th>    
        <th>Judul</th>    
        <th>Link</th>    
        <th>Tanggal</th>    
    </thead>
    <tbody>
        <?php
			$no=1;
			foreach($data as $val)
			{
			        ?>
			        <tr>
			            <td><?php echo $no;?></td>
			            <td><?php echo $val['judul'];?></td>
			            <td><?php echo $val['link'];?></td>
			            <td><?php echo $val['tanggal'];?></td>
			        </tr>
			        <?php
			    $no++;
			}
        ?>
    </tbody>
</table>
