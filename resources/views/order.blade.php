<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .-z-1 {
      z-index: -1;
    }

    .origin-0 {
      transform-origin: 0%;
    }

    input:focus ~ label,
    input:not(:placeholder-shown) ~ label,
    textarea:focus ~ label,
    textarea:not(:placeholder-shown) ~ label,
    select:focus ~ label,
    select:not([value='']):valid ~ label {
      /* @apply transform; scale-75; -translate-y-6; */
      --tw-translate-x: 0;
      --tw-translate-y: 0;
      --tw-rotate: 0;
      --tw-skew-x: 0;
      --tw-skew-y: 0;
      transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
        skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
      --tw-scale-x: 0.75;
      --tw-scale-y: 0.75;
      --tw-translate-y: -1.5rem;
    }

    input:focus ~ label,
    select:focus ~ label {
      /* @apply text-black; left-0; */
      --tw-text-opacity: 1;
      color: rgba(0, 0, 0, var(--tw-text-opacity));
      left: 0px;
    }
  </style>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <!-- navbar goes here -->
  <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
          <div class="flex items-center justify-start">
            <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
                <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <a href="/pesan" class="text-xl font-bold flex items-center lg:ml-2.5">
                <img src="{{url('/images/brand_logo.png')}}" class="h-6 mr-2" alt="Windster Logo">
                <span class="self-center whitespace-nowrap">Tour.ly</span>
            </a>
          </div>
          <div class="flex items-center">
            <a href="/history" class="hidden sm:flex ml-5 text-cyan-600 bg-white border border-solid border-x-cyan-600 hover:bg-cyan-600 hover:text-white focus:ring-4 focus:ring-cyan-200 font-medium r6unded-lg text-sm px-5 py-2.5 text-center items-center mr-3">                    
              History Pemesanan
            </a>
            <a href="/logout" class="hidden sm:flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3">                    
              Logout
            </a>
          </div>
      </div>
    </div>
  </nav>
  <section class="bg-gray-100 w-full">
    <div class="mx-auto max-w-2xl pb-8 pt-20 px-4 sm:px-6 lg:max-w-7xl lg:px-8">      
      <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
          <h1 class="text-2xl font-bold mb-8">Formulir Pemesanan Paket</h1>
          <form id="form" action="/pesan-tour" method="POST">
          {{ csrf_field() }}
            <div class="flex flex-row space-x-4 mb-6">
              <div class="relative z-0 w-full">
                  <input type="text" name="nama" id="nama" placeholder=" " required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" required/>
                  <label for="nama" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama Lengkap</label>              
                </div>

                <div class="relative z-0 w-full">
                  <input type="email" name="email" id="email" placeholder=" " class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" required/>
                  <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Email Aktif</label>              
                </div>
            </div>            

            <fieldset id="tujuan" class="relative z-0 w-full p-px mb-6">
              <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Pilih Tujuan</legend>
              <div class="grid grid-cols-3 gap-6 pt-3 pb-2 space-x-4">
                <label class=" flex flex-col gap-2 items-center">
                  <img class="max-w-[200px]" src="{{asset('images/product-1.jpg')}}" alt="">
                  <div class="flex">
                    <input type="radio" name="nama_paket" value="bromo" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" required/>
                    <p>Bromo</p>
                  </div>
                </label>
                <label class=" flex flex-col gap-2 items-center">
                  <img class="max-w-[200px]" src="{{asset('images/product-1.jpg')}}" alt="">
                  <div class="flex">
                    <input type="radio" name="nama_paket" value="ijen" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" required/>
                    <p>Ijen</p>
                  </div>
                </label>
                <label class=" flex flex-col gap-2 items-center">
                  <img class="max-w-[200px]" src="{{asset('images/product-1.jpg')}}" alt="">
                  <div class="flex">
                    <input type="radio" name="nama_paket" value="bali" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" required/>
                    <p>Bali</p>
                  </div>
                </label>
                <label class=" flex flex-col gap-2 items-center">
                  <img class="max-w-[200px]" src="{{asset('images/product-1.jpg')}}" alt="">
                  <div class="flex">
                    <input type="radio" name="nama_paket" value="bromo+ijen" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" required/>
                    <p>Bromo + Ijen</p>
                  </div>
                </label>
                <label class=" flex flex-col gap-2 items-center">
                  <img class="max-w-[200px]" src="{{asset('images/product-1.jpg')}}" alt="">
                  <div class="flex">
                    <input type="radio" name="nama_paket" value="bromo+ijen+bali" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" required/>
                    <p>Bromo + Ijen + Bali</p>
                  </div>
                </label>
                <label class=" flex flex-col gap-2 items-center">
                  <img class="max-w-[200px]" src="{{asset('images/product-1.jpg')}}" alt="">
                  <div class="flex">
                    <input type="radio" name="nama_paket" value="ijen+bali" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" required/>
                    <p>Ijen + Bali</p>
                  </div>
                </label>                
              </div>              
            </fieldset>

            <div class="flex flex-row space-x-4 mb-6">
              <div class="relative z-0 w-full">
                <input type="number" name="jumlah_orang" id="jumlah_orang" placeholder=" " required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" required/>
                <label for="jumlah_orang" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Jumlah Peserta</label>              
              </div>
              <div class="relative z-0 w-full">
                <select name="penginapan" id="penginapan" value="" onclick="this.setAttribute('value', this.value);" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200" required>
                  <option value="" selected disabled hidden></option>
                  <option value="backpacker">Backpacker</option>
                  <option value="reguler" >Reguler</option>
                  <option value="family">Family</option>
                  <option value="premium">Premium</option>                
                </select>
                <label for="penginapan" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih Penginapan</label>              
              </div>
            </div>

            <div class="flex flex-row space-x-4">
              <div class="relative z-0 w-full">
                <select name="transportasi" id=""transportasi value="" onclick="this.setAttribute('value', this.value);" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200" required>
                  <option value="" selected disabled hidden></option>
                  <option value="mandiri">Datang ke titik kumpul</option>
                  <option value="exclusive">Dijemput dan diantar</option>                  
                </select>
                <label for="transportasi" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih Transportasi</label>              
              </div>
              <div class="relative z-0 w-full mb-5">
                <input type="text" name="tanggal_berangkat" id="tanggal_berangkat" placeholder=" " onclick="this.setAttribute('type', 'date');" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" required/>
                <label for="tanggal_berangkat" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Tanggal Berangkat</label>                
              </div>
            </div>

            <div class="relative flex z-0 w-full mb-5">
            <input id="total_harga" name="total_harga" type="hidden" />
              <p>Rp.</p>
              <p id="total-harga">-</p>
            </div>

            <button id="button" type="submit" class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-pink-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none">
              Toggle Error
            </button>
          </form>
        </div>
      </div>
    </div>    
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
  <script type="text/javascript">
    $(document).ready(function () {              
      var harga_paket = 0;
      var jumlah_orang = 0;
      var harga_penginapan = 0;
      var biaya_transportasi = 0;
      
      $("input[name='nama_paket']").on('change', function() {
        var nama_paket = $("input[name='nama_paket']:checked").val();
        switch(nama_paket) {
          case "bromo":
            harga_paket = 100000;
          break;
          case "ijen":
            harga_paket = 200000;
          break;
          case "bali":
            harga_paket = 800000;
          break;
          case "bromo+ijen":
            harga_paket = 600000;
          break;
          case "bromo+ijen+bali":
            harga_paket = 1000000;
          break;
          case "ijen+bali":
            harga_paket = 12000000;
          break;

          default:
          harga_paket = 0;          
        }
        hitungTotal()        
      })

      $("select[name='transportasi']").on('change', function() {
        var pilih_penginapan = $("select[name='transportasi']").val();
        switch(pilih_penginapan) {
          case "mandiri":
            biaya_transportasi = 0;
          break;
          case "exclusive":
            biaya_transportasi = 200000;
          break;                  

          default:
          biaya_transportasi = 0;          
        }        
        hitungTotal()        
      })

      $("select[name='penginapan']").on('change', function() {
        var pilih_penginapan = $("select[name='penginapan']").val();
        switch(pilih_penginapan) {
          case "backpacker":
            harga_penginapan = 90000;
          break;
          case "reguler":
            harga_penginapan = 130000;
          break;
          case "family":
            harga_penginapan = 150000;
          break;
          case "premium":
            harga_penginapan = 220000;
          break;          

          default:
          harga_penginapan = 0;          
        }        
        hitungTotal()        
      })

      $('#jumlah_orang').keyup(() => {        
        jumlah_orang = parseInt($('#jumlah_orang').val())     
        hitungTotal()   
      })

      function hitungTotal() {        
        let total_harga = (harga_paket + harga_penginapan + biaya_transportasi) * jumlah_orang;
        total_harga != NaN ? $('#total-harga').text(total_harga) : $('#total-harga').text('-')
        total_harga != NaN ? $('#total_harga').val(total_harga) : $('#total_harga').val(0)
      }


      $('.beli-button').click((e) => {
        $('#id_barang').val(e.currentTarget.dataset.id_barang);
        $('#nama').text(e.currentTarget.dataset.nama);
        $('#deskripsi').text(e.currentTarget.dataset.deskripsi);
        $('#stock').text(e.currentTarget.dataset.stock);
        $('#harga_jual').text(e.currentTarget.dataset.harga_jual);
        harga_jual = parseInt(e.currentTarget.dataset.harga_jual);
      })
    });    
  </script>
</body>
</html>