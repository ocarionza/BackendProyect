<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Respuesta del Foro</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Respuesta</label>
                                    <input type="text" class="form-control" v-model="forum_Answer.answer">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"editar-forum_Answer",
    data(){
        return {
            forum_Answer:{
                answer:""
            }
        }
    },
    mounted(){
        this.mostrarForum_Answer()
    },
    methods:{
        async mostrarForum_Answer(){
            await this.axios.get(`/api/forum_Answer/${this.$route.params.id}`).then(response=>{
                const { answer } = response.data
                this.forum_Answer.answer = answer
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/forum_Answer/${this.$route.params.id}`,this.forum_Answer).then(response=>{
                this.$router.push({name:"mostrarForum_Answers"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>