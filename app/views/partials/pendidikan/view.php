<?php 
$can_add = PageAccessManager::is_allowed('pendidikan/add');
$can_edit = PageAccessManager::is_allowed('pendidikan/edit');
$can_view = PageAccessManager::is_allowed('pendidikan/view');
$can_delete = PageAccessManager::is_allowed('pendidikan/delete');
?>
<template id="pendidikanView">
    <section class="page-component">
        <div v-if="showheader" class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row ">
                    <div  class="col-12 comp-grid" :class="setGridSize">
                        <h3 class="record-title">View  Pendidikan</h3>
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
                                                <th class="title"> Jurusan / Bidang Ilmu :</th>
                                                <td class="value"> {{ data.jurusan }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> No Ijazah :</th>
                                                <td class="value"> {{ data.no_ijazah }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Tanggal Ijazah :</th>
                                                <td class="value"> {{ data.tanggal }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Universitas :</th>
                                                <td class="value"> {{ data.univ }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Ipk :</th>
                                                <td class="value"> {{ data.IPK }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Lokasi :</th>
                                                <td class="value"> {{ data.lokasi }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> File Ijazah :</th>
                                                <td class="value"><a class="btn btn-info btn-sm" target="" v-if="data.file_ijazah" :href="data.file_ijazah"><i class="fa fa-file"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th class="title"> File Transkrip :</th>
                                                <td class="value"><a class="btn btn-info btn-sm" target="" v-if="data.file_transkrip" :href="data.file_transkrip"><i class="fa fa-file"></i></a></td>
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
                                        <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/pendidikan/edit/'  + data.id">
                                        <i class="fa fa-edit"></i> 
                                        </router-link>
                                        <?php 
                                        }
                                        ?>
                                        <?php 
                                        if($can_delete){
                                        ?>
                                        <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/pendidikan/delete/' + data.id">
                                        <i class="fa fa-times"></i> </button>
                                        <?php 
                                        }
                                        ?>
                                    </span>
                                    <button @click="exportRecord" class="btn btn-sm btn-primary" v-if="exportbutton">
                                        <i class="fa fa-save"></i> 
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
	var PendidikanViewComponent = Vue.component('pendidikanView', {
		template : '#pendidikanView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'pendidikan',
			},
			routename : {
				type : String,
				default : 'pendidikanview',
			},
			apipath: {
				type : String,
				default : 'pendidikan/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',jurusan: '',no_ijazah: '',tanggal: '',univ: '',IPK: '',lokasi: '',file_ijazah: '',file_transkrip: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Pendidikan';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',jurusan: '',no_ijazah: '',tanggal: '',univ: '',IPK: '',lokasi: '',file_ijazah: '',file_transkrip: '',
				}
			},
		},
	});
	</script>
