<template>
	<div>
		<div class="flex">
			<div class="h-9 w-1/2 flex border-b space-x-4 items-center">
				
			</div>
			<div class="w-1/2 h-9 grid grid-cols-6 gap-x-2 border-b text-sm items-center">
				<div class="col-span-1">MP</div>
				<div class="col-span-1 hidden md:block">W</div>
				<div class="col-span-1 hidden md:block">L</div>
				<div class="col-span-2 md:col-span-1">GG</div>
				<div class="col-span-2 md:col-span-1">GD</div>
				<div class="col-span-1">P</div>
			</div>
		</div>
		<div v-for="({ photo_1, photo_2, name, matches_played, wins, losses, given_goals, goals_conceded, goal_difference, points, slug }, index ) in teams" class="flex">
			<div class="h-9 w-1/2 flex border-b space-x-4 items-center">
				<div v-if="index + 1  === 1" class="bg-blue-500 h-5 w-5 flex items-center justify-center font-semibold rounded text-white text-xs">{{ index + 1 }}.</div>
				<div v-if="index + 1  > 1 && index + 1 < 5" class="bg-red-800 h-5 w-5 flex items-center justify-center font-semibold rounded text-white text-xs">{{ index + 1 }}.</div>
				<div v-if="index + 1  > 4" class="bg-transparent h-5 w-5 flex items-center justify-center font-semibold rounded text-gray-600 text-xs">{{ index + 1 }}.</div>
				<div class="hidden md:flex items-center">
					<img class="h-5 w-5" :src="photo_1">
					<img class="ml-2 h-5 w-5" :src="photo_2">
				</div>
				<div class="text-xs md:text-sm text-gray-600 flex items-center">
					<router-link :to="'/trinitti-rancco/team/' + slug" class="hover:underline">
						{{ name }} 
					</router-link>
					<img v-if="index + 1  === 1" class="w-3 h-3 ml-1" src="/images/trophy.png" alt="Trophy icon">
				</div>
			</div>
			<div class="w-1/2 h-9 grid grid-cols-6 gap-x-2 border-b items-center text-sm">
				<div class="col-span-1">{{ matches_played }}</div>
				<div class="col-span-1 hidden md:block">{{ wins }}</div>
				<div class="col-span-1 hidden md:block">{{ losses }}</div>
				<div class="col-span-2 md:col-span-1">{{ given_goals }}:{{ goals_conceded }}</div>
				<div class="col-span-2 md:col-span-1">{{ goal_difference }}</div>
				<div class="col-span-1 font-semibold">{{ points }}</div>
			</div>
		</div>
		<div class="mt-4 pl-1">
			<div class="flex items-center space-x-4">
				<div class="w-3 h-3 bg-blue-500 rounded "></div>
				<div class="text-xs text-gray-600">Vincitore di Grande Coppa di Fare il Culo e un partecipante alla Coppa delle Coppe</div>
			</div>
			<div class="flex items-center space-x-4 mt-1">
				<div class="w-3 h-3 bg-red-800 rounded "></div>
				<div class="text-xs text-gray-600">Partecipanti alla Coppa delle Coppe</div>
			</div>
		</div>
	</div>		
</template>

<script setup>

import { ref, onMounted } from 'vue'

const teams = ref(null)

onMounted(() => {
	async function getTeams() {
  		try {
    		const response = await axios.get('/api/teams');
    		teams.value = response.data.data
  		} catch (error) {
    		console.error(error);
  		}
	}

	getTeams()
})

</script>

