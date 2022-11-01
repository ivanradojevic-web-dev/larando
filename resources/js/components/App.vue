<template>
    <div>
        <div class="">
            <div class="flex items center ">
                <img class="rounded-xl h-20 w-20" src="https://media-exp1.licdn.com/dms/image/C4E0BAQFWhdy3n2w4cg/company-logo_200_200/0/1636372933895?e=1670457600&v=beta&t=Hhpny_3-QMtqXnIZhnG16lY66_8x-iGucqpm2lNSzA0">
                <div class="flex flex-col justify-between pl-6">
                    <h1 class="font-semibold text-lg lg:mt-2">TRINITTI RANCCO GRANDE COPPA DI FARE IL CULO</h1>
                    <span class="mb-2 text-gray-600">La Stagione 2 - Autunno 2022</span>
                </div>
            </div>
            <div class="flex justify-center lg:justify-end space-x-4 border-b py-2">
                <div :class="$route.name !== 'history' ? 'text-red-600' : 'text-gray-600'" class="px-2 py-1.5 text-xs font-semibold uppercase hover:text-red-600 cursor-pointer">attuale</div>
                <div :class="$route.name === 'history' ? 'text-red-600' : 'text-gray-600'" class="px-2 py-1.5 text-xs font-semibold uppercase hover:text-red-600 cursor-pointer">storico</div>
            </div>
        </div>
        
        <div class="my-6 flex space-x-4 overflow-x-auto nav-scroll">
            <router-link class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/home">classifica</router-link>
            <router-link class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/fixtures">partite</router-link>
            <router-link class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/results">risultati</router-link>
            <router-link class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/matches">tutto</router-link>
            <router-link v-show="authStore.isAuth" class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/fixtures/edit">modificare</router-link>
            <button v-show="$route.name === 'team'" @click="$router.go(-1)" class="bg-blue-400 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl">
                ritorno
            </button>
        </div>

        <router-view v-slot="{ Component }">
            <transition name="fade" mode="out-in">
                <component :is="Component" />
            </transition>
        </router-view>
    </div>
</template>

<script setup>

import { useAuthStore } from '../stores/auth'

const authStore = useAuthStore()
authStore.getAuthCheck()

</script>

<style lang="css">

a.router-link-exact-active {
    background-color: #ef4444;
    color: white;
}

.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.25s;
  transition-property: all;
  transition-timing-function: ease-in;
}

.fade-enter,
.fade-leave-active {
  opacity: 0;
}

</style>