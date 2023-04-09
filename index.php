<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Absensi Mahasiswa TI.20.A.2</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
</head>

<body>
    <h2 class="text-center">Daftar Absensi Kelas TI.20.A.2</h2>
    <?php
    $apisource = file_get_contents('https://api.steinhq.com/v1/storages/642110d4eced9b09e9c62384/20A2');
    
    $data = json_decode($apisource, true);

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    $totalLinks = count($data);
    
    $itemsperpage = 10;
    $totalPages = ceil($totalLinks / $itemsperpage);
    
    $offset = array_slice($data, ($page - 1) * $itemsperpage, $itemsperpage);
    ?>

    <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offset as $index => $link) { ?>
                    <tr>
                        <td><?php echo (($page - 1) * $itemsperpage + $index + 1); ?></td>
                        <td><?php echo $link['NIM']; ?></td>
                        <td><?php echo $link['Nama']; ?></td>
                        <td><?php echo $link['1']; ?></td>
                        <td><?php echo $link['2']; ?></td>
                        <td><?php echo $link['3']; ?></td>
                        <td><?php echo $link['4']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <nav>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item<?php echo ($i == $page ? ' active' : ''); ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</body>
</html>