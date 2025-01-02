<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Manajemen Perusahaan</h3>
                </div>
                <!-- Form Pencarian -->
                <div class="col-lg-6 text-left"> <!-- Change text-right to text-left -->
                    <form method="get" action="<?= base_url('admin/dashboard/index'); ?>">
                        <input type="text" name="search" value="<?= set_value('search', $search_keyword); ?>" placeholder="Search by company name" />
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="card-title">Data Perusahaan</h4>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="<?= base_url('admin/dashboard/add'); ?>" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="col-lg-12">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Perusahaan</th>
                                    <th class="text-center">Kota</th>
                                    <th class="text-center">Provinsi</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Industri</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Tanggal Dibuat</th>
                                    <th class="text-center">Diperbarui Oleh</th>
                                    <th class="text-center">Tanggal Diperbarui</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($companies as $row) :
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $row->company_name; ?></td>
                                    <td><?= $row->kota; ?></td>
                                    <td><?= $row->provinsi; ?></td>
                                    <td><?= $row->address; ?></td>
                                    <td><?= $row->industry; ?></td>
                                    <td><?= $row->createby; ?></td>
                                    <td class="text-center"><?= $row->createdate; ?></td>
                                    <td><?= $row->updateby ?: '-'; ?></td>
                                    <td class="text-center"><?= $row->updatetime ?: '-'; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-warning" href="<?= base_url('admin/dashboard/edit/') . $row->id_company; ?>" title="Edit">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?= base_url('admin/dashboard/delete/') . $row->id_company; ?>" title="Hapus" onclick="if (!confirm('Apakah anda yakin akan menghapus perusahaan ini?')) { return false; }">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if (empty($companies)) : ?>
                                <tr>
                                    <td colspan="11" class="text-center">Data tidak tersedia</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="col-12 text-center">
                        <?= $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
