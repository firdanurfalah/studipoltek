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
      </div>
   </div>
   <textarea name="" id="databar" cols="30" rows="10" hidden>{{json_encode($tahunan)}}</textarea>
</div>
<script>
   // chart tahunan
   const databar = JSON.parse($('#databar').val());
   console.log(databar);
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