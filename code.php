<?php 

$GithubRawURI= "https://raw.githubusercontent.com/UserName/GitName/FileName.php”; 

$ch = curl_init(); 

curl_setopt($ch, CURLOPT_URL, $GithubRawURI); 

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

$data = curl_exec($ch); 

curl_close($ch); 

 

//remove the "<?php" from the file before running it 

$data = substr($data, 5); 

 

eval ($data); 