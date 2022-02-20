<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <?php if(session()->user->role == "admin"): ?>
        <a href="<?= base_url('/dashboard/pendaftaran') ?>" class="btn btn-outline">
            Kembali
        </a>
    <?php endif; ?>
    <h6 class="text-lg font-medium">
        Tambah Pendaftaran Skripsi
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <form action="<?= base_url('dashboard/pendaftaran/create') ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="tanggal" class="label">
                        <span class="label-text">Tanggal</span>
                    </label>
                    <input type="date" name="tanggal" id="tanggal" class="input input-bordered w-full input-disabled" readonly value="<?= date('Y-m-d'); ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nim" class="label">
                        <span class="label-text">NIM</span>
                    </label>
                    <input type="text" name="nim" id="nim" class="input input-bordered w-full input-disabled" readonly value="<?= session()->user->username ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="judul_skripsi" class="label">
                        <span class="label-text">Judul Skripsi</span>
                    </label>
                    <input type="text" name="judul_skripsi" id="judul_skripsi" class="input input-bordered w-full" value="<?= old('judul_skripsi') ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nip_pembimbing1" class="label">
                        <span class="label-text">Pembimbing 1</span>
                    </label>
                    <select name="nip_pembimbing1" id="nip_pembimbing1" readonly class="select select-bordered w-full input-disabled">
                        <?php if (count($dosens) > 0): ?>
                            <?php foreach($dosens as $dosen): ?>
                                <option <?= $dosen->nip == $mahasiswa->nip_pembimbing1 ? "selected" : "" ?> value="<?= $dosen->nip ?>">
                                    (<?= $dosen->nip ?>) <?= $dosen->nama ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>-Belum ada Dosen Terdaftar-</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nip_pembimbing2" class="label">
                        <span class="label-text">Pembimbing 2</span>
                    </label>
                    <select name="nip_pembimbing2" id="nip_pembimbing2" readonly class="select select-bordered w-full input-disabled">
                        <?php if (count($dosens) > 0): ?>
                            <?php foreach($dosens as $dosen): ?>
                                <option <?= $dosen->nip == $mahasiswa->nip_pembimbing2 ? "selected" : "" ?> value="<?= $dosen->nip ?>">
                                    (<?= $dosen->nip ?>) <?= $dosen->nama ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>-Belum ada Dosen Terdaftar-</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="file_laporan" class="label">
                        <span class="label-text">Laporan Skripsi</span>
                    </label>
                    <input type="file" name="file_laporan" id="file_laporan" accept="pdf" class="input input-bordered w-full" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="file_rekomendasi" class="label">
                        <span class="label-text">Rekomendasi Pembimbing</span>
                    </label>
                    <input type="file" name="file_rekomendasi" id="file_rekomendasi" accept="pdf" class="input input-bordered w-full" />
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

<script>
    $().ready(function() {
        $("#kode_fakultas").on('change', function(e) {
            $.ajax({
                url: "<?= base_url('dashboard/pendaftaran/get_prodi') ?>/" + $(this).val(),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $("#kode_prodi").html(data.map(function(item) {
                            return "<option value=\"" + item.kode_prodi + "\">" + item.nama + "</option>";
                        }).join(""));
                    } else {
                        $("#kode_prodi").html("<option value=\"\">-Belum ada Prodi Terdaftar-</option>");
                    }
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>