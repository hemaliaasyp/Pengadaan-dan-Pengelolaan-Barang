<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-warning">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-warning">
                    Data Jenis Non ATK
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('nonatk/add') ?>" class="btn btn-sm btn-warning btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Jenis Barang Non ATK
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama Jenis</th>
                    <th>Kode Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($nonatk) :
                    foreach ($nonatk as $j) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $j['jenis_nonatk']; ?></td>
                            <td><?= $j['kode_nonatk']; ?></td>
                            <td>
                                <a href="<?= base_url('nonatk/edit/') . $j['id_nonatk'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('nonatk/delete/') . $j['id_nonatk'] ?>" class="btn btn-warning btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>