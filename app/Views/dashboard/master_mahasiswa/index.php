<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <h6 class="text-lg font-medium">
        Master Mahasiswa
    </h6>
    <a href="<?= base_url('/dashboard/master_mahasiswa/new') ?>" class="btn btn-primary">
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
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto</th>
                        <th>Alamat</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th>Pembimbing 1</th>
                        <th>Pembimbing 2</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($mahasiswas) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach($mahasiswas as $mahasiswa): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $mahasiswa->nim ?></td>
                                <td><?= $mahasiswa->nama ?></td>
                                <td><?= $mahasiswa->jk ? 'Laki-laki' : 'Perempuan' ?></td>
                                <td>
                                    <div class="w-16 h-16">
                                        <img src="<?= base_url('/writable/uploads/'.$mahasiswa->foto) ?>" alt="<?= $mahasiswa->nama ?>" class="w-16 h-16 border rounded object-cover" />
                                    </div>
                                </td>
                                <td><?= $mahasiswa->alamat ?></td>
                                <td><?= $mahasiswa->kode_fakultas ?></td>
                                <td><?= $mahasiswa->kode_prodi ?></td>
                                <td><?= $mahasiswa->dospem1 ?></td>
                                <td><?= $mahasiswa->dospem2 ?></td>
                                <td>
                                    <a href="<?= base_url('/dashboard/master_mahasiswa/edit/'.$mahasiswa->id) ?>" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                    <form action="<?= base_url('/dashboard/master_mahasiswa/delete/'.$mahasiswa->id) ?>" method="post" class="inline-block">
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
                            <td colspan="10" class="text-center">
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