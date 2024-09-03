<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Kontak</th>
            <th scope="col">Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "koneksi.php";
            $no=1;
            $data=mysqli_query($koneksi, "SELECT * FROM user");
            while ($d=mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['user_nama']; ?></td>
                        <td><?php echo $d['user_kelamin']; ?></td>
                        <td><?php echo $d['user_kontak']; ?></td>
                        <td><?php echo $d['user_alamat']; ?></td> 
                        <td>
                            <button id ="<?php echo $d['user_id']; ?>" class="btn btn-danger btn-sm hapus_data"> <i class="fa fa-trach"></i>Hapus</button>
                        </td>                       
                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>