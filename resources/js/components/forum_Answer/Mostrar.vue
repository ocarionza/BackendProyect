<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearForum_Answer"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="forum_Answer in forum_Answers" :key="forum_Answer.id">
                                    <td>{{ forum_Answer.answer }}</td>
                                    <td>
                                        <!-- llamamos al componente para Editar     -->
                                        <router-link :to='{name:"editarForum_Answer",params:{id:forum_Answer.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="borrarForum_Answer(forum_Answer.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    name:"forum_Answers",
    data(){
        return {
            forum_Answers:[]
        }
    },
    mounted(){
        this.mostrarForum_Answers()
    },
    methods:{
        async mostrarForum_Answers(){
            await this.axios.get('/api/forum_Answer').then(response=>{
                this.forum_Answers = response.data
            }).catch(error=>{
                console.log(error)
                this.forum_Answers = []
            })
        },
        borrarForum_Answer(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/forum_Answer/${id}`).then(response=>{
                    this.mostrarForum_Answers()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>