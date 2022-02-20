<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <h6 class="text-lg font-medium">
        Laporan Sidang
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <div class="overflow-x-auto">
            <table class="table table-zebra table-compact table-auto w-full">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Penguji 1</th>
                        <th>Penguji 2</th>
                        <th>Tanggal Sidang</th>
                        <th>Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($skripsis) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach($skripsis as $skripsi): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $skripsi->nim ?></td>
                                <td><?= $skripsi->nama_mhs ?></td>
                                <td><?= $skripsi->penguji1 ?></td>
                                <td><?= $skripsi->penguji2 ?></td>
                                <td><?= $skripsi->tanggal_sidang ?></td>
                                <td><?= $skripsi->ruangan ?></td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">
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