<template>
    <div class=" d-flex justify-content-center">
        <div class="filters  p-2 border h-25 d-flex flex-row sm-flex-column align-items-center gap-3">
            <select v-model="category" name="" id="" class="form-select text-primary">
                <option value="">Category</option>
                <option v-for="category in categories" :value="category.category_id" :key="category.category_id">
                    {{category.category_name}}
                </option>
            </select>
            <select v-model="brand" name="" id="" class="form-select text-primary">
                <option value="">Brand</option>
                <option v-for="brand in brands" :value="brand.brand_id" :key="brand.brand_id">
                    {{brand.brand_name}}
                </option>
            </select>
            <select v-model="price" name="" id="" class="form-select text-primary">
                <option value="">price</option>
                <option value="50">500</option>
            </select>
            <select name="" id="" class="form-select text-primary">
                <option value="">Brand</option>
            </select>
            <select name="" id="" class="form-select text-primary">
                <option value="">Brand</option>
            </select>
            <select name="" id="" class="form-select text-primary">
                <option value="">Brand</option>
            </select>
            <select name="" id="" class="form-select text-primary">
                <option value="">Brand</option>
            </select>
            <button class="btn btn-primary" @click="filterProducts()">Filter</button>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            category:"",
            brand:"",
            price:"",
            categories:[],
            brands:[],
        }
    },
    mounted(){
        axios.get('/api/categories').
            then((response)=>{
                this.categories = response.data.categories
                this.brands = response.data.brands
            })
    },
    methods:{
        filterProducts(){
            axios.post('/api/filterProducts',{
                category:this.category,
                brand:this.brand,
                price:this.price
            }).then((response)=>{
                var products = response.data.data
                this.$emit('filter',products)
            })
        }
    }
}
</script>

<style lang="css" scoped>
    .filters{
        border-radius:40px;
    }
    select{
        border:none;
        width:min-content;
        font-weight: 600;
    }
</style>