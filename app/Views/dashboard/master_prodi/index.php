<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <h6 class="text-lg font-medium">
        Master Prodi
    </h6>
    <a href="<?= base_url('/dashboard/master_prodi/new') ?>" class="btn btn-primary">
        Tambah
    </a>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <div class="overflow-x-auto">
            <table class="table table-zebra table-compact table-auto w-full">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Asal Fakultas</th>
                        <th>Kode Prodi</th>
                        <th>Nama</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($prodis) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach($prodis as $prodi): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $prodi->fakultas ?></td>
                                <td><?= $prodi->kode_prodi ?></td>
                                <td><?= $prodi->nama ?></td>
                                <td>
                                    <a href="<?= base_url('/dashboard/master_prodi/edit/'.$prodi->id) ?>" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                    <form action="<?= base_url('/dashboard/master_prodi/delete/'.$prodi->id) ?>" method="post" class="inline-block">
                                        <button type="submit" class="btn btn-sm btn-error">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">
                                Belum ada data
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>