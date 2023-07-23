@extends('layout.sidebar')
    @section('container')
    <div id="main" class="main">
            <div class="boks">
                <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center mb-5 mt-5">
                    <div class="col-12 col-lg-18">
                        <div class="card" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <h1 class="mb-5 text-center">Form Input PPKS</h1>

                            <form>
                            <!-- Nama dan NIK input -->
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Nama Lengkap</label>
                                    <input type="text" id="form6Example1" class="form-control" />
                                </div>
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example2">NIK</label>
                                    <input type="text" id="form6Example2" class="form-control" />
                                </div>
                                </div>
                            </div>

                            <!-- JK input -->
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                <p> Jenis Kelamin </p>
                                <input type="radio" id="perempuan" name="jk" velue="Perempuan" />
                                <label for="perempuan">Perempuan</label>
                                <input type="radio" id="laki2" name="jk" velue="Laki-laki" />
                                <label for="laki2">Laki-laki</label>
                                </div>
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="tanggallahir">Tanggal Lahir</label>
                                    <input type="date" id="tanggallahir" class="form-control" />
                                </div>
                                </div>
                            </div>

                            <!-- Pendidikan input -->
                            <div class="col-12 col-md-6 mb-4">
                            <p>Pendidikan Terakhir </p>
                                <select name="pendidikan_terakhir">
                                    <option></option>
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA/SMK</option>
                                    <option>Diploma/Sarjana</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>

                            <!-- Kecamatan input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="kecamatan">Kecamatan</label>
                                <input type="text" id="kecamatan" class="form-control" />
                            </div>

                            <!-- Kelurahan input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="desa_kelurahan">Desa/Kelurahan</label>
                                <input type="text" id="desa_kelurahan" class="form-control" />
                            </div>

                            <!-- Alamat input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="alamat">Alamat </label>
                                <input type="text" id="alamat" class="form-control" />
                            </div>

                            <!-- Jenis PPKS AD/ADK input -->
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                <p>Jenis PPKS </p>
                                <select name="jenis_disabilitas">
                                    <option></option>
                                    <option>Anak Dengan Kedisabilitasan</option>
                                    <option>Penyandang Disabilitas</option>
                                </select>
                                </div>
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                <p>Keterangan Kedisabilitasan </p>
                                <select name="ket_disabilitas">
                                    <option>Ragam Fisik</option>
                                    <option>Ragam Intelektual</option>
                                    <option>Ragam Mental</option>
                                    <option>Ragam Sensorik</option>
                                </select>
                                </div>
                                </div>
                            </div>

                             <!-- Jaminan Kesehatan dan Pekerjaan -->
                             <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                <p>Jenis PPKS </p>
                                <select name="jamkes">
                                    <option></option>
                                    <option>Kartu Indonesia Sehat</option>
                                    <option>Jaminan Kesehatan Lainnya</option>
                                    <option>Tidak Memiliki Jaminan Kesehatan</option>
                                </select>
                                </div>
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                <p>Keterangan Kedisabilitasan </p>
                                <select name="pekerjaan">
                                    <option>Belum/Tidak Bekerja</option>
                                    <option>Mengurus rumah tangga</option>
                                    <option>Pelajar/Mahasiswa</option>
                                    <option>Pensiunan</option>
                                    <option>Pedagang</option>
                                    <option>Petani/pekebun</option>
                                    <option>Peternak</option>
                                    <option>Nelayan/perikanan</option>
                                    <option>Buruh</option>
                                    <option>Pembantu rumah tangga</option>
                                    <option>Tukang cukur, pijat,jahit,dll</option>
                                    <option>Wiraswasta</option>
                                    <option>Karyawan</option>
                                    <option>Sopir/Tukang ojek</option>
                                    <option>Guru, Tenaga bantu non PNS</option>
                                    <option>PNS</option>
                                    <option>Seniman</option>
                                    <option>Lainnya</option>
                                </select>
                                </div>
                                </div>
                            </div>

                            <!-- Keterangan input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="keterangan">Keterangan </label>
                                <textarea name="keterangan" rows="5" class="form-control">
                                </textarea>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input
                                class="form-check-input me-2"
                                type="checkbox"
                                value=""
                                id="form6Example8"
                                checked
                                />
                                <label class="form-check-label" for="form6Example8"> Data sudah benar ? </label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-rounded btn-block">Input</button>
                            </form>

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>  
    </div>
    @endsection
