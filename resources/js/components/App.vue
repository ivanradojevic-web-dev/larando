<template>
    <div>
        <div class="flex items center border-b pb-6">
            <img class="rounded-xl h-20 w-20" src="https://media-exp1.licdn.com/dms/image/C4E0BAQFWhdy3n2w4cg/company-logo_200_200/0/1636372933895?e=1661385600&v=beta&t=SGvSiNoGmRuM026IuaC-ARceq7-WKXKW4SC5b3PomWk">
            <div class="flex flex-col justify-between pl-6">
                <h1 class="font-semibold text-lg lg:mt-2">TRINITTI RANCCO GRANDE COPPA DI FARE IL CULO</h1>
                <span class="mb-2 text-gray-600">La Stagione 1 - Estate 2022</span>
            </div>
        </div>
        
        <div class="my-6 flex space-x-4 overflow-x-auto nav-scroll">
            <router-link class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/home">classifica</router-link>
            <router-link class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/fixtures">partite</router-link>
            <router-link class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/results">risultati</router-link>
            <router-link class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/matches">tutto</router-link>
            <router-link v-show="authStore.isAuth" class="bg-gray-300 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl" to="/trinitti-rancco/fixtures/edit">modificare</router-link>
            <button v-show="$route.name === 'team'" @click="$router.go(-1)" class="bg-blue-400 px-2 py-1.5 text-white text-xs font-semibold uppercase rounded-xl">
                back
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
  transition-duration: 0.2s;
  transition-property: opacity;
  transition-timing-function: ease-out;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}

</style>