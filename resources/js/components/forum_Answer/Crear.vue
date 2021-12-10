<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Respuesta del Foro</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Answer</label>
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
    name:"crear-forum_Answer",
    data(){
        return {
            forum_Answer:{
                answer:""
            }
        }
    },
    methods:{
        async crear(){
            await this.axios.post('/api/forum_Answer',this.forum_Answer).then(response=>{
                this.$router.push({name:"mostrarForum_Answers"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>