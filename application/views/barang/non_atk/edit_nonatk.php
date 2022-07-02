<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-warning">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-warning">
                            Form Edit Barang
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barang/nonatk') ?>" class="btn btn-sm btn-warning btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['stok' => 0, 'id_barang' => $barang['id_barang']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kode_barang">Kode Barang*</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('kode_barang', $barang['kode_barang']); ?>" name="kode_barang" id="kode_barang" type="text" class="form-control" placeholder="Kode Barang...">
                        <?= form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang*</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_barang', $barang['nama_barang']); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jenis_id">Jenis Barang*</label>
                    
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="jenis_id" id="jenis_id" class="selectpicker" data-live-search="true">
                                <option value="" selected disabled>Pilih Jenis Barang</option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option <?= $barang['jenis_id'] == $j['jenis_nonatk'] ? 'selected' : '';  ?> <?= set_select('jenis_id', $j['id_nonatk']) ?> value="<?= $j['id_nonatk'] ?>"><?= $j['kode_nonatk'] . ' | ' . $j['jenis_nonatk'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-warning" href="<?= base_url('non_atk/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_satuan">Nama Satuan*</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_satuan', $barang['nama_satuan']); ?>" name="nama_satuan" id="nama_satuan" type="text" class="form-control" placeholder="Nama Satuan...">
                        <?= form_error('nama_satuan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="type_barang">Type Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('type_barang', $barang['type_barang']); ?>" name="type_barang" id="type_barang" type="text" class="form-control" placeholder="Type Barang...">
                        <?= form_error('type_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="warna_barang">Warna Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('warna_barang', $barang['warna_barang']); ?>" name="warna_barang" id="warna_barang" type="text" class="form-control" placeholder="Warna Barang...">
                        <?= form_error('warna_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ukuran_barang">Ukuran Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('ukuran_barang', $barang['ukuran_barang']); ?>" name="ukuran_barang" id="ukuran_barang" type="text" class="form-control" placeholder="Ukuran Barang...">
                        <?= form_error('ukuran_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="berat_barang">Berat Barang*</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('berat_barang', $barang['berat_barang']); ?>" name="berat_barang" id="berat_barang" type="text" class="form-control" placeholder="Berat Barang...">
                        <?= form_error('berat_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="merk_barang">Merk Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('merk_barang', $barang['merk_barang']); ?>" name="merk_barang" id="merk_barang" type="text" class="form-control" placeholder="Merk Barang...">
                        <?= form_error('merk_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="seri_barang">Seri Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('seri_barang', $barang['seri_barang']); ?>" name="seri_barang" id="seri_barang" type="text" class="form-control" placeholder="Seri Barang...">
                        <?= form_error('seri_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-warning">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $('.selectpicker').selectpicker();
</script>

<!-- Mengambik Kode Barang -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $("#jenis_id").change(function() {
            const jenis = <?php echo json_encode($jenis); ?>;
            var count = Object.keys(jenis).length;

            var test = $('#jenis_id :selected').val();

            for (let index = 0; index < count; index++) {
                if (jenis[index].id_nonatk == test) {
                    var kodejenis = jenis[index].kode_nonatk;
                }

            }


            var coba = $('input#kode_barang').val(kodejenis);
        });


    });
</script>

<!-- Mengambil Nama Barang  -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $("#jenis_id").change(function() {
            const jenis = <?php echo json_encode($jenis); ?>;
            var count = Object.keys(jenis).length;

            var test = $('#jenis_id :selected').val();

            for (let index = 0; index < count; index++) {
                if (jenis[index].id_nonatk == test) {
                    var namajenis = jenis[index].jenis_nonatk;
                }

            }


            var coba = $('input#nama_barang').val(namajenis);
        });


    });
</script>