<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('/dashboard/master_prodi') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        Tambah Prodi
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <form action="<?= base_url('dashboard/master_prodi/create') ?>" method="post">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="kode_fakultas" class="label">
                        <span class="label-text">Kode Fakultas</span>
                    </label>
                    <select name="kode_fakultas" id="kode_fakultas" class="select select-bordered w-full">
                        <?php if (count($fakultas) > 0): ?>
                            <?php foreach($fakultas as $fak): ?>
                                <option value="<?= $fak->kode_fakultas ?>">
                                    (<?= $fak->kode_fakultas ?>) <?= $fak->nama ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>-Belum ada Kode Fakultas Terdaftar-</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="kode_prodi" class="label">
                        <span class="label-text">Kode Prodi</span>
                    </label>
                    <input type="text" name="kode_prodi" id="kode_prodi" class="input input-bordered w-full" value="<?= old('kode_prodi') ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nama" class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input type="text" name="nama" id="nama" class="input input-bordered w-full" value="<?= old('nama') ?>" />
                </div>
                <div class="col-span-12 flex justify-end">
                    <button class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>