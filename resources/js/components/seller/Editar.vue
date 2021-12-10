<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Vendedor</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
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
    name:"editar-seller",
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
    mounted(){
        this.mostrarSeller()
    },
    methods:{
        async mostrarSeller(){
            await this.axios.get(`/api/seller/${this.$route.params.nit}`).then(response=>{
                const { nit, address, description, rating, image, facebook, twitter, instagram } = response.data
                this.seller.nit = nit
                this.seller.address = address
                this.seller.description = description
                this.seller.rating = rating
                this.seller.image = image
                this.seller.facebook = facebook
                this.seller.twitter = twitter
                this.seller.instagram = instagram
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/seller/${this.$route.params.nit}`,this.seller).then(response=>{
                this.$router.push({name:"mostrarSeller"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>