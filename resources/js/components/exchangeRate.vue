<template>
    <marquee class='marquee bg-dark'>
        <div class="rates">
                <div class='currency-block' v-for="(index,currency) in rates">
                    {{currency}}:
                    <span class="text-white" style="font-weight:normal">{{index}}</span>
                </div>
        </div>
    </marquee>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                rates:[]
            }
        },
        mounted(){
            axios.get('https://api.exchangerate.host/latest').then((response)=>{
                this.rates = response.data.rates
            })
        }
        
    }
</script>
<style scoped>
    .rates{
        height:50px;
        color:red;
        display: flex;
        font-weight: bold;
        flex-direction: row;
        align-items:center;
        gap:1rem;
    }
    .currency-block{
        border-right:1px solid white;
        padding-right:10px;
    }
    .marquee{
        width:100%;
        margin-top:0; 
    }
    
</style>

