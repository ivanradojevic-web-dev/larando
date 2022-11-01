<template>
    <div>
    <TransitionGroup name="list" tag="div">
    <div v-for="(round, index) in fixtures" :key="index" class="mb-4">
        <div class="w-full bg-gray-300 uppercase font-semibold rounded-lg text-xs pl-2 py-1">
            Calcio {{ index }}
        </div>
        <div v-for="( {team, set_wins, given_goals, id, played}, index ) in round" :key="id" >
            <div class="flex pt-1" :class="[(index + 1) % 2  === 0 ? ['border-b pb-1'] : '']">
                <div class="h-6 w-1/2 flex space-x-4 items-center md:ml-8">
                    <div class="flex items-center">
                        <img class="h-4 w-4" :src="team.photo_1">
                        <img class="ml-2 h-4 w-4" :src="team.photo_2">
                    </div>
                    <div class="text-xs md:text-sm line-clamp-1 text-gray-600">
                        <router-link :to="'/trinitti-rancco/team/' + team.slug" class="hover:underline">
                            {{ team.name }}
                        </router-link>
                    </div>
                </div>
                
                <div v-if="played" class="w-1/4 ml-2 h-6 text-sm font-semibold flex flex-1 items-center">
                    {{ set_wins }} 
                    <span class="ml-6 text-gray-400">{{ given_goals }}</span>
                </div>
                <div v-else class="w-1/4 h-6 ml-2 flex flex-1 items-center">-</div>

                <div v-show="$route.name === 'fixtures-edit'" class="w-1/4 flex items-center justify-end space-x-8 mr-4">
                    <input type="number" v-model="matches[id]" class="hidden w-10 h-6 text-sm border text-center rounded-lg appearance-none">

                    <select v-model="sets[id]" class="hidden w-10 h-6 text-sm border text-center rounded-lg">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>

                    <button v-show="(index + 1) % 2 !== 0" @click="editFixtures(id)" class="ok-button hidden" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-500 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button v-show="(index + 1) % 2 !== 0" @click="openEdit(id)" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-500 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                          <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button v-show="(index + 1) % 2 == 0"  class="clear-button hidden" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-300 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button v-show="(index + 1) % 2 == 0" @click="closeEdit(id)" class="back-button hidden" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-300 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
    </TransitionGroup>
    </div>
</template>

<script setup>

    import { ref, onMounted } from 'vue'

    const props = defineProps(['query'])

    const fixtures = ref(null)
    const matches = ref([])
    const sets = ref([])
    
    onMounted(() => {
        getFixtures()
    })

    async function getFixtures() {
        try {
            const response = await axios.get('/api/fixtures', {
                params: {
                    filter: props.query
                }
            });
            fixtures.value = response.data
        } catch (error) {
            console.error(error);
        }
    }

    async function editFixtures(id) {
        if (Number.isInteger(matches.value[id]) && Number.isInteger(matches.value[id+1])) {
            try {
                const response = await axios.post('/api/fixtures/edit', {
                    params: {
                        id_1: id,
                        id_2: (id+1),
                        team_1_goals: matches.value[id],
                        team_2_goals: matches.value[id+1],
                        team_1_sets: parseInt(sets.value[id]),
                        team_2_sets: parseInt(sets.value[id+1]),
                    }
                });
                matches.value[id] = '';
                matches.value[id+1] = '';
                sets.value[id] = '';
                sets.value[id+1] = '';
                closeEdit(id + 1);
                getFixtures()
            } catch (error) {
                console.error(error);
            }
        } else {
            alert('Per favore inserisci il risultato corretto')
        }
    }

    function openEdit(i) {
        document.querySelectorAll('input')[i - 1].classList.remove('hidden')
        document.querySelectorAll('input')[i].classList.remove('hidden')

        document.querySelectorAll('select')[i - 1].classList.remove('hidden')
        document.querySelectorAll('select')[i].classList.remove('hidden')

        document.querySelectorAll('.ok-button')[i - 1].classList.remove('hidden')

        document.querySelectorAll('.clear-button')[i].classList.remove('hidden')
        document.querySelectorAll('.back-button')[i].classList.remove('hidden')
        
    }

    function closeEdit(i) {
        document.querySelectorAll('input')[i - 2].classList.add('hidden')
        document.querySelectorAll('input')[i - 1].classList.add('hidden')

        document.querySelectorAll('select')[i - 2].classList.add('hidden')
        document.querySelectorAll('select')[i - 1].classList.add('hidden')
        
        document.querySelectorAll('.ok-button')[i - 2].classList.add('hidden')
       
        document.querySelectorAll('.clear-button')[i - 1].classList.add('hidden')
        document.querySelectorAll('.back-button')[i - 1].classList.add('hidden')
    }

</script>

<style scoped>

.list-enter-active,
.list-leave-active {
  transition: all 1.0s ease-out;
}
.list-enter-from,
.list-leave-to {
  opacity: 0;
  transform: translateY(-16px);
}

</style>

