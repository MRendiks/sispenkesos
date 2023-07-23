<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Cetak Laporan</title>

	{{-- <link href="assets/img/logo.jpg" rel="icon" type="images/x-icon"> --}}

	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<link href="dist/css/custom-report.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>


</head>
    <script>
        window.onload = function() {
            window.print();
        };
</script>
<div class="book">
<div class="page">
<div class="subpage">
    <div class="container-fluid">
		<b style="margin-top: 20px ">
			<div style="text-align: center; font-size: 30px;line-height: 30px; margin-top: 10px">
			   REKAP DATA PPKS
		   </div>
	   </b>
	   <hr color="black"style="line-height: 5px"> 
	   <hr width="100%" color="black"><p>
		<br />
		<table class="table table-bordered table-keuangan">
			<thead>
				<tr>
					<th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Pendidikan Ditamatkan</th>
                    <th>Kecamatan</th>
                    <th>Jenis PPKS</th>
                    <th>Detail Disabilitas</th>
                    <th>Jaminan Kesehatan </th>
                    <th>Pekerjaan</th>
                    <th>Status</th>
				</tr>
			</thead>
			<tbody>
                @foreach ($ppks as $item)
                <tr>
                    <td> {{$item->id}} </td>
                    <td> {{$item->nama}} </td>
                    <td> {{$item->nik}} </td>
                    <td> {{$item->jenis_kelamin}} </td>
                    <td> {{$item->tanggal_lahir}} </td>
                    <td> {{$item->pendidikan}} </td>
                    <td> {{$item->nama_kecamatan}} </td>
                    <td> {{$item->nama_jenis}} </td>
                    @if ($item->jenis_ppks_id == 4 || $item->jenis_ppks_id == 6)
                        <td> {{$item->nama_detail_jenis}} </td>
                    @else
                        <td>-</td>
                    @endif
                    <td> {{$item->jaminan_kesehatan}} </td>
                    <td> {{$item->pekerjaan}} </td>
                    <td> 
                        @if ($item->status == "verifikasi")
                            <button class="btn btn-warning">{{$item->status}}</button>
                        @else
                            <button class="btn btn-success">{{$item->status}}</button>
                        @endif
                        </td>
                </tr>
                @endforeach
			</tbody>
		</table>
		<br />
	</div>
</div>
</div>
</div>
</body>
</html>