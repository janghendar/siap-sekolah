<?php 
$can_add = PageAccessManager::is_allowed('data_pribadi/add');
$can_edit = PageAccessManager::is_allowed('data_pribadi/edit');
$can_view = PageAccessManager::is_allowed('data_pribadi/view');
$can_delete = PageAccessManager::is_allowed('data_pribadi/delete');
?>
<template id="data_pribadiView">
    <section class="page-component">
        <div v-if="showheader" class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row ">
                    <div  class="col-12 comp-grid" :class="setGridSize">
                        <h3 class="record-title">View  Data Pribadi</h3>
                    </div>
                </div>
            </div>
        </div>
        <div  class="pb-2 mb-3 border-bottom">
            <div class="container">
                <div class="row ">
                    <div  class="col-md-12 comp-grid" :class="setGridSize">
                        <div  class=" animated fadeIn">
                            <div v-show="!loading">
                                <div ref="datatable" id="datatable">
                                    <table class="table table-hover table-borderless table-striped">
                                        <!-- Table Body Start -->
                                        <tbody>
                                            <tr>
                                                <th class="title"> Foto Terbaru :</th>
                                                <td class="value"><niceimg :link="data.foto" :path="data.foto" width="400" height="400" ></niceimg></td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Nama Lengkap :</th>
                                                <td class="value"> {{ data.nama }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> NIK :</th>
                                                <td class="value"> {{ data.nik }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> NIP :</th>
                                                <td class="value"> {{ data.nip }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> NUPTK :</th>
                                                <td class="value"> {{ data.nuptk }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> NRG :</th>
                                                <td class="value"> {{ data.nrg }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Tempat Lahir :</th>
                                                <td class="value"> {{ data.tempat_lahir }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Tanggal Lahir :</th>
                                                <td class="value"> {{ data.tgl_lahir }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Jenis Kelamin :</th>
                                                <td class="value"> {{ data.jenis_kelamin }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Status Perkawinan :</th>
                                                <td class="value"> {{ data.status_kawin }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Agama :</th>
                                                <td class="value"> {{ data.agama }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Status Pegawai :</th>
                                                <td class="value"> {{ data.status_pegawai }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> TMT :</th>
                                                <td class="value"> {{ data.tmt }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Kedudukan Pegawai :</th>
                                                <td class="value"> {{ data.kedudukan_pegawai }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Pendidikan Akhir :</th>
                                                <td class="value"> {{ data.pendidikan_akhir }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Tahun Pendidikan :</th>
                                                <td class="value"> {{ data.tahun_pendidikan }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Masa Kerja :</th>
                                                <td class="value"> {{ data.masa_kerja }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Golongan :</th>
                                                <td class="value"> {{ data.golongan }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Gaji Pokok :</th>
                                                <td class="value"> {{ data.gaji_pokok }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> No Karpeg :</th>
                                                <td class="value"> {{ data.no_karpeg }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> No Askes / BPJS :</th>
                                                <td class="value"> {{ data.no_askes }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> NPWP :</th>
                                                <td class="value"> {{ data.npwp }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Gol Darah :</th>
                                                <td class="value"> {{ data.gol_darah }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Alamat KTP :</th>
                                                <td class="value"> {{ data.alamat_ktp }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Alamat Domisili :</th>
                                                <td class="value"> {{ data.alamat_domisili }} </td>
                                            </tr>
                                        </tbody>
                                        <!-- Table Body End -->
                                    </table>
                                </div>
                                <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                    <span >
                                        <?php 
                                        if($can_edit){
                                        ?>
                                        <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/data_pribadi/edit/'  + data.id">
                                        <i class="fa fa-edit"></i> Edit
                                        </router-link>
                                        <?php 
                                        }
                                        ?>
                                        <?php 
                                        if($can_delete){
                                        ?>
                                        <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/data_pribadi/delete/' + data.id">
                                        <i class="fa fa-times"></i> Hapus</button>
                                        <?php 
                                        }
                                        ?>
                                    </span>
                                    <button @click="exportRecord" class="btn btn-sm btn-primary" v-if="exportbutton">
                                        <i class="fa fa-save"></i> Cetak
                                    </button>
                                </div>
                            </div>
                            <div v-show="loading" class="load-indicator static-center">
                                <span class="animator">
                                    <clip-loader :loading="loading" color="gray" size="20px">
                                    </clip-loader>
                                </span>
                                <h4 style="color:gray" class="loading-text"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
	var Data_PribadiViewComponent = Vue.component('data_pribadiView', {
		template : '#data_pribadiView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'data_pribadi',
			},
			routename : {
				type : String,
				default : 'data_pribadiview',
			},
			apipath: {
				type : String,
				default : 'data_pribadi/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',foto: '',nama: '',nik: '',nip: '',nuptk: '',nrg: '',tempat_lahir: '',tgl_lahir: '',jenis_kelamin: '',status_kawin: '',agama: '',status_pegawai: '',tmt: '',kedudukan_pegawai: '',pendidikan_akhir: '',tahun_pendidikan: '',masa_kerja: '',golongan: '',gaji_pokok: '',no_karpeg: '',no_askes: '',npwp: '',gol_darah: '',alamat_ktp: '',alamat_domisili: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Data Pribadi';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',foto: '',nama: '',nik: '',nip: '',nuptk: '',nrg: '',tempat_lahir: '',tgl_lahir: '',jenis_kelamin: '',status_kawin: '',agama: '',status_pegawai: '',tmt: '',kedudukan_pegawai: '',pendidikan_akhir: '',tahun_pendidikan: '',masa_kerja: '',golongan: '',gaji_pokok: '',no_karpeg: '',no_askes: '',npwp: '',gol_darah: '',alamat_ktp: '',alamat_domisili: '',
				}
			},
		},
	});
	</script>
