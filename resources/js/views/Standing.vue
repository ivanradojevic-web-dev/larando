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
				<div class="bg-blue-500 h-5 w-5 flex items-center justify-center font-semibold rounded text-white text-xs">{{ index + 1 }}.</div>
				<div class="hidden md:flex items-center">
					<img class="h-5 w-5" :src="photo_1">
					<img class="ml-2 h-5 w-5" :src="photo_2">
				</div>
				<div class="text-xs md:text-sm text-gray-600">
					<router-link :to="'/trinitti-rancco/team/' + slug" class="hover:underline">
						{{ name }}
					</router-link>
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

