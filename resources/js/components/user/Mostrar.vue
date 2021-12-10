<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearUsuarios"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                            <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Correo electronico</th>
                            <th>operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td>{{ user.image }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link :to='{name:"editarUsuarios",params:{id:user.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                <a type="button" @click="borrarUser(user.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                         </tr>
                    </tbody>   
                </table>
            </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"users",
    data(){
        return {
            users:[]
        }
    },
    mounted(){
        this.mostrarUsers()
    },
    methods:{
        async mostrarUsers(){
            await this.axios.get('/api/user').then(response=>{
                this.users = response.data
            }).catch(error=>{
                console.log(error)
                this.users = []
            })
        },
        borrarUser(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/user/${id}`).then(response=>{
                    this.mostrarUsers()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>