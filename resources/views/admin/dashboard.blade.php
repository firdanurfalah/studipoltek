@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">

   <div class="layout-px-spacing">
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
            <form action="/home" method="GET">
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
               <table class="table table-bordered" id="tableKreditExport">
                  <thead>
                     <tr>
                        <td class="text-uppercase">No</td>
                        <td class="text-uppercase">Tanggal</td>
                        <td class="text-uppercase">Jam</td>
                        <td class="text-uppercase">Nama Produk</td>
                        <td class="text-uppercase">Harga Total</td>
                        <td class="text-uppercase">Customer</td>
                        <td class="text-uppercase">No HP</td>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($bulanan as $key => $v)
                     <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$v->tanggal}}</td>
                        <td>{{$v->jam}}</td>
                        <td>{{$v->nama_product}}</td>
                        <td>{{$v->price_total}}</td>
                        <td>{{$v->nama}}</td>
                        <td>{{$v->nohp}}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
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