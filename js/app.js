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
            console.log(res.data);
            this.todos = res.data.results;
        })
    },
    writeTodo() {

    }
  },
  created() {
    this.fetchData()
    console.log(this.todos);
  },
  mounted() {
    console.log(this.todos)
  }
}).mount('#app')