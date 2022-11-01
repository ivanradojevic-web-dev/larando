<template>
    <div>
		<div class="flex">
			<div class="h-9 w-1/2 flex border-b space-x-4 items-center">
				
			</div>
			<div class="w-1/2 h-9 grid grid-cols-6 gap-x-2 border-b text-sm items-center">
				<div class="col-span-1 text-gray-600">MP</div>
				<div class="col-span-1 hidden md:block text-gray-600">W / L</div>
				<div class="hidden md:block col-span-1 text-gray-600">GG</div>
				<div class="col-span-1 text-gray-600">GD</div>
				<div class="col-span-2 md:col-span-1 text-gray-600">SW / Sl</div>
				<div class="col-span-1 text-gray-600">P</div>
			</div>
		</div>
		<TransitionGroup name="list" tag="div">
			<div v-for="({ photo_1, photo_2, name, matches_played, wins, losses, given_goals, goals_conceded, goal_difference, points, slug, set_wins, set_losses }, index ) in teams" :key="index" class="flex">
				<div class="h-9 w-1/2 flex border-b space-x-4 items-center">
					<div v-if="index + 1  === 1" class="bg-blue-600 h-5 w-5 flex items-center justify-center font-semibold rounded text-white text-xs">{{ index + 1 }}.</div>
					<div v-if="index + 1  > 1 && index + 1 < 4" class="bg-blue-500 h-5 w-5 flex items-center justify-center font-semibold rounded text-white text-xs">{{ index + 1 }}.</div>
					<div v-if="index + 1  > 3 && index + 1 < 10" class="bg-red-500 h-5 w-5 flex items-center justify-center font-semibold rounded text-white text-xs">{{ index + 1 }}.</div>
					<div v-if="index + 1  > 9" class="bg-transparent h-5 w-5 flex items-center justify-center font-semibold rounded text-gray-600 text-xs">{{ index + 1 }}.</div>
					<div class="hidden md:flex items-center">
						<img class="h-5 w-5" :src="photo_1">
						<img class="ml-2 h-5 w-5" :src="photo_2">
					</div>
					<div class="text-xs md:text-sm text-gray-600 flex items-center">
						<router-link :to="'/trinitti-rancco/team/' + slug" class="hover:underline">
							{{ name }} 
						</router-link>
						<img v-if="name === '2Sick2Furious'" class="w-3 h-3 ml-1" src="/images/trophy.png" alt="Trophy icon">
						<img v-if="name === 'Fantazija 2'" class="w-3 h-3 ml-1" src="/images/medal.png" alt="Medal icon">
					</div>
				</div>
				<div class="w-1/2 h-9 grid grid-cols-6 gap-x-2 border-b items-center text-sm">
					<div class="col-span-1 text-gray-600">{{ matches_played }}</div>
					<div class="col-span-1 hidden md:block text-gray-600">{{ wins }} / {{ losses }}</div>
					<div class="col-span-2 hidden md:block md:col-span-1 text-gray-600">{{ given_goals }}:{{ goals_conceded }}</div>
					<div class="col-span-1 text-gray-600">{{ goal_difference }}</div>
					<div class="col-span-2 md:col-span-1 text-gray-600">{{ set_wins }} / {{ set_losses }}</div>
					<div class="col-span-1 font-semibold">{{ points }}</div>
				</div>
			</div>
		</TransitionGroup>
		<!-- <div class="mt-4 pl-1">
			<div class="flex items-center space-x-4">
				<div class="w-3 h-3 bg-blue-500 rounded "></div>
				<div class="text-xs text-gray-600">Vincitore di Grande Coppa di Fare il Culo e un partecipante alla Coppa delle Coppe</div>
			</div>
			<div class="flex items-center space-x-4 mt-1">
				<div class="w-3 h-3 bg-red-800 rounded "></div>
				<div class="text-xs text-gray-600">Partecipanti alla Coppa delle Coppe</div>
			</div> 
		</div> -->
	</div>
</template>

<script setup>
const props = defineProps(['teams'])
</script>

<style scoped>

.list-enter-active,
.list-leave-active {
  transition: all 1.0s ease;
}
.list-enter-from,
.list-leave-to {
  opacity: 0;
  transform: translateX(12px);
}

</style>

