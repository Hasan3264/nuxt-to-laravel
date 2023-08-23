<template>
    <div class="container mx-auto">

        <div class="max-w-xl mx-auto bg-white p-6 my-5 rounded shadow">
            <h2 class="text-2xl font-semibold mb-4 text-[#003F62]">Add Product</h2>
            <div class="card">
                <!-- <div v-if="this.errorList.image">
                    {{ this.errorList.image[0] }}
                </div> -->
                <div v-if="isloading">
                    <Loading :title="isloadingtext" />
                </div>
               <div v-else>
                 <form method="POST" enctype="multipart/form-data" @submit.prevent="submitProduct">
                      
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" placeholder="Product Name" v-model="product.name" name="name"
                                class="mt-1 p-2 w-full rounded border border-gray-300">
                                <!-- <span class=" text-red-700" v-if="this.errorList.name"> {{ this.errorList.name[0] }}</span> -->
                        </div>    
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="url" v-model="product.image" id="image" name="image" placeholder="Input Hosted Image Url only"
                                class="mt-1 p-2 w-full rounded border border-gray-300">

                                <!-- <span class=" text-red-700" v-if="this.errorList.image"> {{ this.errorList.image[0] }}</span> -->
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" v-model="product.price" id="price" placeholder="Input Price" name="price"
                                class="mt-1 p-2 w-full rounded border border-gray-300">
                                 <!-- <span class=" text-red-700" v-if="this.errorList.price"> {{ this.errorList.price[0] }}</span> -->
                        </div>

                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" v-model="product.description" name="description" rows="4"
                                class="mt-1 p-2 w-full rounded border border-gray-300"></textarea>
                                  <!-- <span class=" text-red-700" v-if="this.errorList.description"> {{ this.errorList.description[0] }}</span> -->
                        </div>



                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" v-model="product.qnt" placeholder="Qntity " id="qnt" name="qnt"
                                class="mt-1 p-2 w-full rounded border border-gray-300">
                                <!-- <span class=" text-red-700" v-if="this.errorList.qnt"> {{ this.errorList.qnt[0] }}</span> -->
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
                    </form>
               </div>

            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
    export default {
        data() {
            return {
                product: {
                    name: '',
                    price: '',
                    description: '',
                    qnt: '',
                    image: '',
                },
                isloading: false,
                isloadingtext: 'loading',
                errorList: {}
            }
        },
    methods: {
            submitProduct() {
                this.isloading = true;
                this.isloadingtext = "Saving";
                  
                var myThis = this;
                axios.post(`http://127.0.0.1:8000/api/insert`, this.product).then(res => {
                    alert(res.data.message);
                    this.product.name = ''; 
                    this.product.image = '';
                    this.product.price = '';
                    this.product.description = '';
                    this.product.qnt = '';
                    this.isloading = false;
                    this.isloadingtext = "Loading";
                }).catch(function (error) {
                    if (error.response) {
                        if (error.response.status == 422) { 
                            myThis.errorList = error.response.data.errors;
                            alert('Validation Error');
                        }    
                    }
                     myThis.isloading = false;
                });
                   
            }
        },
    }
</script>