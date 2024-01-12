<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Medimoor</title>
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
        </style>
        
        <div class="page-wrapper">
            <!-- header -->
            <header class = "header">
                <nav class = "navbar">
                    <div class="container">
                        <div class="navbar-content d-flex justify-content-between align-items-center">
                            <div class = "brand-and-toggler d-flex align-items-center justify-content-between">
                                <a href = "/" class = "navbar-brand d-flex align-items-center">
                                    <span class="brand-shape d-inline-block text-white">M</span>
                                    <span class="brand-text fw-7">Medimoor</span>
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
                                        <a href = "/" class = "nav-link text-white nav-active text-nowrap">Home</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "#" class = "nav-link text-white text-nowrap">Alur Kerja</a>
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
                </div>
            </header>
            <!-- end of header -->

            <footer class = "footer">
                <div class = "container">
                    <div class = "footer-content">
                        <div class = "footer-list d-grid text-white">
                            <div class = "footer-item">
                                <a href = "#" class = "navbar-brand d-flex align-items-center">
                                    <span class = "brand-shape d-inline-block text-white">M</span>
                                    <span class = "brand-text fw-7">Medimoor</span>
                                </a>
                                <p class = "text-white">Medimoor provides progressive, and affordable healthcare, accessible on mobile and online for everyone</p>
                                <p class = "text-white copyright-text">&copy; Medimoor PTY LTD 2024. All rights reserved.</p>
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
                // alert('masad')/
                let periksa1 = $('#form1').serializeArray();
                let periksa2 = $('#form2').serializeArray();
                calc = 0;
                $.each(periksa1, function(i, val){
                    calc+= parseInt(val['value'])
                })
                if(calc <=4){
                    $('#hasil1').text('Rendah')
                }else if(calc > 4 && calc <7){
                    $('#hasil1').text('Sedang')
                }else{
                    $('#hasil1').text('Tinggi')
                }
                // console.log(calc)
                calc2 = 0;
                $.each(periksa2, function(i, val){
                    calc2+= parseInt(val['value'])
                })
                if(calc2 >0){
                    $('#hasil2').text('Mencurigakan')
                }else{
                    $('#hasil2').text('Normal')
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