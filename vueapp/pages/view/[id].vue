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
                            Description
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ product.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ product.qnt }}
                        </td>
                        <td class="px-6 py-4">
                            <a> <img class="w-[100px]" :src="product.image" alt="Not Find" border="0" :alt="no"> </a>
                        </td>
                        <td class="px-6 py-4">
                            {{ product.price }}
                        </td>
                        <td class="flex items-stretch py-9">
                               {{ product.description }}
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
            ProductId: '',
            product: {
                name: '',
                price: '',
                description: '',
                qnt: '',
                image: '',
            },
        };
    },
    mounted() {
         this.ProductId = this.$route.params.id
        this.getProducts(this.ProductId);
    },
    methods: {
       getProducts(ProductId) {
            this.isloading = true,
                axios.get(`http://127.0.0.1:8000/api/view/${ProductId}`).then(res => {
                    this.product = res.data;
                    this.isloading = false;
                });
        },
    },

};
</script>