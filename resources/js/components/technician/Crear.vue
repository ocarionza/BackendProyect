<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Tecnico</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" v-model="technician.phone">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Calificacion</label>
                                    <input type="text" class="form-control" v-model="technician.rating">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" v-model="technician.facebook">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" v-model="technician.twitter">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" v-model="technician.instagram">
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
    name:"crear-technician",
    data(){
        return {
            technician:{
                phone:"",
                rating:"",
                facebook:"",
                twitter:"",
                instagram:""
            }
        }
    },
    methods:{
        async crear(){
            await this.axios.post('/api/technician',this.technician).then(response=>{
                this.$router.push({name:"mostrarTechnicians"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>