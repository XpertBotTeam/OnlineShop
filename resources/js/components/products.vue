<template>
    <filters @filter="updateProducts"></filters>
    <div class="w-100 p-4 products-grid">
        <div class="product d-flex flex-column" v-for="product in products" :key="product.product_id">
            <div class="w-100 h-75 bg-danger">
                <img class="w-100" :src="'../images/'+product.product_image" alt="" style="height:30vh">
            </div>
            <div class="w-100 d-flex flex-column p-2">
                <span>{{product.name}}</span>
                <span class='w-100'>{{product.description}}</span>
                <div class="w-100 d-flex justify-content-between" style="position:relative">
                    <span >{{product.price}}$</span>
                    <button class="btn btn-primary text-center addBTN" @click="addToCart(product)" >+</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import filters from './filters.vue'
export default {
    data () {
        return {
            products:[],
            categories:[],
            category:"",
            departement:""
        }
    },
    components:{
        filters
    },
    mounted(){
        var url = window.location.href
        this.category = new URL(location.href).searchParams.get('category')
        this.departement = url.split('/')[4]
        if(this.category==null){
            axios.get('/api/products',{
                params:{
                    dep:this.departement
                }
            })
            .then((response)=>{
                var categories = response.data.data[0].categories;
                for(var i=0;i<categories.length;i++){
                    var products = categories[i].products
                    for(var j=0;j<products.length;j++){
                        this.products.push(products[j])
                    }
                }
            })
        }
        else {
            axios.get('/api/products',{
                params:{
                    cat:this.category
                }
            }).then((response)=>{
                this.categories = response
                this.products = response.data.data[0].products
            })
        }
    },
    methods:{
        updateProducts(products){
            this.products = products
        },
        addToCart(product){
            axios.post('/api/addToCart',{
                product:product
            })
            .catch((error)=>{
                if(error.response.status !='200')
                    window.location = "/login";
            })
            .then((response)=>{
                console.log(response)
            })
        }
    }
}
</script>

<style lang="css" scoped>
    .products-grid{
        display:grid;
        grid-template-columns: auto auto auto auto   ;
        row-gap: 20%;
        margin:auto; 
    }
    .addBTN{
        border-radius:50%;
        width:7vh;
        aspect-ratio:1;
        font-size:x-large;
        position:absolute;
        left:95%;
        font-family: cascadia code;
    }
    .product{
        border:1px solid black;
        position:relative;
        width:300px;
        height:40vh;
    }

    .product-description{
        text-align: justify;
    }
</style>