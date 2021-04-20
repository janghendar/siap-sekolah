<?php 
$can_add = PageAccessManager::is_allowed('keluarga/add');
$can_edit = PageAccessManager::is_allowed('keluarga/edit');
$can_view = PageAccessManager::is_allowed('keluarga/view');
$can_delete = PageAccessManager::is_allowed('keluarga/delete');
?>
<template id="keluargaView">
    <section class="page-component">
        <div v-if="showheader" class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row ">
                    <div  class="col-12 comp-grid" :class="setGridSize">
                        <h3 class="record-title">View  Keluarga</h3>
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
                                                <th class="title"> Id :</th>
                                                <td class="value"> {{ data.id }} </td>
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
                                        <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/keluarga/edit/'  + data.id">
                                        <i class="fa fa-edit"></i> 
                                        </router-link>
                                        <?php 
                                        }
                                        ?>
                                        <?php 
                                        if($can_delete){
                                        ?>
                                        <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/keluarga/delete/' + data.id">
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
	var KeluargaViewComponent = Vue.component('keluargaView', {
		template : '#keluargaView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'keluarga',
			},
			routename : {
				type : String,
				default : 'keluargaview',
			},
			apipath: {
				type : String,
				default : 'keluarga/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Keluarga';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',
				}
			},
		},
	});
	</script>
