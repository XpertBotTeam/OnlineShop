<template>
    <div class="categories-grid">
        <div class="category-item" v-for="headCategory in headCategories" :key="headCategory.id">
            <div class="d-flex justify-content-between">
                <h5>Shop for {{headCategory.name}}</h5>
                <a :href="'shop/'+headCategory.name">View all</a>
            </div>
            <br>
            <div class="p-2 h-75 d-flex justify-content-center w-100">
                <div class="subCategory-grid">   
                        <div class="subCategory-item" v-for="subCat in headCategory.categories" :key="subCat.id">
                            <a :href="'shop/'+headCategory.name+'?category='+subCat.name">
                                <h6>{{ subCat.name }}</h6>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data(){
        return{
            headCategories:[]
        }
    },
    mounted(){
        axios.get('api/homeCategories').then((response)=>{
            this.headCategories = response.data.data
        })
    }
}
</script>