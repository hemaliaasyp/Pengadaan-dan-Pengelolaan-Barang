<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-warning">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-warning">
                            Form Tambah Jenis
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('nonatk') ?>" class="btn btn-warning btn-sm btn-secondary btn-icon-split">
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
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jenis_nonatk">Nama Jenis</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jenis_nonatk'); ?>" name="jenis_nonatk" id="jenis_nonatk" type="text" class="form-control" placeholder="Nama Jenis...">
                        <?= form_error('jenis_nonatk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kode_nonatk">Kode Jenis</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('kode_nonatk'); ?>" name="kode_nonatk" id="kode_nonatk" type="text" class="form-control" placeholder="Masukan 1 digit kode...">
                        <?= form_error('kode_nonatk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>