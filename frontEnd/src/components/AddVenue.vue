<template>
	<div class="m-l-50 m-t-30 w-500">
         <router-link class="btn-link-large add-btn" to="list">
            <el-button type="info">返回</el-button>
        </router-link>
		<el-form ref="form" label-width="110px">
			<el-form-item label="场馆名称" prop="title">
				<el-input v-model="name" class="h-40 w-200"></el-input>
			</el-form-item>
			<el-form-item label="场馆地址" prop="title">
				<el-input v-model="address" class="h-40 w-200"></el-input>
			</el-form-item>
            <el-form-item  label="场馆描述" prop="title">
				<el-input v-model="describe" type="textarea" :rows="4" class="h-40 w-200"></el-input>
			</el-form-item>
            <el-form-item label="场馆内部布局图" prop="title">
                <el-upload
                    :action="uploadUrl"
                    list-type="picture-card"
                    name='files'
                    accept=".png,.gif,.ico,.jpg"
                    :on-preview="handlePictureCardPreview"
                    :on-success = "inImageSucess"
                    :on-remove="handleRemove">
                    <i class="el-icon-plus"></i>
                </el-upload>
                <el-dialog :visible.sync="dialogVisible">
                    <img width="100%" :src="dialogImageUrl" alt="">
                </el-dialog>
            </el-form-item>
            <el-form-item  label="场馆外景图" prop="title">
                <el-upload
                    :action="uploadUrl"
                    list-type="picture-card"
                    name='files'
                    accept=".png,.gif,.ico,.jpg"
                    :on-preview="handlePictureCardPreview"
                    :on-success = "outImageSucess"
                    :on-remove="handleRemove">
                    <i class="el-icon-plus"></i>
                </el-upload>
                <el-dialog :visible.sync="dialogVisible">
                    <img width="100%" :src="dialogImageUrl" alt="">
                </el-dialog>
            </el-form-item>
            <el-footer>
                <el-button type="primary" @click="addFunc">提交</el-button>
            </el-footer>
		</el-form>
	</div>
</template>
<style>
    .el-upload--picture-card{
        width: 80px;
        height: 80px;
        line-height: 88px;
    }
</style>
<script>
    export default {
        data() {
            return {
                uploadUrl: 'http://www.hyz.com/index/index/show',
                dialogImageUrl: '',
                dialogVisible: false,
                insideImage: [],
                outsideImage: [],
                name: '',
                address: '',
                describe: ''
            }
        },
        methods: {
            handleRemove(file, fileList) {
                console.log(file, fileList);
            },
            handlePictureCardPreview(file) {
                this.dialogImageUrl = file.url;
                this.dialogVisible = true;
            },
            inImageSucess(file){
                console.log(file)
                this.insideImage.push(file)
              
            },
            outImageSucess(file){
                this.outsideImage.push(file)
            },
            addFunc(){
                this.axios.post('/apis/index/venue/add', {
                    veuenName: this.name,
                    describe: this.describe,
                    outsideimage: JSON.stringify(this.insideImage),
                    insideimage: JSON.stringify(this.insideImage),
                    address: this.address
                }).then( (response) => {
                    this.$message({
                        type: 'info',
                        message: response.data
                    });
                    this.$router.push({ name: 'list' });
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>