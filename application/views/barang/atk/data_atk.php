<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-warning">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-warning">
                    Data Barang ATK dan Jasa
                </h4>
            </div>
        </div>
    </div>
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <a href="<?= base_url('barang/nonatk') ?>" class="btn btn-sm btn-warning btn-icon-split">
                    <span class="text">
                        Data Barang Non ATK
                    </span>
                </a>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('barang/addatk') ?>" class="btn btn-sm btn-warning btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Barang ATK
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>ID Barang</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Type Barang</th>
                    <th>Warna Barang</th>
                    <th>Ukuran Barang</th>
                    <th>Berat Barang</th>
                    <th>Merk Barang</th>
                    <th>Seri Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($barang) :
                    foreach ($barang as $b) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $b['id_barang']; ?></td>
                            <td><?= $b['kode_barang']; ?></td>
                            <td><?= $b['nama_barang']; ?></td>
                            <td><?= $b['jenis_atk']; ?></td>
                            <td><?= $b['stok']; ?></td>
                            <td><?= $b['nama_satuan']; ?></td>
                            <td><?= $b['type_barang']; ?></td>
                            <td><?= $b['warna_barang']; ?></td>
                            <td><?= $b['ukuran_barang']; ?></td>
                            <td><?= $b['berat_barang']; ?></td>
                            <td><?= $b['merk_barang']; ?></td>
                            <td><?= $b['seri_barang']; ?></td>
                            <td>
                                <a href="<?= base_url('barang/editatk/') . $b['id_barang'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barang/delete/') . $b['id_barang'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>