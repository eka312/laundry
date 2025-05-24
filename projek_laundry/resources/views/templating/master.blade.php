<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('judul_halaman')</title>
        <link href="iPortfolio-1.0.0/assets/img/portfolio.png" rel="icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('template-admin/dist/css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="text-center">
                        <img src="{{asset('sandhikagalih.github.io-main/img/foto2.png')}}" class="rounded-circle w-50 border border-4 border-white" alt="profil">
                    </div>
                    <div class="text-center pt-3">
                        <!-- Youtube -->
                        <a href="https://www.youtube.com/@itz_fue" target="_blank" class=" btn btn-outline-light btn-sm rounded-circle p-1 me-1">
                            <i class="fa-brands fa-youtube fa-lg"></i>
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/silviaeka312/" target="_blank" class="btn btn-outline-light btn-sm rounded-circle  me-1">
                            <i class="fa-brands fa-instagram fa-lg"></i>
                        </a>
                        <!-- WhatsApp-->
                        <a href="https://wa.me/6285932512828 " target="_blank" class="btn btn-outline-light btn-sm rounded-circle">
                            <i class="fa-brands fa-whatsapp fa-lg"></i>
                        </a>
                    </div>
                    <hr class="border border-white">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="/data_projek">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-rectangle-list fa-lg"></i></i></div>
                                Projek
                            </a>
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="sb-nav-link-icon"><i class="bi bi-box-arrow-right fs-5"></i></div>
                                Keluar
                            </a>
                            <a class="nav-link " href="/" >
                                <div class="sb-nav-link-icon"><i class="bi bi-box-arrow-left fs-5"></i></div>
                                Kembali
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <!-- bagian konten -->
                    @yield('konten')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; My Portfolio 2025</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Logout</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin logout dari aplikasi ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Logout">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('template-admin/dist/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('template-admin/dist/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('template-admin/dist/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('template-admin/dist/js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
