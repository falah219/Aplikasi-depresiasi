<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style type="text/css"> 
            * {
                margin:0; 
                padding:0;
            }

            .wrapper1 {
				width: 940px;
				margin: 20px auto 20px auto;
				border: 3px solid #000000;
				background-color: #ffffff;}

            body{
                background-color: bisque;
            }    

            header {
            height: 140px;
            background-color: aliceblue;
            }

            header h5 {
            padding: 0 15;
            font-size: 50px;
            font-family: cursive;
            color: crimson;
            }

            header h2{
            padding: 0 15px;
            font-size: 25px;
            font-family: cursive;
            color: crimson;
            }

            nav {
            text-align: center;
            width: 100%;
            font-family: arial;
            } 

            nav ul {
            background:#37988e;
            list-style: none;
            position: relative;
            display: inline-table;
            width: 100%;
            }

            nav ul li{
            float:left;
            }

            nav ul li:hover{
            background:#d68d9a;
            }

            nav ul li:hover a{
                color:#000;
            }

            nav ul li a{
                display: block;
                padding: 7;
                color: #fff;
                text-decoration: none;
            }
            article{
                width: 98%;
                padding-top: 5%;
                padding-left: 10;
            }

            article p{
                text-align: justify;
            }
            article ul{
            padding-left: 15;
            padding-right: 15;
            }
        </style>
</head>
<body>
<div class="wrapper1">
    
    <?php
        $perolehan=null;
        $residu=null;
        $umur=null;
    ?>
        <div class="rows">
        <form action="reducing_balance.php" method="get">
            <h2><b><center> PERHITUNGAN DEPRESIASI </center></b></h2>
            <div class="form-group">
                <label>Harga Perolehan:</label>
                <input type="text" name="perolehan" class="form-control" value="<?php echo $perolehan; ?>" required>
            </div>
            <div class="form-group">
                <label>Umur Ekonomis (Tahun):</label>
                <input type="text" name="umur" class="form-control" value="<?php echo $umur; ?>"  required>
            </div>
            <input type="text" name="operasi" class="form-control" value="Reducing Balance"  disabled><br>
            <button type="button" class="btn btn-danger" onclick="location.href='index.php'">Back</button>
            <button type="submit" class="btn btn-primary">Hitung</button>
            </form>
        <br>
        
        <?php
            if (isset($_GET['perolehan'])) {
                $perolehan=$_GET['perolehan'];
                $umur=$_GET['umur'];
                $hasil = ($perolehan / $umur) * 2;
                $hasila = "Hasil depresiasi menggunakan metode Reducing Balance pada tahun pertama adalah " .number_format($hasil,0,',','.');
                echo "<h1>$hasila</h1>";
                for ($i=2; $i <= $umur; $i++) { 
                    $hasill = (($perolehan-$hasil) / $umur) * 2;
                    $hasilla = "Hasil depresiasi menggunakan metode Reducing Balance pada tahun ke " .$i. " adalah " .number_format($hasill,0,',','.');
                    echo "<h1>$hasilla</h1>";
                    $perolehan = $perolehan - $hasill;
                    $hasill = ($perolehan/$umur)*2;
                }
            }
        ?>
        </div>
   
</div>
</body>
</html>