<template>
    <div class="content">
        <el-header style="background-color: #bbb">
            <router-link class="btn-link-large add-btn" to="add">
                <el-button type="primary">添加场馆</el-button>
            </router-link>
        </el-header>
         <el-table :data="list">
            <el-table-column prop="venue_name" label="场馆名称" width="140"></el-table-column>
            <el-table-column prop="address" label="场馆地址" width="120"></el-table-column>
            <el-table-column prop="insideimage" label="场馆内部布局图"></el-table-column>
            <el-table-column prop="outsideimage" label="场馆外景图"></el-table-column>
            <el-table-column prop="venue_describe" label="场馆描述"></el-table-column>
            <el-table-column label="场馆描述" width="140">
                <router-link class="btn-link-large add-btn" to="detail">
                    <el-button type="primary">查看详情</el-button>
                </router-link>
            </el-table-column>
        </el-table> 
    </div>
</template>
<script>
export default {
    data() {
        const item = {
            date: '2016-05-02',
            name: '黄毅柱',
            address: '上海市普陀区金沙江路 1518 弄'
        };
        return {
            tableData: Array(10).fill(item),
            flag: false,
            list: []
        }
    },
    mounted () {
        this.get_list()
    },
    methods: {
        get_list: function () {
            this.axios.get('/apis/index/venue/get_list', {
                
            }).then( (res) => {
                this.list = res.data.data;
                
            }).catch(function (error) {
                console.log(error);
            });
        }
    }
}
</script>
<style>
</style>


