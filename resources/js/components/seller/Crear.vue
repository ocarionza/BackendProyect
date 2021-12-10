<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Vendedor</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nit</label>
                                    <input type="text" class="form-control" v-model="seller.nit">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control" v-model="seller.address">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" v-model="seller.description">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Rating</label>
                                    <input type="text" class="form-control" v-model="seller.rating">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="text" class="form-control" v-model="seller.image">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" v-model="seller.facebook">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" v-model="seller.twitter">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" v-model="seller.instagram">
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
    name:"crear-seller",
    data(){
        return {
            seller:{
                nit:"",
                address:"",
                description:"",
                rating:"",
                image:"",
                facebook:"",
                twitter:"",
                instagram:""
            }
        }
    },
    methods:{
        async crear(){
            await this.axios.post('/api/seller',this.seller).then(response=>{
                this.$router.push({name:"mostrarSellers"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>