<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Pregunta del Foro</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Pregunta</label>
                                    <input type="text" class="form-control" v-model="forum_Question.question">
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
    name:"editar-forum_Question",
    data(){
        return {
            forum_Question:{
                question:""
            }
        }
    },
    mounted(){
        this.mostrarForum_Question()
    },
    methods:{
        async mostrarForum_Question(){
            await this.axios.get(`/api/forum_Question/${this.$route.params.id}`).then(response=>{
                const { question } = response.data
                this.forum_Question.question = question
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/forum_Question/${this.$route.params.id}`,this.forum_Question).then(response=>{
                this.$router.push({name:"mostrarForum_Question"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>