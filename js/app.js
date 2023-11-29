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
            nonserve: 'ciao',
            nonserve2: 'ciao2'
        }
        axios.post('write.php', data, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        }).then((res)=> {
            console.log(res.data);
            this.todos = res.data.results;
            this.newTodo = '';
        })
    },
    deleteTodo(index) {
        const data = {
            id: index
        }
        axios.post('delete.php', data, {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }).then((res)=> {
            this.todos = res.data.results;
        })
    },
    doneTodo(index) {
        console.log('click');
        const data = {
            id: index,
        };
        axios.post('doneTodo.php', data, {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }).then((res) => {
            this.todos = res.data.results;
        })
    }
  },
  created() {
    this.fetchData()
    console.log(this.todos);
    // console.log(this.deleteTodo(index))
  },
    
  mounted() {
  }
}).mount('#app')