
@extends('layout.sidebar')
    @section('container')            
        <div id="main" class="main">
            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                </nav>
            </div>
            <!--Title-->    
            <!--card-->
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-5">
                        <div class="card-body">
                            <h4 class="card-title text-primary">Wellcome {{auth()->user()->nama}}!</h4>
                            <div onload="setInterval('displayTime()', 1000);">
                            <h5></h5>
                            <h5 id="jam"></h5>
                            </div>          
                        </div>
                    </div>
                <div class="col-sm-7 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-2">
                        <img src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="80"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"/>
                    </div>
                 </div>
            </div>
            <!--End card-->       
            </div> 
       
            <section class="section" style="margin-top: -50px;">
            <div class="row">

             <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Pie Data Keseluruhan PPKS</h5>
                        <!-- Pie Chart -->
              <div id="pieChart"></div>

<script>
  
</script>
<!-- End Pie Chart -->

</div>
</div>
</div>

<div class="col-lg-6">
<div class="card">
<div class="card-body">
<h5 class="card-title">Grafik Donat Data Keseluruhan PPKS</h5>

<!-- Donut Chart -->
<div id="donutChart"></div>

<script>
// variabel grafik data pertama
var data = @json($presentase);
// variabel grafik data kedua
var data2 = @json($presentase2);

// Data Untuk Grafik pertama
var nama_jenis = [];
var banyak_data = [];

// Data untuk grafik kedua
var nama_kecamatan = [];
var banyak_data2 = [];

    
data.forEach(function(item) {
  nama_jenis.push(item['nama_jenis']);
  banyak_data.push(item['banyak_data']);
});

data2.forEach(function(item) {
  nama_kecamatan.push(item['nama_kecamatan']);
  banyak_data2.push(item['banyak_data']);
});


if (data == null) {

}else{
  document.addEventListener("DOMContentLoaded", () => {
      new ApexCharts(document.querySelector("#pieChart"), {
        series: banyak_data,
        chart: {
          height: 350,
          type: 'pie',
          toolbar: {
            show: true
          }
        },
        labels: nama_jenis
      }).render();
    });

    document.addEventListener("DOMContentLoaded", () => {
      new ApexCharts(document.querySelector("#donutChart"), {
        series: banyak_data2,
        chart: {
          height: 350,
          type: 'pie',
          toolbar: {
            show: true
          }
        },
        labels: nama_kecamatan
      }).render();
    });

}

</script>
<!-- End Donut Chart -->
</div></div></div></div>
</section>
        </div>
                  
                
                              

                
    @endsection
                    
