<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Servicio</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="service.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control" v-model="service.description">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" v-model="service.price">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="text" class="form-control" v-model="service.image">
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
    name:"editar-service",
    data(){
        return {
            service:{
                name:"",
                description:"",
                price:"",
                image:""
            }
        }
    },
    mounted(){
        this.mostrarService()
    },
    methods:{
        async mostrarService(){
            await this.axios.get(`/api/service/${this.$route.params.id}`).then(response=>{
                const { name, description, price, image } = response.data
                this.service.name = name
                this.service.description = description
                this.service.price = price
                this.service.image = image
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/service/${this.$route.params.id}`,this.service).then(response=>{
                this.$router.push({name:"mostrarServices"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>