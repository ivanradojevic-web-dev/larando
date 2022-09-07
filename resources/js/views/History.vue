<template>
	<div>
		<TeamStanding :teams="teams" />
	</div>	
</template>

<script setup>
import { ref, onMounted } from 'vue'
import TeamStanding from '../components/TeamStanding.vue'

const teams = ref(null)

onMounted(() => {
	getTeams()
})

async function getTeams() {
	try {
		const response = await axios.get('/api/history');
		teams.value = response.data.data
	} catch (error) {
		console.error(error);
	}
}
</script>

