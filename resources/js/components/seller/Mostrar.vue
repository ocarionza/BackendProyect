<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearSeller"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                            <tr>
                            <th>Nit</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Rating</th>
                            <th>Imagen</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Instagram</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="seller in sellers" :key="seller.nit">
                            <td>{{ seller.nit }}</td>
                            <td>{{ seller.description }}</td>
                            <td>{{ seller.price }}</td>
                            <td>{{ seller.rating }}</td>
                            <td>{{ seller.image }}</td>
                            <td>{{ seller.facebook }}</td>
                            <td>{{ seller.twitter }}</td>
                            <td>{{ seller.instagram }}</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link :to='{name:"editarSeller",params:{nit:seller.nit}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                <a type="button" @click="borrarSeller(seller.nit)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    name:"sellers",
    data(){
        return {
            sellers:[]
        }
    },
    mounted(){
        this.mostrarSellers()
    },
    methods:{
        async mostrarSellers(){
            await this.axios.get('/api/seller').then(response=>{
                this.sellers = response.data
            }).catch(error=>{
                console.log(error)
                this.sellers = []
            })
        },
        borrarSeller(nit){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/seller/${nit}`).then(response=>{
                    this.mostrarSellers()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>