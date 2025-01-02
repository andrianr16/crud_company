<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Perusahaan</h4>
            <p class="card-description">
                Form untuk menambahkan data perusahaan
            </p>
            <form class="forms-sample" action="<?= base_url('admin/Dashboard/addData'); ?>" method="post">
                
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="companyName" class="col-form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="companyName" name="company_name" placeholder="Nama Perusahaan" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="industry" class="col-form-label">Industri</label>
                        <input type="text" class="form-control" id="industry" name="industry" placeholder="Industri" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="provinsi" class="col-form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="kota" class="col-form-label">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="address" class="col-form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Alamat" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="createBy" class="col-form-label">Dibuat Oleh</label>
                        <input type="text" class="form-control" id="createBy" name="createby" placeholder="Nama Pengguna" value="<?= $this->session->userdata('company_name'); ?>" readonly>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="<?= base_url('admin/Dashboard'); ?>" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</div>
