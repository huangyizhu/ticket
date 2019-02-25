<template>
    <div class="login">
        <section class="content">
            <el-form :model="form" :rules="rules2" ref="form" label-position="left" label-width="0px" class="demo-ruleForm card-box loginform">
                <h3 class="title">{{systemName}}</h3>
                <el-form-item prop="username">
                    <el-input type="text" v-model="form.username" auto-complete="off" placeholder="账号"></el-input>
                </el-form-item>
                <el-form-item prop="password">
                    <el-input type="password" v-model="form.password" auto-complete="off" placeholder="密码"></el-input>
                </el-form-item>
                <el-form-item style="width:100%;">
                    <el-button type="primary" style="width:100%;" v-loading="loading" @click.native.prevent="handleSubmit2('form')">登录</el-button>
                </el-form-item>
            </el-form>
        </section>
        <button @click="handleSubmit3">点击</button>
        <div id="myDiv"></div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            systemName: '登录',
            loading: false,
            form: {
                username: '',
                password: ''
            },
            rules2: {
                username: [
                    { required: true, message: '请输入账号', trigger: 'blur' }
                ],
                password: [
                    { required: true, message: '请输入密码', trigger: 'blur' }
                ]
            }
        }
    },
    methods: {
        handleSubmit2 () {
            if (!this.form.username || !this.form.password) {
               return false;
            }
            this.axios.post('/apis/index/index/info', {
                username: this.form.username,
                password: this.form.password
            }).then( (response) => {
                console.log(response);
                this.$message({
                    type: 'info',
                    message: response.data
                });
            }).catch(function (error) {
                console.log(error);
            });
        },
        handleSubmit3 () {
            var xmlhttp;
            if (window.XMLHttpRequest)
            {
                // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp=new XMLHttpRequest();
            }
            else
            {
                // IE6, IE5 浏览器执行代码
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST","/apis/index/index/index",true);
            xmlhttp.send();
        }
    },
    
    mounted () {
        window.addEventListener('keyup', (e) => {
            if (e.keyCode === 13) {
                this.handleSubmit2('form')
            }
        })
    }
}
</script>

<style>
    .login{
        display: flex;
        width: 100%;
        height: 100%;
        background-color: #5b8cff;
        align-items: center;
        justify-content: center;
    }
    .content{
        width: 420px;
        height: 300px;
        background-color: #fff;
    }
    .loginform {
        width: 350px;
        padding: 35px 35px 15px 35px;
    }
</style>
