const { createApp } = Vue

createApp({
  data() {
    return {
        todos: [],
        newTodo: '',
      
    }
  },
  methods: {
    fetchData() {
        axios.get('script.php').then((res) =>{
            console.log(res.data)
        })
    }

  },
  created() {
    this.fetchData()
  }
}).mount('#app')