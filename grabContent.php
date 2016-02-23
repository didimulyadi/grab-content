<?php
 
	function bacaHTML($url){
	    // inisialisasi CURL
	    $data = curl_init();
	    // setting CURL
	    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($data, CURLOPT_URL, $url);
	    // menjalankan CURL untuk membaca isi file
	    $hasil = curl_exec($data);
	    curl_close($data);
	    return $hasil;
	}



//mengambil data dari kompas 
$bacaHTML = bacaHTML("http://www.detik.com/");
//untuk yang error pake cURL di hosting ganti jadi ini
//$bacaHTML = file_get_contents("http://www.kompas.com");
//membuat dom dokumen
$dom = new DomDocument();
 
//mengambil html dari kompas untuk di parse
@$dom->loadHTML($bacaHTML); 



//nama class yang akan dicari
$classname="list_berita_2";
 
//mencari class memakai dom query
$finder = new DomXPath($dom);
$spaner = $finder->query("//*[contains(@class, '$classname')]");



//mengambil data dari class yang pertama
$span = $spaner->item(0);
 
//dari class pertama mengambil 2 elemen yaitu a yang menyimpan judul dan link dan span yang menyimpan tanggal
$link =  $span->getElementsByTagName('a');
$tanggal = $span->getElementsByTagName('span');

//persiapkan array untuk diambil datanya
$data =array();
foreach ($link as $val){ 
    $data[] = array(
        'judul' => $link->item($no)->nodeValue,
        'link' => $link->item($no)->getAttribute('href'),
        'tanggal' => $tanggal->item($no)->nodeValue,
    );
    $no++;
}
 
?>




<style>
    table,th,td{
        border:1px solid #000;
        font-size:12px;
    }
</style>
 
<h2>Grabbing dari detik</h2>
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


