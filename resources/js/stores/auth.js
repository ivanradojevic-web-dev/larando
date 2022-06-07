import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
	state: () => {
    return {
      isAuth: false
    }
  },
  actions: {
    async getAuthCheck() {
        try {
            const response = await axios.get('/auth')
            this.isAuth = response.data.auth
        } catch (error) {
            console.error(error);
        }
    }
  },
})