<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <h6 class="text-lg font-medium">
        Sidang
    </h6>
    <a href="<?= base_url('/dashboard/sidang/new') ?>" class="btn btn-primary">
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
                        <th>Nomor Bukti</th>
                        <th>Tanggal Sidang</th>
                        <th>Penguji 1</th>
                        <th>Penguji 2</th>
                        <th>Ruangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($sidangs) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach($sidangs as $sidang): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $sidang->nomor_bukti ?></td>
                                <td><?= $sidang->tanggal_sidang ?></td>
                                <td><?= $sidang->penguji1 ?></td>
                                <td><?= $sidang->penguji2 ?></td>
                                <td><?= $sidang->ruangan ?></td>
                                <td>
                                    <a href="<?= base_url('/dashboard/sidang/edit/'.$sidang->id) ?>" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                    <form action="<?= base_url('/dashboard/sidang/delete/'.$sidang->id) ?>" method="post" class="inline-block">
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