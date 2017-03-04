<html>
   <head>
      <title>Contoh NuSOAP Web Service </title>
   </head>
   <body>
      <form method="post" action="client.php?op=search">
          Keyword Pencarian <input type="text" name="key"> <input type="submit" name="submit" value="Search">
      </form>

      <?php

        if (isset($_GET['op']))
        {
            if ($_GET['op'] == 'search')
            {	
                require_once('lib/nusoap.php');
                $key = $_POST['key'];

                // instansiasi obyek untuk class nusoap client
                $client = new nusoap_client('http://rosihanari.net/nusoap/server.php');

                // proses call method 'search' di script server.php yang ada di komputer B
                $result = $client->call('search', array('key' => $key));

                if (is_array($result))
                {
                    echo "<table border='1'>";
                    echo "<tr><th>NIM</th><th>NAMA</th><th>ALAMAT</th></tr>";
                    foreach($result as $data)
                    {
                        echo "<tr><td>".$data['nim']."</td><td>".$data['nama']."</td><td>".$data['alamat']."</td></tr>";
                    }	
                    echo "</table>";
                    echo "<p>Ditemukan ".count($result)." data terkait kata kunci '".$key."'</p>";
                }
                else echo "<p>Data tidak ditemukan</p>";	
            }
        }	
        ?>

    </body>
</html>
