@extends('layout/index')

@section('title', 'Dashboard')

  @section('content')
      <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div  class="h-screen w-full bg-gray-50 relative overflow-y-auto ">
          <main>
              <div class="pt-6 px-4">                
                <div class="grid grid-cols-1 xl:gap-4 my-4">                    
                    <div class="flex flex-col gap-6 bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                      <div class="flex justify-between items-center">
                        <h3 class="text-xl leading-none font-bold text-gray-900">Daftar Permintaan</h3>                        
                      </div>
                      <div class="block w-full overflow-x-auto">
                          <table id="user-table" class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Nama Pemesan</th>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Email Pemesan</th>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Nama Paket</th>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">penginapan</th>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jumlah Peserta</th>                      
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Transportasi</th>                      
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Tanggal Berangkat</th>                      
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Total Harga</th>                                                                                          
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                              @foreach($data as $d)
                                <tr class="text-gray-500">
                                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $d->User->nama }}</th>
                                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $d->email_pemesan }}</th>
                                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $d->nama_paket }}</th>
                                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $d->penginapan }}</th>
                                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $d->jumlah_orang }}</th>
                                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $d->transportasi }}</th>
                                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ Carbon\Carbon::parse($d->tanggal_berangkat)->format('d M Y') }}</th>
                                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $d->total_harga }}</th>                                  
                                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left flex gap-2">
                                    @if($d->status == 0)
                                    <a href="/konfirmasi-pemesanan/{{ $d->id_pesan }}" class="ml-5 text-green-500 bg-white border border-solid border-green-500 hover:bg-green-500 hover:text-white focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3">Konfirmasi</a>
                                    @else
                                    <p>Sudah Dikonfirmasi</p>
                                    @endif
                                  </th>
                                </tr>  
                              @endforeach                              
                            </tbody>
                          </table>
                      </div>
                    </div>
                </div>
              </div>
          </main>          
        </div>
    </div>    
    @endsection
  
  @section('script')
  <script type="text/javascript">
    $(document).ready(function () {  
      //your code      
    });
  </script>
  @endsection
  