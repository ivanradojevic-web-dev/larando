<template>
	<div v-show="authStore.isAuth">
		<FixtureFetch />
	</div>
</template>

<script setup>

import FixtureFetch from '../components/FixtureFetch.vue'
import { useAuthStore } from '../stores/auth'

const authStore = useAuthStore()
authStore.getAuthCheck()

</script>

