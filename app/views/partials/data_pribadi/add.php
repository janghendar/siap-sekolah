    <template id="data_pribadiAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Data Pribadi</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="data_pribadi/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('foto')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="foto">Foto Terbaru </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <niceupload
                                                        fieldname="foto"
                                                        control-class="upload-control"
                                                        dropmsg="Drop files here to upload"
                                                        uploadpath="uploads/images/"
                                                        filenameformat="random" 
                                                        extensions="jpg , png , gif , jpeg"  
                                                        :filesize="3" 
                                                        :maximum="1" 
                                                        name="foto"
                                                        v-model="data.foto"
                                                        v-validate="{}"
                                                        data-vv-as="Foto Terbaru"
                                                        >
                                                    </niceupload>
                                                    <small v-show="errors.has('foto')" class="form-text text-danger">{{ errors.first('foto') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('nama')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.nama"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Nama Lengkap"
                                                    class="form-control "
                                                    type="text"
                                                    name="nama"
                                                    placeholder="Nama Lengkap beserta gelar"
                                                    />
                                                    <small v-show="errors.has('nama')" class="form-text text-danger">
                                                        {{ errors.first('nama') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('nik')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="nik">NIK </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.nik"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="NIK"
                                                    class="form-control "
                                                    type="number"
                                                    name="nik"
                                                    placeholder="Masukkan NIK"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('nik')" class="form-text text-danger">
                                                        {{ errors.first('nik') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('nip')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="nip">NIP </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.nip"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="NIP"
                                                    class="form-control "
                                                    type="number"
                                                    name="nip"
                                                    placeholder="Enter NIP"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('nip')" class="form-text text-danger">
                                                        {{ errors.first('nip') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('nuptk')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="nuptk">NUPTK </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.nuptk"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="NUPTK"
                                                    class="form-control "
                                                    type="number"
                                                    name="nuptk"
                                                    placeholder="Enter NUPTK"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('nuptk')" class="form-text text-danger">
                                                        {{ errors.first('nuptk') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('nrg')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="nrg">NRG </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.nrg"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="NRG"
                                                    class="form-control "
                                                    type="number"
                                                    name="nrg"
                                                    placeholder="Enter NRG"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('nrg')" class="form-text text-danger">
                                                        {{ errors.first('nrg') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('tempat_lahir')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="tempat_lahir">Tempat Lahir </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.tempat_lahir"
                                                    v-validate="{}"
                                                    data-vv-as="Tempat Lahir"
                                                    class="form-control "
                                                    type="text"
                                                    name="tempat_lahir"
                                                    placeholder="Enter Tempat Lahir"
                                                    />
                                                    <small v-show="errors.has('tempat_lahir')" class="form-text text-danger">
                                                        {{ errors.first('tempat_lahir') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('tgl_lahir')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="tgl_lahir">Tangga Lahir </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.tgl_lahir"
                                                    v-validate="{}"
                                                    data-vv-as="Tangga Lahir"
                                                    name="tgl_lahir"
                                                    placeholder="Enter Tangga Lahir"
                                                    :config="{
                                                    dateFormat: 'Y-m-d',
                                                    altFormat: 'F j, Y',
                                                    altInput: true, 
                                                    allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small v-show="errors.has('tgl_lahir')" class="form-text text-danger">{{ errors.first('tgl_lahir') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('jenis_kelamin')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="jenis_kelamin">Jenis Kelamin </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <dataselect
                                                        v-model="data.jenis_kelamin"
                                                        data-vv-value-path="data.jenis_kelamin"
                                                        data-vv-as="Jenis Kelamin"
                                                        v-validate="{}"
                                                        placeholder="Select A Value ... " name="jenis_kelamin" :multiple="false" 
                                                        :datasource="jenis_kelaminOptionList"
                                                        >
                                                    </dataselect>
                                                    <small v-show="errors.has('jenis_kelamin')" class="form-text text-danger">{{ errors.first('jenis_kelamin') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('status_kawin')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="status_kawin">Status Kawin </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <dataselect
                                                        v-model="data.status_kawin"
                                                        data-vv-value-path="data.status_kawin"
                                                        data-vv-as="Status Kawin"
                                                        v-validate="{}"
                                                        placeholder="Select A Value ... " name="status_kawin" :multiple="false" 
                                                        :datasource="status_kawinOptionList"
                                                        >
                                                    </dataselect>
                                                    <small v-show="errors.has('status_kawin')" class="form-text text-danger">{{ errors.first('status_kawin') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('agama')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="agama">Agama </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.agama"
                                                    v-validate="{}"
                                                    data-vv-as="Agama"
                                                    class="form-control "
                                                    type="text"
                                                    name="agama"
                                                    placeholder="Enter Agama"
                                                    />
                                                    <small v-show="errors.has('agama')" class="form-text text-danger">
                                                        {{ errors.first('agama') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('status_pegawai')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="status_pegawai">Status Pegawai </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <dataselect
                                                        v-model="data.status_pegawai"
                                                        data-vv-value-path="data.status_pegawai"
                                                        data-vv-as="Status Pegawai"
                                                        v-validate="{}"
                                                        placeholder="Select A Value ... " name="status_pegawai" :multiple="false" 
                                                        :datasource="status_pegawaiOptionList"
                                                        >
                                                    </dataselect>
                                                    <small v-show="errors.has('status_pegawai')" class="form-text text-danger">{{ errors.first('status_pegawai') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('tmt')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="tmt">TMT </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.tmt"
                                                    v-validate="{}"
                                                    data-vv-as="TMT"
                                                    name="tmt"
                                                    placeholder="Terhitung Mulai Tanggal"
                                                    :config="{
                                                    dateFormat: 'Y-m-d',
                                                    altFormat: 'F j, Y',
                                                    altInput: true, 
                                                    allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small v-show="errors.has('tmt')" class="form-text text-danger">{{ errors.first('tmt') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('kedudukan_pegawai')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="kedudukan_pegawai">Kedudukan Pegawai </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <dataselect
                                                        v-model="data.kedudukan_pegawai"
                                                        data-vv-value-path="data.kedudukan_pegawai"
                                                        data-vv-as="Kedudukan Pegawai"
                                                        v-validate="{}"
                                                        placeholder="Select A Value ... " name="kedudukan_pegawai" :multiple="false" 
                                                        :datasource="kedudukan_pegawaiOptionList"
                                                        >
                                                    </dataselect>
                                                    <small v-show="errors.has('kedudukan_pegawai')" class="form-text text-danger">{{ errors.first('kedudukan_pegawai') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('pendidikan_akhir')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="pendidikan_akhir">Pendidikan Akhir </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.pendidikan_akhir"
                                                    v-validate="{}"
                                                    data-vv-as="Pendidikan Akhir"
                                                    class="form-control "
                                                    type="text"
                                                    name="pendidikan_akhir"
                                                    placeholder="Contoh: S1 Pendidikan Bahasa Sunda"
                                                    />
                                                    <small v-show="errors.has('pendidikan_akhir')" class="form-text text-danger">
                                                        {{ errors.first('pendidikan_akhir') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('tahun_pendidikan')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="tahun_pendidikan">Tahun Lulus Pendidikan </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.tahun_pendidikan"
                                                    v-validate="{}"
                                                    data-vv-as="Tahun Lulus Pendidikan"
                                                    class="form-control "
                                                    type="text"
                                                    name="tahun_pendidikan"
                                                    placeholder="Enter Tahun Lulus Pendidikan"
                                                    />
                                                    <small v-show="errors.has('tahun_pendidikan')" class="form-text text-danger">
                                                        {{ errors.first('tahun_pendidikan') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('masa_kerja')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="masa_kerja">Masa Kerja </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.masa_kerja"
                                                    v-validate="{}"
                                                    data-vv-as="Masa Kerja"
                                                    class="form-control "
                                                    type="text"
                                                    name="masa_kerja"
                                                    placeholder="Contoh: 2 Tahun 3 Bulan"
                                                    />
                                                    <small v-show="errors.has('masa_kerja')" class="form-text text-danger">
                                                        {{ errors.first('masa_kerja') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('golongan')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="golongan">Golongan </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.golongan"
                                                    v-validate="{}"
                                                    data-vv-as="Golongan"
                                                    class="form-control "
                                                    type="text"
                                                    name="golongan"
                                                    placeholder="Contoh: III D"
                                                    />
                                                    <small v-show="errors.has('golongan')" class="form-text text-danger">
                                                        {{ errors.first('golongan') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('gaji_pokok')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="gaji_pokok">Gaji Pokok </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.gaji_pokok"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="Gaji Pokok"
                                                    class="form-control "
                                                    type="number"
                                                    name="gaji_pokok"
                                                    placeholder="Enter Gaji Pokok"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('gaji_pokok')" class="form-text text-danger">
                                                        {{ errors.first('gaji_pokok') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('no_karpeg')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="no_karpeg">No Kaartu Pegawai </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.no_karpeg"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="No Kaartu Pegawai"
                                                    class="form-control "
                                                    type="number"
                                                    name="no_karpeg"
                                                    placeholder="Enter No Kaartu Pegawai"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('no_karpeg')" class="form-text text-danger">
                                                        {{ errors.first('no_karpeg') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('no_askes')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="no_askes">No Askes / BPJS </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.no_askes"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="No Askes / BPJS"
                                                    class="form-control "
                                                    type="number"
                                                    name="no_askes"
                                                    placeholder="Enter No Askes / BPJS"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('no_askes')" class="form-text text-danger">
                                                        {{ errors.first('no_askes') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('npwp')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="npwp">NPWP </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.npwp"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="NPWP"
                                                    class="form-control "
                                                    type="number"
                                                    name="npwp"
                                                    placeholder="Enter NPWP"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('npwp')" class="form-text text-danger">
                                                        {{ errors.first('npwp') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('gol_darah')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="gol_darah">Gol Darah </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.gol_darah"
                                                    v-validate="{}"
                                                    data-vv-as="Gol Darah"
                                                    class="form-control "
                                                    type="text"
                                                    name="gol_darah"
                                                    placeholder="Enter Gol Darah"
                                                    />
                                                    <small v-show="errors.has('gol_darah')" class="form-text text-danger">
                                                        {{ errors.first('gol_darah') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('alamat_ktp')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="alamat_ktp">Alamat Sesuai KTP </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <textarea
                                                        v-model="data.alamat_ktp"
                                                        v-validate="{}"
                                                        data-vv-as="Alamat Sesuai KTP"
                                                        placeholder="Lengkap dengan No. Jalan, RT RW dan Kode Pos" 
                                                        rows="5" 
                                                        name="alamat_ktp" 
                                                    class=" form-control"></textarea>
                                                    <small v-show="errors.has('alamat_ktp')" class="form-text text-danger">{{ errors.first('alamat_ktp') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('alamat_domisili')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="alamat_domisili">Alamat Domisili Saat Ini </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <textarea
                                                        v-model="data.alamat_domisili"
                                                        v-validate="{}"
                                                        data-vv-as="Alamat Domisili Saat Ini"
                                                        placeholder="Lengkap dengan No. Jalan, RT RW dan Kode Pos" 
                                                        rows="5" 
                                                        name="alamat_domisili" 
                                                    class=" form-control"></textarea>
                                                    <small v-show="errors.has('alamat_domisili')" class="form-text text-danger">{{ errors.first('alamat_domisili') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary"  :disabled="errors.any()" type="submit">
                                            <i class="load-indicator">
                                                <clip-loader :loading="saving" color="#fff" size="15px"></clip-loader>
                                            </i>
                                            {{submitbuttontext}}
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var Data_PribadiAddComponent = Vue.component('data_pribadiAdd', {
		template : '#data_pribadiAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'data_pribadi',
			},
			routename : {
				type : String,
				default : 'data_pribadiadd',
			},
			apipath : {
				type : String,
				default : 'data_pribadi/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					foto: '',nama: '',nik: '',nip: '',nuptk: '',nrg: '',tempat_lahir: '',tgl_lahir: '',jenis_kelamin: '',status_kawin: '',agama: '',status_pegawai: '',tmt: '',kedudukan_pegawai: '',pendidikan_akhir: '',tahun_pendidikan: '',masa_kerja: '',golongan: '',gaji_pokok: '',no_karpeg: '',no_askes: '',npwp: '',gol_darah: '',alamat_ktp: '',alamat_domisili: '',
				},
				jenis_kelaminOptionList: [{"label":"Laki-laki","value":"Laki-laki"},{"label":"Perempuan","value":"Perempuan"}],
				status_kawinOptionList: [{"label":"Sudah","value":"Sudah"},{"label":"Belum","value":"Belum"}],
				status_pegawaiOptionList: [{"label":"Pns","value":"PNS"},{"label":"Cpns","value":"CPNS"},{"label":"Pppk","value":"PPPK"},{"label":"NON ASN","value":"NON ASN"}],
				kedudukan_pegawaiOptionList: [{"label":"Asn Provinsi","value":"ASN Provinsi"},{"label":"Asn Kementerian","value":"ASN Kementerian"},{"label":"Kontrak Daerah","value":"Kontrak Daerah"},{"label":"Kontrak Sekolah","value":"Kontrak Sekolah"}],
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Data Pribadi';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/data_pribadi');
			},
			resetForm : function(){
				this.data = {foto: '',nama: '',nik: '',nip: '',nuptk: '',nrg: '',tempat_lahir: '',tgl_lahir: '',jenis_kelamin: '',status_kawin: '',agama: '',status_pegawai: '',tmt: '',kedudukan_pegawai: '',pendidikan_akhir: '',tahun_pendidikan: '',masa_kerja: '',golongan: '',gaji_pokok: '',no_karpeg: '',no_askes: '',npwp: '',gol_darah: '',alamat_ktp: '',alamat_domisili: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
