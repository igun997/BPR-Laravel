@extends('layout.app')

@section('css')

@endsection

@section('content')

    <!-- ======= Profile Section ======= -->
    <section id="profile" class="about">
        <div class="container">

            <div class="row no-gutters">
                <div class="col-lg-6 video-box">
                    <img src="/assets/img/gambarvideo2.jpg" class="img-fluid" alt="">
                    <a href="https://www.youtube.com/watch?v=2qfxqZ1j3Sk" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                    <div class="section-title text-justify">
                        <h2>Profile BPR</h2>
                        <p class="text-justify">Bank Perkreditan Rakyat (disingkat BPR) adalah lembaga keuangan bank yang melaksanakan kegiatan usaha secara konvensional atau berdasarkan Prinsip Syariah yang dalam kegiatannya tidak memberikan jasa dalam lalu lintas pembayaran. BPR hanya melakukan kegiatan berupa simpanan dalam bentuk deposito berjangka, tabungan, dan/atau bentuk lainnya yang dipersamakan dan menyalurkan dana sebagai usaha BPR. Dengan lokasi yang pada umumnya dekat dengan tempat masyarakat yang membutuhkan. Status BPR diberikan kepada Bank Desa, Lumbung Desa, Bank Pasar, Bank Pegawai, Lumbung Pitih Nagari (LPN), Lembaga Perkreditan Desa (LPD), Badan Kredit Desa (BKD), Badan Kredit Kecamatan (BKK), Kredit Usaha Rakyat Kecil (KURK), Lembaga Perkreditan Kecamatan (LPK), Bank Karya Produksi Desa (BKPD), dan/atau lembaga-lembaga lainnya yang dipersamakan berdasarkan UU Perbankan Nomor 7 Tahun 1992 dengan memenuhi persyaratan tatacara yang ditetapkan dengan Peraturan Pemerintah. Ketentuan tersebut diberlakukan karena mengingat bahwa lembaga-lembaga tersebut telah berkembang dari lingkungan masyarakat Indonesia, serta masih diperlukan oleh masyarakat, maka keberadaan lembaga dimaksud diakui. Karena itu, UU Perbankan Nomor 7 Tahun 1992 memberikan kejelasan status lembaga-lembaga dimaksud. Untuk menjamin kesatuan dan keseragaman dalam pembinaan dan pengawasan, maka persy-ratan dan tatacara pemberian status lembaga-lembaga dimaksud ditetapkan dengan Peraturan Pemerintah.</p>
                    </div>


                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="pko" class="counts section-bg">
        <div class="container">
            <h1><b>Pengajuan Kredit Online</b></h1>
            <div class="row">

                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
                    <div class="count-box">
                        <!-- <i class="icofont-simple-smile" style="color: #20b38e;"></i> -->
                        <!-- <span data-toggle="counter-up">232</span> -->
                        <img class="opacity" src="/assets/img/pengajuan/prosescepat.jpg" style="width:; height:150px;">
                        <h3>Proses Cepat dan Mudah</h3>
                        <p>Proses pengajuan kredit yang cepat dengan prosedur dan persyaratan mudah.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="count-box">
                        <!-- <i class="icofont-document-folder" style="color: #c042ff;"></i> -->
                        <!-- <span data-toggle="counter-up">521</span> -->
                        <img class="opacity" src="/assets/img/pengajuan/bungarendah.jpg" style="width:; height:150px;">
                        <h3>Bunga dan Biaya Rendah</h3>
                        <p>Suku bunga pinjaman rendah dan kompetitif serta biaya pengajuan rendah.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="count-box">
                        <!-- <i class="icofont-live-support" style="color: #46d1ff;"></i> -->
                        <!-- <span data-toggle="counter-up">1,463</span> -->
                        <img class="opacity" src="/assets/img/pengajuan/cicilanringan.jpg" style="width:; height:150px;">
                        <h2>Cicilan Ringan</h2>
                        <p>Cicilan ringan dan angsuran tetap sampai jatuh tempo yang ditetapkan.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
                    <div class="count-box">
                        <!-- <i class="icofont-users-alt-5" style="color: #ffb459;"></i> -->
                        <!-- <span data-toggle="counter-up">15</span> -->
                        <img class="opacity" src="/assets/img/pengajuan/promo.jpg" style="width:; height:150px;">
                        <h1>Promo</h1>
                        <p>Raih kesempatan untuk mendapatkan promo dan program menarik pada event tertentu.</p>
                    </div>
                </div>

                <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="700">
                    <a href="{{route("nasabah.kredit.list")}}" target="_blank"><button class="tombol" type="submit">Ajukan Sekarang</button></a>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="produk" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Produk</h2>
            </div>

            <div class="row">
               @foreach($product as $k => $v)
                    <div class="col-md-6 icon-box" data-aos="fade-up">
                        <div class="icon">
                            <img src="{{$v->img}}" class="img-fluid img-rounded rounded-circle img-thumbnail " style="height: 120px" alt="">
                        </div>
                        <h4 class="title"><a href="">{{$v->name}}</a></h4>
                        <p class="description">{{$v->description}}</p>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Services Section -->

@endsection

@section('js')

@endsection

