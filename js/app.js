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
    addTodo() {
        
        if(!this.newTodo) {
            return alert('insrisci una todo');
        };

        // inserisco in una variabile 'data' il un oggeto che contenga nella proprietà il valore stringa della nuova Todo.
        const data = {
            todo: this.newTodo,
        }

        axios.post('write.php', data, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        }).then((res)=> {
            console.log(res.data);
            this.todos = res.data.results;
        })


        

    }
  },
  created() {
    this.fetchData()
    console.log(this.todos);
  },
  mounted() {
  }
}).mount('#app')