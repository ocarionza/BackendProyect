<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Usuario</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="user.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Correo Electronico</label>
                                    <input type="text" class="form-control" v-model="user.email">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="text" class="form-control" v-model="user.password">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="text" class="form-control" v-model="user.image">
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
    name:"editar-user",
    data(){
        return {
            user:{
                name:"",
                email:"",
                password:"",
                image:"",
            }
        }
    },
    mounted(){
        this.mostrarUser()
    },
    methods:{
        async mostrarUser(){
            await this.axios.get(`/api/user/${this.$route.params.id}`).then(response=>{
                const { name, email, password, image } = response.data
                this.user.name = name
                this.user.email = email
                this.user.password = password
                this.user.image = image
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/user/${this.$route.params.id}`,this.user).then(response=>{
                this.$router.push({name:"mostrarUsuarios"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>