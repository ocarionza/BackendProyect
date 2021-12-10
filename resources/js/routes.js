const Home = () => import('./components/Home.vue')

//componentes para el crud de usuarios
const Mostrar = () => import('./components/user/Mostrar.vue')
const Crear = () => import('./components/user/Crear.vue')
const Editar = () => import('./components/user/Editar.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'mostrarUsuarios',
        path: '/users',
        component: Mostrar
    },
    {
        name: 'crearUsuarios',
        path: '/crear',
        component: Crear
    },
    {
        name: 'editarUsuarios',
        path: '/editar/:id',
        component: Editar
    },
]