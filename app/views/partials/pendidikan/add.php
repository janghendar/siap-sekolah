    <template id="pendidikanAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Pendidikan</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="pendidikan/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('univ')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="univ">Universitas <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.univ"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Universitas"
                                                    class="form-control "
                                                    type="text"
                                                    name="univ"
                                                    placeholder="Enter Universitas"
                                                    />
                                                    <small v-show="errors.has('univ')" class="form-text text-danger">
                                                        {{ errors.first('univ') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('jurusan')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="jurusan">Jurusan / Bidang Ilmu <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.jurusan"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Jurusan / Bidang Ilmu"
                                                    class="form-control "
                                                    type="text"
                                                    name="jurusan"
                                                    placeholder="Enter Jurusan / Bidang Ilmu"
                                                    />
                                                    <small v-show="errors.has('jurusan')" class="form-text text-danger">
                                                        {{ errors.first('jurusan') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('no_ijazah')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="no_ijazah">No Ijazah <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.no_ijazah"
                                                    v-validate="{required:true}"
                                                    data-vv-as="No Ijazah"
                                                    class="form-control "
                                                    type="text"
                                                    name="no_ijazah"
                                                    placeholder="Enter No Ijazah"
                                                    />
                                                    <small v-show="errors.has('no_ijazah')" class="form-text text-danger">
                                                        {{ errors.first('no_ijazah') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('tanggal')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="tanggal">Tanggal Ijazah <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.tanggal"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Tanggal Ijazah"
                                                    name="tanggal"
                                                    placeholder="Enter Tanggal Ijazah"
                                                    :config="{
                                                    dateFormat: 'Y-m-d',
                                                    altFormat: 'F j, Y',
                                                    altInput: true, 
                                                    allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small v-show="errors.has('tanggal')" class="form-text text-danger">{{ errors.first('tanggal') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('IPK')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="IPK">IPK <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.IPK"
                                                    v-validate="{required:true}"
                                                    data-vv-as="IPK"
                                                    class="form-control "
                                                    type="text"
                                                    name="IPK"
                                                    placeholder="Enter IPK"
                                                    />
                                                    <small v-show="errors.has('IPK')" class="form-text text-danger">
                                                        {{ errors.first('IPK') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('lokasi')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="lokasi">Lokasi <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.lokasi"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Lokasi"
                                                    class="form-control "
                                                    type="text"
                                                    name="lokasi"
                                                    placeholder="Enter Lokasi"
                                                    />
                                                    <small v-show="errors.has('lokasi')" class="form-text text-danger">
                                                        {{ errors.first('lokasi') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('file_ijazah')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="file_ijazah">File Ijazah <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <niceupload
                                                        fieldname="file_ijazah"
                                                        control-class="upload-control"
                                                        dropmsg="Drop files here to upload"
                                                        uploadpath="uploads/files/"
                                                        filenameformat="random" 
                                                        extensions="pdf"  
                                                        :filesize="3" 
                                                        :maximum="1" 
                                                        name="file_ijazah"
                                                        v-model="data.file_ijazah"
                                                        v-validate="{required:true}"
                                                        data-vv-as="File Ijazah"
                                                        >
                                                    </niceupload>
                                                    <small v-show="errors.has('file_ijazah')" class="form-text text-danger">{{ errors.first('file_ijazah') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('file_transkrip')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="file_transkrip">File Transkrip <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <niceupload
                                                        fieldname="file_transkrip"
                                                        control-class="upload-control"
                                                        dropmsg="Drop files here to upload"
                                                        uploadpath="uploads/files/"
                                                        filenameformat="random" 
                                                        extensions="pdf"  
                                                        :filesize="3" 
                                                        :maximum="1" 
                                                        name="file_transkrip"
                                                        v-model="data.file_transkrip"
                                                        v-validate="{required:true}"
                                                        data-vv-as="File Transkrip"
                                                        >
                                                    </niceupload>
                                                    <small v-show="errors.has('file_transkrip')" class="form-text text-danger">{{ errors.first('file_transkrip') }}</small>
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
	var PendidikanAddComponent = Vue.component('pendidikanAdd', {
		template : '#pendidikanAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'pendidikan',
			},
			routename : {
				type : String,
				default : 'pendidikanadd',
			},
			apipath : {
				type : String,
				default : 'pendidikan/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					univ: '',jurusan: '',no_ijazah: '',tanggal: '',IPK: '',lokasi: '',file_ijazah: '',file_transkrip: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Tambah Pendidikan';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/pendidikan');
			},
			resetForm : function(){
				this.data = {univ: '',jurusan: '',no_ijazah: '',tanggal: '',IPK: '',lokasi: '',file_ijazah: '',file_transkrip: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
