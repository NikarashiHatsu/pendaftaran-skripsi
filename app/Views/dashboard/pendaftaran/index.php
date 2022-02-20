<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <h6 class="text-lg font-medium">
        List Skripsi yang Diajukan
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <div class="overflow-x-auto">
            <table class="table table-zebra table-compact table-auto w-full">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Bukti</th>
                        <th>Judul Skripsi</th>
                        <th>Pembimbing 1</th>
                        <th>Pembimbing 2</th>
                        <th>File Laporan</th>
                        <th>File Rekomendasi</th>
                        <th>Sudah Diterima?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($skripsis) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach($skripsis as $skripsi): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $skripsi->nomor_bukti ?></td>
                                <td><?= $skripsi->judul_skripsi ?></td>
                                <td><?= $skripsi->dospem1 ?></td>
                                <td><?= $skripsi->dospem2 ?></td>
                                <td>
                                    <a class="flex items-center text-blue-700" href="<?= base_url('/writable/uploads/'.$skripsi->file_laporan) ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </a>
                                </td>
                                <td>
                                    <a class="flex items-center text-blue-700" href="<?= base_url('/writable/uploads/'.$skripsi->file_rekomendasi) ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </a>
                                </td>
                                <td>
                                    <?php if($skripsi->is_diterima): ?>
                                        <span class="badge badge-success">
                                            Diterima
                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-error">
                                            Belum Diterima
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">
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