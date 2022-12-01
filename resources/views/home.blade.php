@extends('layouts.main')

@section('main')
        <!-- Wrapper -->
        <div class="container">
            <!-- Start: Hero -->
            <section id="hero">
              <div class="container-fluid">
                <div class="row reversing">
                  <div class="col-lg-6 col-sm-12">
                    <div class="hero-text">
                      <h1>NEWABI Outdoor</h1>
                      <p>
                        Kami menyediakan hampir semua jenis perlengkapan berkemah dan backpacking sewaan. Anda dapat menyewa paket perlengkapan atau menyewa tenda individu, kantong tidur atau ransel.Kami akan mengirimkan peralatan berkemah atau
                        backpacking sewaan Anda ke mana saja di Cianjur.
                      </p>
                      <a href="#" class="btn-hubungi sm-w-100">Hubungi Saya</a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12"> 
                    <div class="hero-banner">
                      <img src="./assets/img/hero/sampul newabi.jpg" alt="" width="" />
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- End: Hero -->
          </div>
    
          <!-- Start: Services Section --> 
          <section id="services">
            <div class="container">
              <div class="heading">
                <h2>WE PROVIDES</h2>
                {{-- <p>Jasa dan Barang yang Kami tawarkan</p> --}}
              </div>
              <div class="layanan">
                <div class="row d-flex justify-content-center">
                  <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card-service">
                      <div class="c-head"> 
                        <img src="./assets/img/categories/tenda.png" alt="foto orang sedang menikah" />
                      </div>
                      <div class="c-body">
                        <h3>Rental Alat Camping</h3>
                        <p>Pemotretan pernikahan adalah salah satu jasa terbaik dari kami. Mengusung tema apapun sesuai kemauan client.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card-service">
                      <div class="c-head"> 
                        <img src="./assets/img/categories/slepping bag.png" alt="foto prewedding" />
                      </div>
                      <div class="c-body">
                        <h3>Jasa Layanan Antar</h3>
                        <p>Pre-Wed Photoshoot itu merupakan salah satu hal yang penting sebelum dilakukannya resepsi pernikahan. Kami dapat mengakomodir itu semua secara terstruktur dan indah.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card-service">
                      <div class="c-head"> 
                        <img src="./assets/img/categories/alat_masak.png" alt="foto Product" />
                      </div>
                      <div class="c-body">
                        <h3>Membership</h3>
                        <p>Product Anda sangatlah penting tentunya bagi perusahaan, dokumentasi gambar yang baik harusnya jadi kewajiban, bukan?</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card-service">
                      <div class="c-head">
                        <img src="./assets/img/categories/tas.png" alt="" />
                      </div>
                      <div class="c-body">
                        <h3>Open Camp & Trip</h3>
                        <p>Anda ingin dipotret layaknya seorang model di dalam studio? jasa Kami yang satu ini tentunya cocok sekali bagi Anda.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card-service">
                      <div class="c-head">
                        <img src="./assets/img/categories/penerangan.png" alt="" />
                      </div>
                      <div class="c-body">
                        <h3>Toko Outdoor</h3>
                        <p>Mengabadikan dengan indah arsitektur bangunan pada perusahaan atau bangunan Anda bersamaa Kami.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End: Services Section -->
    
          <!-- Start: Works Section -->
          <section id="works">
            <div class="container">
              <div class="heading">
                <h2>Equipment Rental</h2>
                <!-- <p class="sm-center">Berikut adalah karya-karya yang dari Kami</p> -->
              </div>
              <div class="my-works">
                <div class="row">
                  <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="image-parent">
                      <div class="card shadow-sm">
                        <img src="./assets/img/product/tenda/borneo_4.png" class="w-100" alt="" />
    
                        <div class="card-body">
                          <p class="fw-3">Tenda Borneo 4</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-ctb">Pesan Sekarang</button>
                            </div>
                            <small class="text-muted">Rp. 50.000/Hari</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="image-parent">
                      <div class="card shadow-sm">
                        <img src="./assets/img/product/tenda/beshopt.png" class="w-100" alt="" />
    
                        <div class="card-body">
                          <p class="fw-3">Tenda Besport</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-ctb">Pesan Sekarang</button>
                            </div>
                            <small class="text-muted">Rp. 40.000/Hari</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="image-parent">
                      <div class="card shadow-sm">
                        <img src="./assets/img/product/tenda/easy_dome3.png" class="w-100" alt="" />
    
                        <div class="card-body">
                          <p class="fw-3">Tenda Easy dome 2</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-ctb">Pesan Sekarang</button>
                            </div>
                            <small class="text-muted">Rp. 20.000/Hari</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <!-- Button CTA -->
                  <div class="w-100 d-flex justify-content-center align-items-center">
                    <a href="/products" class="btn-cta">Jelajahi lebih banyak...</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End: Works Section -->
    
          <!-- Start: About -->
          <section id="about">
            <div class="container">
              <h2>Lokasi</h2>
              <div class="biography lora">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.787898374501!2d107.15203381419938!3d-6.795641768349916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68538448ebb9fd%3A0xffec4c4806aab5f!2sNewabi%20Outdoor!5e0!3m2!1sid!2sid!4v1668655440394!5m2!1sid!2sid"
                  width="100%"
                  height="450"
                  style="border: 0"
                  allowfullscreen=""
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
              </div>
            </div>
          </section>
          <!-- Start: About -->
    
          <!-- Start: Contact -->
          <section id="contact">
            <div class="container">
              <div class="heading mb-5">
                <h2>Contact</h2>
                <p class="sm-center">Semua kontak kami bisa Anda temukan disini!</p>
              </div>
              <div class="row d-flex justify-content-center align-items-center" style="margin-bottom: 60px">
                <div class="col-lg-11">
                  <div class="card-contact">
                    <div class="row p-4">
                      <div class="col-md-6">
                        <div class="contact-item">
                          <h4 class="me-4">Email:</h4>
                          <p><a class="links" target="_blank" href="">newabirentaloutdoor@gmail.com</a></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-item">
                          <h4 class="me-4">Instagram:</h4>
                          <p><a class="links" target="_blank" href="https://www.instagram.com/newabirentaloutdoor/?hl=id">@newabirentaloutdoor</a></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-item">
                          <h4 class="me-4">Alamat:</h4>
                          <p><a class="links" target="_blank" href="">Cianjur, Jawa Barat, Indonesia</a></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="contact-item">
                          <h4 class="me-4">WhatsApp:</h4>
                          <p><a class="links" target="_blank" href="">0877-2802-5262</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-10">
                  <div class="card-form">
                    <div class="accent-pills">
                      <p>Hubungi Kami</p>
                    </div>
                    <form action="" class="custom-form">
                      <div class="controlled-form mb-4">
                        <label class="custom-label" for="nama">Nama Lengkap:</label>
                        <input type="text" class="custom-input" name="nama" id="nama" />
                      </div>
                      <div class="controlled-form mb-4">
                        <label class="custom-label" for="nama">Alamat Email:</label>
                        <input type="email" class="custom-input" name="nama" id="nama" />
                      </div>
                      <div class="controlled-form mb-4">
                        <label class="custom-label" for="nama">No WhatsApp:</label>
                        <input type="number" class="custom-input" name="nama" id="nama" />
                      </div>
                      <div class="controlled-form mb-4">
                        <label class="custom-label" for="nama">Pesan Untuk Kami:</label>
                        <textarea name="pesan" class="custom-textarea" id="pesan"></textarea>
                      </div>
                      <div class="controlled-form">
                        <button class="btn-kontak align-self-end" type="submit">Kirim</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End: Contact -->
@endsection