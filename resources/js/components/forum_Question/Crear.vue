<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Pregunta del Foro</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
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
    name:"crear-forum_Question",
    data(){
        return {
            forum_Question:{
                question:""
            }
        }
    },
    methods:{
        async crear(){
            await this.axios.post('/api/forum_Question',this.forum_Question).then(response=>{
                this.$router.push({name:"forum_Questions"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>