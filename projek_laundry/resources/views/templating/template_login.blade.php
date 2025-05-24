<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('judul_halaman')</title>
        <link href="{{asset('template-admin/dist/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="iPortfolio-1.0.0/assets/img/portfolio.png" />
        <style>
            .bg-login {
                background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            }

            #footer2{
                background-color: #CBDCEB;
            }
        </style>
    </head>
    <body class="bg-login">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <!-- bagian konten -->
                                @yield('konten')
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer id="footer2" class="py-2 text-capitalize">
                    <div class="container-fluid ">
                        <p class="text-center">
                            Dibuat dengan <span class="text-danger">&#x2764;</span> oleh 
                            <a href="https://wa.me/6285932512828" target="_blank" class="fw-bold text-primary text-decoration-none">Silvia Eka Widya</a>, menggunakan 
                            <a href="https://getbootstrap.com/docs/5.3/getting-started/introduction/" target="_blank" class="fw-bold text-info text-decoration-none">Bootstrap</a>.
                        </p>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="{{asset('template-admin/dist/js/scripts.js')}}"></script>
    </body>
</html>
