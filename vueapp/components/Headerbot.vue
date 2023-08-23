<template>
    <div class=" bg-[#F4F4F4] ">
        <div class="container  mx-auto">

            <div class="flex flex-wrap">
                  <div class="flex-2 text">
                        <select name="" id=""  class="bg-[#EDA415] h-[60px] text text-white text-base w-[300px] text-center">
                            <option>Browse Categoryes  </option>
                            <option>Browse Categoryes  </option>
                            <option>Browse Categoryes  </option>
                        </select>
                   </div>
                 <div class="flex-1 ps-[80px] leading-[60px] text-[#3A3A3A] text text-2xl font-normal space-x-[60px] ">
                      <NuxtLink class="transition delay-150 duration-300 hover:text-[#EDA415]" to="/">Home </NuxtLink>
                 <NuxtLink class="transition delay-150 duration-300 hover:text-[#EDA415]"  to="/about">Add Product </NuxtLink>
                 <NuxtLink class="transition delay-150 duration-300 hover:text-[#EDA415]" to="/testimonial">About Me </NuxtLink>
 
                  </div>
            </div>
        </div> 
    </div>
</template>

<style scoped>
   select option{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding:10px 30px;
   }
</style>