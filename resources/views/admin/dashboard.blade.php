@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">

   <div class="layout-px-spacing">
      @if(Auth::user()->role_id == 'owner')
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <h3>Rekap Perbulan dalam Setahun</h3>
                  <canvas id="tahunan"></canvas>
               </div>
            </div>
         </div>
         <div class="col-lg-12 mt-2">
            <form action="/home" method="GET" {{Auth::user()->level == 'owner' ? '' : 'hidden'}}>
               @csrf
               <div class="form-group">
                  <label for="">Tanggal</label>
                  <div class="row">
                     <input type="text" name="tanggal" id="tanggal" class="form-control col-lg-4" value="{{$tanggal}}">
                     <button class="btn btn-primary btn-sm ml-2" type="submit">Cari</button>
                     <span class="btn btn-success btn-sm ml-2" id="btnexport">Export</span>
                  </div>
               </div>
            </form>
            <div class="table-responsive">
               <table id="tableKreditExport" class="table table-bordered">
                  <thead>
                     <tr>
                        <th class="text-uppercase">tanggal pesan</th>
                        <th class="text-uppercase">nama</th>
                        <th class="text-uppercase">email</th>
                        <th class="text-uppercase">nohp</th>
                        <th class="text-uppercase">tanggal</th>
                        <th class="text-uppercase">jam</th>
                        <th class="text-uppercase">total harga</th>
                        <th class="text-uppercase">status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($bulanan as $key => $value)
                     <tr>
                        <td>{{$value->created_at->format('d-m-Y')}}</td>
                        <td>{{$value->nama}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->nohp}}</td>
                        <td>{{$value->tanggal}}</td>
                        <td>{{$value->jam}}</td>
                        <td>{{$value->price_total}}</td>
                        <td>
                           @if($value->status == 0)
                           <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                              class="badge badge-info" style="cursor: pointer">Proses</span>
                           @elseif($value->status == 3)
                           <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                              class="badge badge-primary" style="cursor: pointer">Diterima</span>
                           @elseif($value->status == 2)
                           <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                              class="badge badge-info-emphasis" style="cursor: pointer">Selesai
                              Pembayaran</span>
                           @elseif($value->status == 1)
                           <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                              class="badge badge-success" style="cursor: pointer">Selesai
                              Pemotretan</span>
                           @else
                           <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                              class="badge badge-danger" style="cursor: pointer">Ditolak</span>
                           @endif
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
                  <tfoot>
                     <tr>
                        <th colspan="6">Total</th>
                        <th>{{$total}}</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
      @endif
   </div>

   <textarea name="" id="databar" cols="30" rows="10" hidden>{{json_encode($tahunan)}}</textarea>


</div>
<script>
   $('#tanggal').daterangepicker({
      locale: {
         format: 'DD/MM/YYYY'
      },
   });
   // export excel
   $('#btnexport').on('click',function () {
      TableToExcel.convert(document.getElementById("tableKreditExport"),{
         name: "Laporan.xlsx",
         sheet: {
            name: "Laporan"
         }
      });
   })
   // chart tahunan
   const databar = JSON.parse($('#databar').val());
     new Chart(
    document.getElementById('tahunan'),
    {
      type: 'bar',
      options: {
         responsive: true,
         animation: false,
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            enabled: false
          }
         }
      },
      data: {
         labels: [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
         ],
         datasets: [
            {
               borderSkipped: false,
               borderWidth: 2,
               borderRadius: 100,
               backgroundColor: '#1F618D',
               label: '',
               data: databar
            }
        ]
      }
    }
  );
</script>
<!--  END CONTENT AREA  -->
@endsection