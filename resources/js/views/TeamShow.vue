<template>
	<div>
		<div class="flex items-center justify-between mb-6">
			<h2 class="text-lg font-semibold">{{ teamShow.name }}</h2>
			<div class="flex items-center">
		        <img class="h-8 w-8" :src="teamShow.photo_1">
		        <img class="ml-2 h-8 w-8" :src="teamShow.photo_2">
		    </div>
		</div>

		<div class="flex items-center mb-6">
			<h2 class="text-lg uppercase text-gray-400 font-semibold mr-8">Forma</h2>
			<div v-for="fixture in teamShow.fixtures">
				<div v-show="fixture.played" class="flex flex-col items-center h-12 mr-1">
			        <div class="h-3 w-6" :class="fixture.set_wins > 1 ? 'bg-green-500' : 'bg-transparent'"></div>
			        <div class="h-3 w-6" :class="fixture.set_wins >= 1 ? 'bg-green-500' : 'bg-transparent'"></div>
			        <hr>
			        <div class="h-3 w-6" :class="fixture.set_losses >= 1 ? 'bg-red-500' : 'bg-transparent'"></div>
			        <div class="h-3 w-6" :class="fixture.set_losses > 1 ? 'bg-red-500' : 'bg-transparent'"></div>
		    	</div>
		    </div>
		</div>

		<div v-for="round in teamFixtures">
		    <div class="w-full bg-gray-300 uppercase font-semibold rounded-lg text-xs pl-2 py-1">
		        Calcio {{ round[0].round }}
		    </div>
		    <div v-for="( {team, set_wins, set_losses, given_goals, id, played}, index ) in round" :key="id" >
		        <div class="flex py-1">
		            <div class="h-6 w-1/2 flex space-x-4 items-center md:ml-8">
		                <div class="flex items-center">
		                    <img class="h-4 w-4" :src="team.photo_1">
		                    <img class="ml-2 h-4 w-4" :src="team.photo_2">
		                </div>
		                <div class="text-xs md:text-sm line-clamp-1 text-gray-600">{{ team.name }}</div>
		            </div>
		            <div v-if="played" class="w-1/4 ml-2 h-6 text-sm font-semibold flex flex-1 items-center">
		            	{{ set_wins }} 
                    <span class="ml-6 text-gray-400">{{ given_goals }}</span>
		            </div>
	
		            <div v-else class="w-1/4 h-6 ml-2 flex flex-1 items-center">-</div>
		        </div>
		    </div>
		</div>
	</div>
</template>

<script setup>

import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router';

	const route = useRoute(); 
	const teamShow = ref([])
    const teamFixtures = ref(null)
    const slug = route.params.slug;

    onMounted(() => {
        getTeamFixtures();
    })

    async function getTeamFixtures() {
        try {
            const response = await axios.get('/api/teams/' + slug);
            teamShow.value = response.data.team
            teamFixtures.value = response.data.fixtures
        } catch (error) {
            console.error(error);
        }
    }

</script>