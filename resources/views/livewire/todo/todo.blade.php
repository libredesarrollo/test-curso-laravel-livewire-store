<div class="container">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="card">
        <div x-data="data()" x-init="ordenar()">
            <div class="card-header">
                <h4>Total tareas <span x-text="totalTareas"></span></h4>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-auto">
                        <label class="form-control-plaintext">Buscar </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" x-model="search">
                    </div>
                </div>
                <form wire:submit.prevent="save()" class="row g-3 mt-2">
                    <div class="col-auto">

                        <label class="form-control-plaintext">
                            Crear
                        </label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" type="text" wire:model="task">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>


                <ul x-ref="items" class="list-group my-3">
                    <template x-for="t in todos">
                        <li class="list-group-item" :id="t.id" :count="t.count">
                            <input type="checkbox" x-model="t.completed">
                            <span @click="t.editMode=true" x-show="!t.editMode" x-text="t.name"></span>
                            <input @keyup.enter="t.editMode=false" type="text" x-show="t.editMode" x-model="t.name">
                            <button class="btn btn-sm float-end btn-close" @click="remove(t)"></button>
                        </li>
                    </template>
                </ul>
                <button class="btn btn-danger" @click="todos = []">Borrar todos</button>
            </div>
        </div>
    </div>
    <script>
        function data() {
            return {

                search: "",
                task: '',
                //todos: Alpine.$persist(@entangle('todos')),
                //todos: @json($todos),
                todos: @entangle('todos'),
                ordenar() {

                    Sortable.create(this.$refs.items, {
                        onEnd: (event) => {

                            var t = this.todos[event.oldIndex]

                            this.todos.splice(event.oldIndex, 1)
                            this.todos.splice(event.newIndex, 0, t)

                            Livewire.emit("setOrden")

                            // var ids = []
                            // document.querySelectorAll(".list-group li").forEach((todoHTML, key) => {
                            //     ids.push(todoHTML.id)
                            // })

                            // console.log(ids)

                            // var todosAux = []

                            // document.querySelectorAll(".list-group li").forEach((todoHTML,key) => {
                            //     this.todos.forEach((todo)=> {
                            //         if(todo.id == todoHTML.id){
                            //             todosAux.push(todo)
                            //         }
                            //     })
                            // })
                            // this.todos = todosAux;
                           // Livewire.emit("setOrdenByIds", ids)
                        }
                    })
                },
                completed(todo) {
                    return todo.completed
                },
                incompleted(todo) {
                    return !todo.completed
                },
                totalTareas() {
                    return this.todos.length
                },
                filterTodo() {
                    console.log("array")
                    console.log(this.todos.length)

                    return this.todos.filter((t) => t.name.toLowerCase().includes(this.search.toLowerCase()))
                },
                remove(todo) {
                    this.todos = this.todos.filter((t) => t != todo)
                    Livewire.emit("deleteById", todo.id)
                },
                save() {
                    this.todos.push({
                        completed: false,
                        task: this.task
                    })
                    this.task = ""
                }
            }
        }
    </script>
</div>
