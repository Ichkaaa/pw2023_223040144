    <?php
    require '../php/functions.php';

    
    $keywords = $_GET['keywords'];
    
    $query = "SELECT * FROM merchandise WHERE ";
    foreach ($keywords as $key => $keyword) {
        if ($key > 0) {
            $query .= " OR ";
        }
            $query .= "nama LIKE '%$keyword%' OR
                    harga LIKE '%$keyword%' OR
                    deskripsi LIKE '%$keyword%' OR
                    stok LIKE '%$keyword%'";
        }

        $merchandise = query($query);
    
    ?>

<table  class="table table-bordered admin-container">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($merchandise as $brg) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><img src="../assets/img/<?= $brg["gambar"]; ?>" alt="foto" style="width: 150px;"></td>
                            <td><?= $brg["nama"]; ?></td>
                            <td><?= $brg["harga"]; ?></td>
                            <td><?= $brg["deskripsi"]; ?></td>
                            <td><?= $brg["stok"]; ?></td>
                            <td>
                                <a class="btn btn-warning text-light fw-bold" href="ubahmerchandise.php?id=<?= $brg["id"]; ?>">ubah</a> |
                                <a class="btn btn-danger text-light fw-bold" href="hapus.php?id=<?= $brg["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach ?>
                </tbody>
            </table>
