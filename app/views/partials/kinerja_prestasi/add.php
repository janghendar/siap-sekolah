    <template id="kinerja_prestasiAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Kinerja Prestasi</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="kinerja_prestasi/add" method="post">
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
	var Kinerja_PrestasiAddComponent = Vue.component('kinerja_prestasiAdd', {
		template : '#kinerja_prestasiAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'kinerja_prestasi',
			},
			routename : {
				type : String,
				default : 'kinerja_prestasiadd',
			},
			apipath : {
				type : String,
				default : 'kinerja_prestasi/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Kinerja Prestasi';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/kinerja_prestasi');
			},
			resetForm : function(){
				this.data = {};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
