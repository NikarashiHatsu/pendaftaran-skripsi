<!DOCTYPE html>
<html data-theme="<?= env('app.theme') ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= env('app.name') ?></title>
    <link rel="shortcut icon" href="<?= base_url('/icon.svg') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <script src="<?= base_url('js/app.js') ?>" defer></script>
    <script src="<?= base_url('js/app-non-defer.js') ?>"></script>
</head>

<body class="font-display antialiased text-base-content">
    <div class="drawer drawer-mobile min-h-screen">
        <input id="drawer" type="checkbox" class="drawer-toggle">
        <main class="drawer-content bg-base-200">
            <div class="flex lg:hidden items-center mb-4 h-16 bg-base-100/50 backdrop-blur-lg border-b border-base-300 px-6 sticky top-0 z-10">
                <label for="drawer" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </label>
            </div>
            <div class="p-6">
                <?= $this->renderSection('content') ?>
            </div>
        </main>
        <div class="drawer-side border-r border-r-base-300">
            <label for="drawer" class="drawer-overlay"></label>
            <aside class="overflow-y-auto w-80 bg-base-100 text-base-content">
                <div class="flex items-center p-4 border-b border-b-base-300 backdrop-blur-lg h-16 max-h-16 sticky top-0 z-50">
                    <img src="<?= base_url('/icon.svg') ?>" class="w-6 h-6 object-contain" />
                    <h5 class="text-lg font-medium ml-2">
                        <?= env('app.name') ?>
                    </h5>
                </div>
                <div class="px-8 py-4 border-b border-b-base-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex flex-col ml-2">
                            <span class="text-xs mb-1 line-clamp-1 font-medium">
                                <?= session()->user->name ?>
                            </span>
                            <span class="text-xs">
                                <?= ucwords(str_replace('_', ' ', session()->user->role)) ?>
                            </span>
                        </div>
                    </div>
                </div>

                <ul class="menu p-4">
                    <li class="menu-title">
                        <span>
                            Dashboard
                        </span>
                    </li>
                    <li>
                        <a href="<?= base_url('/dashboard') ?>" class="<?= current_url(true)->getSegment(1) == 'dashboard' && current_url(true)->getSegment(2) == NULL ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="ml-2">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <?php if(session()->user->role == "admin"): ?>
                        <li class="menu-title mt-4">
                            <span>
                                Data Master
                            </span>
                        </li>
                        <li>
                            <a href="<?= base_url('/dashboard/master_fakultas') ?>" class="<?= current_url(true)->getSegment(2) == 'master_fakultas' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-2">
                                    Master Fakultas
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/dashboard/master_prodi') ?>" class="<?= current_url(true)->getSegment(2) == 'master_prodi' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                                <span class="ml-2">
                                    Master Prodi
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/dashboard/master_mahasiswa') ?>" class="<?= current_url(true)->getSegment(2) == 'master_mahasiswa' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                                <span class="ml-2">
                                    Master Mahasiswa
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/dashboard/master_dosen') ?>" class="<?= current_url(true)->getSegment(2) == 'master_dosen' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                                <span class="ml-2">
                                    Master Dosen
                                </span>
                            </a>
                        </li>

                        <li class="menu-title mt-4">
                            <span>
                                Mahasiswa
                            </span>
                        </li>
                        <li>
                            <a href="<?= base_url('/dashboard/pendaftaran') ?>" class="<?= current_url(true)->getSegment(2) == 'pendaftaran' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span class="ml-2">
                                    List Skripsi
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/dashboard/sidang') ?>" class="<?= current_url(true)->getSegment(2) == 'sidang' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span class="ml-2">
                                    Sidang
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (session()->user->role == "mahasiswa"): ?>
                        <li class="menu-title mt-4">
                            <span>
                                Mahasiswa
                            </span>
                        </li>
                        <li>
                            <?php
                                $data_mahasiswa = (new \App\Models\Mahasiswa())->where('nim', session()->user->username)->first();
                            ?>
                            <a href="<?= base_url('/dashboard/master_mahasiswa/edit/' . $data_mahasiswa->id) ?>" class="<?= current_url(true)->getSegment(2) == 'master_mahasiswa' ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                                <span class="ml-2">
                                    Detail Mahasiswa
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/dashboard/pendaftaran') ?>" class="<?= current_url(true)->getSegment(2) == 'pendaftaran' && current_url(true)->getSegment(3) == NULL  ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span class="ml-2">
                                    List Skripsi
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/dashboard/pendaftaran/new') ?>" class="<?= current_url(true)->getSegment(2) == 'pendaftaran' && current_url(true)->getSegment(3) == 'new'  ? 'active' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="ml-2">
                                    Pendaftaran Skripsi
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="menu-title mt-4">
                        <span>
                            User Control
                        </span>
                    </li>
                    <form action="<?= base_url('/logout') ?>" method="post" x-ref="form" x-data>
                        <li>
                            <a
                                href="javascript:void(0)"
                                type="submit"
                                class="hover:bg-red-500 hover:text-white"
                                x-on:click="$refs.form.submit()"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="ml-2">
                                    Log Out
                                </span>
                            </a>
                        </li>
                    </form>
                </ul>
            </aside>
        </div>
    </div>
</body>

</html>
