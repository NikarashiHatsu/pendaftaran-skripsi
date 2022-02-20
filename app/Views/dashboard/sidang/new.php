<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('/dashboard/sidang') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        Tambah Jadwal Sidang
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <form action="<?= base_url('dashboard/sidang/create') ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nomor_bukti" class="label">
                        <span class="label-text">Nomor Bukti</span>
                    </label>
                    <select name="nomor_bukti" id="nomor_bukti" class="select select-bordered w-full" required>
                        <?php if (count($skripsis) > 0): ?>
                            <?php foreach($skripsis as $skripsi): ?>
                                <option value="<?= $skripsi->nomor_bukti ?>">
                                    (<?= $skripsi->nomor_bukti ?>) <?= $skripsi->judul_skripsi ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>-Belum ada Skripsi yang Diapprove-</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="tanggal_sidang" class="label">
                        <span class="label-text">Tanggal Sidang</span>
                    </label>
                    <input type="date" name="tanggal_sidang" id="tanggal_sidang" class="input input-bordered w-full" value="<?= old('tanggal_sidang') ?>" required />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nip_penguji1" class="label">
                        <span class="label-text">Penguji 1</span>
                    </label>
                    <select name="nip_penguji1" id="nip_penguji1" class="select select-bordered w-full" required>
                        <?php if (count($dosens) > 0): ?>
                            <?php foreach($dosens as $dosen): ?>
                                <option value="<?= $dosen->nip ?>">
                                    (<?= $dosen->nip ?>) <?= $dosen->nama ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>-Belum ada Skripsi Terdaftar-</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nip_penguji2" class="label">
                        <span class="label-text">Penguji 2</span>
                    </label>
                    <select name="nip_penguji2" id="nip_penguji2" class="select select-bordered w-full" required>
                        <?php if (count($dosens) > 0): ?>
                            <?php foreach($dosens as $dosen): ?>
                                <option value="<?= $dosen->nip ?>">
                                    (<?= $dosen->nip ?>) <?= $dosen->nama ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>-Belum ada Dosen Terdaftar-</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="ruangan" class="label">
                        <span class="label-text">Ruangan</span>
                    </label>
                    <select name="ruangan" id="ruangan" class="select select-bordered w-full" required>
                        <option value="rs1">Ruangan 1</option>
                        <option value="rs2">Ruangan 2</option>
                        <option value="rs3">Ruangan 3</option>
                        <option value="rs4">Ruangan 4</option>
                    </select>
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