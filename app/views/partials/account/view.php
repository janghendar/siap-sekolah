<?php 
$can_add = PageAccessManager::is_allowed('account/add');
$can_edit = PageAccessManager::is_allowed('account/edit');
$can_view = PageAccessManager::is_allowed('account/view');
$can_delete = PageAccessManager::is_allowed('account/delete');
?>
<template id="accountView">
    <section class="page-component">
        <div v-if="showheader" class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row ">
                    <div  class="col-12 comp-grid" :class="setGridSize">
                        <h3 class="record-title">My Account</h3>
                    </div>
                </div>
            </div>
        </div>
        <div  class="pb-2 mb-3 border-bottom">
            <div class="container">
                <div class="row ">
                    <div  class="col-md-12 comp-grid" :class="setGridSize">
                        <div  class=" animated fadeIn">
                            <div class="profile-bg mb-2">
                                <div class="profile">
                                    <div class="d-flex flex-row">
                                        <niceimg width="100" height="100" :path="data.foto"></niceimg>
                                    </div>
                                    <h2 class="title">{{data.accountname}}</h2>
                                </div>
                            </div>
                            <div class="card">
                                <b-tabs vertical pills card class="" >
                                <b-tab title='<i class="fa fa-account"></i> My Account'>
                                <div>
                                    <div>
                                        <h5 class="text-bold">Account Detail</h5>
                                        <hr />
                                        <table class="table table-hover table-borderless table-striped">
                                            <tbody>
                                                <tr>
                                                    <th class="title"> Id :</th>
                                                    <td class="value"> {{ data.id }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Username :</th>
                                                    <td class="value"> {{ data.accountname }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Nama :</th>
                                                    <td class="value"> {{ data.nama }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Email :</th>
                                                    <td class="value"> {{ data.email }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Role :</th>
                                                    <td class="value"> {{ data.role }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Foto :</th>
                                                    <td class="value"><niceimg :path="data.foto" width="400" height="400" ></niceimg> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div v-show="loading" class="load-indicator static-center">
                                        <span class="animator">
                                            <clip-loader :loading="loading" color="gray" size="20px">
                                            </clip-loader>
                                        </span>
                                        <h4 style="color:gray" class="loading-text"></h4>
                                    </div>
                                    <div class="text-muted" v-if="!data && emptyrecordmsg != '' && !loading">
                                        <h4><i class="fa fa-ban"></i> No Record Found</h4>
                                    </div>
                                </div>
                                </b-tab>
                                <b-tab title='<i class="fa fa-edit"></i> Edit Account'>
                                <account-edit :resetgrid="true" v-if="ready"></account-edit>
                                </b-tab>
                                <b-tab title='<i class="fa fa-key"></i> Reset Password'>
                                <?php $this->load_view('passwordmanager/index.php') ?>
                                </b-tab>
                                <b-tab title='<i class="fa fa-envelope"></i> Change Email'>
                                <?php $this->load_view('account/change_email.php') ?>
                                </b-tab>
                                </b-tabs>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
	var AccountViewComponent = Vue.component('accountView', {
		template : '#accountView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'account',
			},
			routename : {
				type : String,
				default : 'accountaccountview',
			},
			apipath: {
				type : String,
				default : 'account',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',accountname: '',nama: '',email: '',role: '',foto: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'My Account';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',accountname: '',nama: '',email: '',role: '',foto: '',
				}
			},
		},
	});
	</script>
