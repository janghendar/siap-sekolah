<?php 
$can_add = PageAccessManager::is_allowed('kepegawaian/add');
$can_edit = PageAccessManager::is_allowed('kepegawaian/edit');
$can_view = PageAccessManager::is_allowed('kepegawaian/view');
$can_delete = PageAccessManager::is_allowed('kepegawaian/delete');
?>
<template id="kepegawaianView">
    <section class="page-component">
        <div v-if="showheader" class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row ">
                    <div  class="col-12 comp-grid" :class="setGridSize">
                        <h3 class="record-title">View  Kepegawaian</h3>
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
                                        <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/kepegawaian/edit/'  + data.id">
                                        <i class="fa fa-edit"></i> 
                                        </router-link>
                                        <?php 
                                        }
                                        ?>
                                        <?php 
                                        if($can_delete){
                                        ?>
                                        <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/kepegawaian/delete/' + data.id">
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
	var KepegawaianViewComponent = Vue.component('kepegawaianView', {
		template : '#kepegawaianView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'kepegawaian',
			},
			routename : {
				type : String,
				default : 'kepegawaianview',
			},
			apipath: {
				type : String,
				default : 'kepegawaian/view',
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
				return 'View  Kepegawaian';
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
