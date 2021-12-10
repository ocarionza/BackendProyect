<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Categoria</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="category.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control" v-model="category.description">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="text" class="form-control" v-model="category.image">
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
    name:"editar-category",
    data(){
        return {
            category:{
                name:"",
                description:"",
                image:""
            }
        }
    },
    mounted(){
        this.mostrarCategory()
    },
    methods:{
        async mostrarCategory(){
            await this.axios.get(`/api/category/${this.$route.params.id}`).then(response=>{
                const { name, description, image } = response.data
                this.category.name = name
                this.category.description = description
                this.category.image = image
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/category/${this.$route.params.id}`,this.category).then(response=>{
                this.$router.push({name:"mostrarCategories"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>