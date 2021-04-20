        <template id="Home">
            <div>
                <div  class="bg-light p-3 mb-3">
                    <div class="container">
                        <div class="row ">
                            <div  class="col-md-12 comp-grid" :class="setGridSize">
                                <h3 >Dashboard</h3>
                            </div>
                            <div  class="col-md-3 col-sm-4 col-6 comp-grid" :class="setGridSize">
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="pb-2 mb-3 border-bottom">
                    <div class="container">
                        <div class="row ">
                            <div  class="col-md-12 comp-grid" :class="setGridSize">
                                <h3 >Halo Admin</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="pb-2 mb-3 border-bottom">
                    <div class="container">
                        <div class="row ">
                            <div  class="col-md-12 comp-grid" :class="setGridSize">
                            </div>
                            <div  class="col-md-3 col-sm-4 col-6 comp-grid" :class="setGridSize">
                            <recordcount animate="zoomIn" datapath="components/getcount_jumlahpegawai" title="Jumlah Pegawai" desc="" link="/data_pribadi" icon='<i class="fa fa-users "></i>'  displaystyle="card" variant="danger"></recordcount>
                        </div>
                        <div  class="col-md-3 col-sm-4 col-6 comp-grid" :class="setGridSize">
                        <recordcount animate="zoomIn" datapath="components/getcount_jumlahguru" title="Jumlah Guru" desc="" link="/user" icon='<i class="fa fa-mortar-board "></i>'  displaystyle="card" variant="danger"></recordcount>
                    </div>
                    <div  class="col-md-3 col-sm-4 col-6 comp-grid" :class="setGridSize">
                    <recordcount animate="zoomIn" datapath="components/getcount_jumlahtu" title="Jumlah TU" desc="" link="/user" icon='<i class="fa fa-globe"></i>'  displaystyle="card" variant="info"></recordcount>
                </div>
            </div>
        </div>
        </div>
        </div>
        </template>
        <script>
			var HomeComponent = Vue.component('HomeComponent', {
				template : '#Home',
				props: {
					resetgrid : {
						type : Boolean,
						default : false,
					},
				},
				data : function() {
					return {
						loading : false,
						ready: false,
					}
				},
				computed: {
					setGridSize: function(){
						if(this.resetgrid){
							return 'col-sm-12 col-md-12 col-lg-12';
						}
					}
				},
				methods : {

				},
				mounted : function() {
					this.ready = true;
				},
			});
		</script>
	