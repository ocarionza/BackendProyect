<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearForum_Question"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Pregunta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="forum_Question in forum_Questions" :key="forum_Question.id">
                            <td>{{ forum_Question.question }}</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link :to='{name:"editarForum_Question",params:{id:forum_Question.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                <a type="button" @click="borrarForum_Question(forum_Question.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"forum_Questions",
    data(){
        return {
            forum_Questions:[]
        }
    },
    mounted(){
        this.mostrarForum_Questions()
    },
    methods:{
        async mostrarForum_Questions(){
            await this.axios.get('/api/forum_Question').then(response=>{
                this.forum_Questions = response.data
            }).catch(error=>{
                console.log(error)
                this.forum_Questions = []
            })
        },
        borrarForum_Question(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/forum_Question/${id}`).then(response=>{
                    this.mostrarForum_Questions()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>