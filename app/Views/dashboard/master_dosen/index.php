<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <h6 class="text-lg font-medium">
        Master Dosen
    </h6>
    <a href="<?= base_url('/dashboard/master_dosen/new') ?>" class="btn btn-primary">
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
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($dosens) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach($dosens as $dosen): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $dosen->nip ?></td>
                                <td><?= $dosen->nama ?></td>
                                <td><?= $dosen->jk ? 'Laki-laki' : 'Perempuan' ?></td>
                                <td><?= $dosen->email ?></td>
                                <td>
                                    <img src="<?= base_url('/writable/uploads/'.$dosen->foto) ?>" alt="<?= $dosen->nama ?>" class="w-16 h-16 border rounded object-cover" />
                                </td>
                                <td>
                                    <a href="<?= base_url('/dashboard/master_dosen/edit/'.$dosen->id) ?>" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                    <form action="<?= base_url('/dashboard/master_dosen/delete/'.$dosen->id) ?>" method="post" class="inline-block">
                                        <button type="submit" class="btn btn-sm btn-error">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>