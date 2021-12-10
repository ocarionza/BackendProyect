<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Producto</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="product.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control" v-model="product.description">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" v-model="product.price">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" class="form-control" v-model="product.brand">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="text" class="form-control" v-model="product.image">
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
    name:"editar-product",
    data(){
        return {
            product:{
                name:"",
                description:"",
                price:"",
                brand:"",
                image:""
            }
        }
    },
    mounted(){
        this.mostrarProduct()
    },
    methods:{
        async mostrarProduct(){
            await this.axios.get(`/api/products/${this.$route.params.id}`).then(response=>{
                const { name, description, price, brand, image } = response.data
                this.product.name = name
                this.product.description = description
                this.product.price = price
                this.product.brand = brand
                this.product.image = image
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/products/${this.$route.params.id}`,this.product).then(response=>{
                this.$router.push({name:"mostrarProducts"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>