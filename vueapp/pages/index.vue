<template>
    <div class="container mx-auto">
        
    <div class="relative overflow-x-auto">
        <table class="w-full my-3 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in products" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ item.name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item.qnt }}
                    </td>
                    <td class="px-6 py-4">
                       <a> <img class="w-[100px]" :src="item.image" alt="Not Find" border="0" :alt="no"> </a>
                    </td>
                    <td class="px-6 py-4">
                        {{ item.price }}
                    </td>
                    <td class="flex items-stretch py-9">
                            <button @click="DeleteProduct($event, item.id)" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                          <NuxtLink :to="`/${item.id}`"><button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Edit</button>
                          </NuxtLink>
                          <NuxtLink :to="`/view/${item.id}`">
                          <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 mx-2 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">View</button>
                           </NuxtLink>
                    </td> 
                </tr>
            </tbody>
        </table>
    </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            products: [],
        };
    },
    mounted() {
        this.getProduct();
    },
    methods: {
        DeleteProduct(event, productId) {
            if (confirm("Are you sure you want to delete")) {
                axios.delete(`http://127.0.0.1:8000/api/delete/${productId}`).then(res => {
                    this.getProduct();
                    alert('Delete product successfully');
                });
            }
        },
         getProduct() {
            
            axios.get('http://127.0.0.1:8000/api/view').then(res => {    
                   this.products = res.data;
                 });
        },
           
        },     
    
};
</script>