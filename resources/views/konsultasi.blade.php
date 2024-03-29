<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kepoinaja</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- custom css -->
        <link rel = "stylesheet" href = "assets/css/main.css" />
        <link rel = "stylesheet" href = "assets/css/utilities.css" />
        <!-- normalize.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <style type="text/css">
            .q-wrapper{
                background-color: white;
                border-radius: 17px;
                margin-left: auto;
                margin-bottom: 2rem;
                padding: 2rem;
            }
            .fs-htm{
                color: black !important;
                font-size: 20px;
            }
            .opsi{
                margin-right: 2rem;
            }
            .per-item{
                border: 1px solid var(--clr-white);
                margin-bottom: 1rem;
            }
            .mb-10{
                margin-bottom: 10px;
            }
            .left{
                border: 1px solid var(--clr-grey);
            }
            .form-control{
                display: block;
                /*width: 100%;*/
                height: calc(1.5em + 0.75rem + 2px);
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                border-radius: 0.25rem;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                margin-left: 2rem;
                margin-right: 1rem;
            }
            .form-control:focus{
                color: #495057;
                background-color: #fff;
                border-color: #80bdff;
                outline: 0;
                box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
            }
            .fc-red{color: red !important;}
        </style>
        
        <div class="page-wrapper">
            <!-- header -->
            <header class = "header">
                <nav class = "navbar">
                    <div class="container">
                        <div class="navbar-content d-flex justify-content-between align-items-center">
                            <div class = "brand-and-toggler d-flex align-items-center justify-content-between">
                                <a href = "/" class = "navbar-brand d-flex align-items-center">
                                    <!-- <span class="brand-shape d-inline-block text-white">M</span> -->
                                    <span class="brand-text fw-7">Kepoinaja</span>
                                </a>
                                <button type = "button" class = "d-none navbar-show-btn">
                                    <i class = "fas fa-bars"></i>
                                </button>
                            </div>

                            <div class = "navbar-box">
                                <button type = "button" class = "navbar-hide-btn">
                                    <i class = "fas fa-times"></i>
                                </button>

                                <ul class = "navbar-nav d-flex align-items-center">
                                    <li class = "nav-item">
                                        <a href = "/" class = "nav-link text-white text-nowrap">Home</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "/konsultasi" class = "nav-link text-white nav-active text-nowrap">Konsultasi</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "/cekartikel" class = "nav-link text-white text-nowrap">Article</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href="{{ route('login') }}" class = "nav-link text-white text-nowrap">Log In</a>
                                    </li>
                                    <!-- <li class = "nav-item">
                                        <a href = "#" class = "nav-link text-white text-nowrap">About us</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="element-one">
                    <img src = "assets/images/element-img-1.png" alt = "">
                </div>

                <div class="banner">
                    <div class="container">
                        <div class="">
                            <div class="banner-left">
                                <div class="q-wrapper d-flex">
                                    <div class="left">
                                        <form id="form1">
                                            <div class="per-item">
                                                <div class="row fs-htm mb-10 d-flex">
                                                    <div class="fs-htm ">Nama</div>
                                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                                    <small class="msg d-none fc-red">*wajib diisi</small>
                                                </div>
                                            </div>
                                        @foreach($bkg as $p)
                                            <div class="per-item">
                                                <div class="row fs-htm mb-10">{{ $p['pertanyaan'] }}</div>
                                                <div class="@if($p['urut']==1) d-flex @endif">
                                                    @foreach($p['pilihan'] as $opsi)
                                                    <div class="fs-htm opsi d-flex">
                                                      <input type="radio" id="pilihan-{{ $p['urut'] }}{{ $opsi['id'] }}" name="pilihan-{{ $p['urut'] }}" class="" value="{{ $opsi['skor'] }}">
                                                      <label class="fs-htm" for="pilihan-{{ $p['urut'] }}{{ $opsi['id']  }}">{{ $opsi['pilihan'] }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                        </form>
                                        <form id="form2">
                                        @foreach($questions as $p)
                                            <div class="per-item">
                                                <div class="row fs-htm mb-10">{{ $p['pertanyaan'] }}</div>
                                                <div class="d-flex">
                                                    @foreach($p['pilihan'] as $opsi)
                                                    <div class="fs-htm opsi d-flex">
                                                      <input type="radio" id="pilihan-{{ $p['urut'] }}{{ $opsi['id'] }}" name="pilihan-{{ $p['urut'] }}" class="" value="{{ $opsi['skor'] }}">
                                                      <label class="fs-htm" for="pilihan-{{ $p['urut'] }}{{ $opsi['id']  }}">{{ $opsi['pilihan'] }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                        </form>
                                            <br><br>
                                        <a   href = "#" class="btn btn-primary-outline" id="periksa-hasil">Lihat Hasil</a>
                                    </div>
                                    <div class="right d-none">
                                        <h3 class="fs-htm">Hasil Pemeriksaan</h3>
                                        <div class="row fs-htm">
                                            Resiko Kanker Payudara : 
                                            <span style="font-weight: bold" id="hasil1" class="fs-htm"></span>
                                        </div>
                                        <div class="row fs-htm">
                                            Hasil Pemeriksaan Sadari : 
                                            <span style="font-weight: bold" id="hasil2" class="fs-htm"></span>
                                        </div>
                                        
                                    </div>

                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div><br><br><br>

            </header>
            <section class = "sc-grid sc-grid-two">
                <div class = "container">
                    <div class = "grid-content d-grid align-items-center">
                        <div class = "grid-img">
                            <img src = "assets/images/download-image.png" alt = "">
                        </div>
                        <div class = "grid-text">
                            <div class = "content-wrapper text-start">
                                <div class = "title-box">
                                    <h3 class = "title-box-name">Download our mobile apps</h3>
                                    <div class = "title-separator mx-auto"></div>
                                </div>
                                <p class = "text title-box-text">Our dedicated patient engagement app and web portal allow you to access information instantaneously (no tedeous form, long calls, or administrative hassle) and securely</p>
                                <button type = "button" class = "btn btn-primary-outline">
                                    Download
                                    <img src = "assets/images/arrow-down.svg" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of header -->

            <footer class = "footer">
                <div class = "container">
                    <div class = "footer-content">
                        <div class = "footer-list d-grid text-white">
                            <div class = "footer-item">
                                <a href = "/" class = "navbar-brand d-flex align-items-center">
                                    <!-- <span class = "brand-shape d-inline-block text-white">M</span> -->
                                    <span class = "brand-text fw-7">Kepoinaja</span>
                                </a>
                                <p class = "text-white">Kepoinaja provides progressive, and affordable healthcare, accessible on mobile and online for everyone</p>
                                <p class = "text-white copyright-text">&copy; Kepoinaja PTY LTD 2024. All rights reserved.</p>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Company</h3>
                                <ul class = "footer-links">
                                    <li><a href = "#">About</a></li>
                                    <li><a href = "#">Find a doctor</a></li>
                                    <li><a href = "#">Apps</a></li>
                                </ul>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Region</h3>
                                <ul class = "footer-links">
                                    <li><a href = "#">Indonesia</a></li>
                                    <li><a href = "#">Singapore</a></li>
                                    <li><a href = "#">Hongkong</a></li>
                                    <li><a href = "#">Canada</a></li>
                                </ul>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Help</h3>
                                <ul class = "footer-links">
                                    <li><a href = "#">Help center</a></li>
                                    <li><a href = "#">Contact support</a></li>
                                    <li><a href = "#">Instructions</a></li>
                                    <li><a href = "#">How it works</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "footer-element-1">
                    <img src = "assets/images/element-img-4.png" alt = "">
                </div>
                <div class = "footer-element-2">
                    <img src = "assets/images/element-img-5.png" alt = "">
                </div>
            </footer>
        </div>

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- owl carousel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "assets/js/script.js"></script>
        <script type="text/javascript">
            $(document).on('click','#periksa-hasil', function(e){
                e.preventDefault()
                if($('#nama').val() == ''){
                    $('.msg').removeClass('d-none')
                    $('#nama').focus()
                    return false;
                }else{
                    $('.msg').addClass('d-none')
                }

                // alert('masad')/
                let periksa1 = $('#form1').serializeArray();
                let periksa2 = $('#form2').serializeArray();
                calc = 0;
                nama = ''
                $.each(periksa1, function(i, val){
                    if(val['name'] != 'nama'){
                        calc+= parseInt(val['value'])
                    }else{
                        nama = val['value']
                    }
                    console.log(name)
                })
                if(calc <=4){
                    $('#hasil1').html('<span style="color: green;">Rendah</span>')
                }else if(calc > 4 && calc <7){
                    $('#hasil1').html('<span style="color: yellow;">Sedang</span>')
                }else{
                    $('#hasil1').html('<span style="color: red;">Tinggi</span>')
                }
                // console.log(calc)
                calc2 = 0;
                $.each(periksa2, function(i, val){
                    calc2+= parseInt(val['value'])
                })
                if(calc2 >0){
                    $('#hasil2').html('<span style="color: red;">Mencurigakan</span>')
                }else{
                    $('#hasil2').html('<span style="color: green;">Normal</span>')
                }
                $('.right').removeClass('d-none')

                console.log(periksa1)
                console.log(periksa2)
                console.log(calc2)
                $.ajax({
                    url: "{{ url('periksa') }}",
                    type:'post',
                    data : {
                        'calc1' :calc,
                        'calc2' :calc2,
                        'nama' : nama,
                        '_token' : "{{ csrf_token() }}"
                    },
                    dataType:'json',
                    success: function(data){
                        console.log(data)
                    }


                })
            })
        </script>
    </body>
</html>