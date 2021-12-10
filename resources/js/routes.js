const Home = () => import('./components/Home.vue')

//componentes para el crud de usuarios
const Mostrar = () => import('./components/user/Mostrar.vue')
const Crear = () => import('./components/user/Crear.vue')
const Editar = () => import('./components/user/Editar.vue')

//Categorias
const Mostrarc = () => import('./components/category/Mostrar.vue')
const Crearc = () => import('./components/category/Crear.vue')
const Editarc = () => import('./components/category/Editar.vue')

//respuestas del foro
const Mostrarrf = () => import('./components/forum_Answer/Mostrar.vue')
const Crearrf = () => import('./components/forum_Answer/Crear.vue')
const Editarrf = () => import('./components/forum_Answer/Editar.vue')

//preguntas del foro
const Mostrarpf = () => import('./components/forum_Question/Mostrar.vue')
const Crearpf = () => import('./components/forum_Question/Crear.vue')
const Editarpf = () => import('./components/forum_Question/Editar.vue')

//productos
const Mostrarp = () => import('./components/product/Mostrar.vue')
const Crearp = () => import('./components/product/Crear.vue')
const Editarp = () => import('./components/product/Editar.vue')

//vendedores
const Mostrarv = () => import('./components/seller/Mostrar.vue')
const Crearv = () => import('./components/seller/Crear.vue')
const Editarv = () => import('./components/seller/Editar.vue')

//servicios
const Mostrars = () => import('./components/service/Mostrar.vue')
const Crears = () => import('./components/service/Crear.vue')
const Editars = () => import('./components/service/Editar.vue')

//tecnicos
const Mostrart = () => import('./components/technician/Mostrar.vue')
const Creart = () => import('./components/technician/Crear.vue')
const Editart = () => import('./components/technician/Editar.vue')


export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },

    //user

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

    //Categorias

    {
        name: 'mostrarcategorias',
        path: '/categories',
        component: Mostrarc
    },
    {
        name: 'crearcategoria',
        path: '/category',
        component: Crearc
    },
    {
        name: 'editarcategoria',
        path: '/category/:id',
        component: Editarc
    },

    //respuestas del foro

    {
        name: 'mostrarRespuestasforo',
        path: '/forum_answers',
        component: Mostrarrf
    },
    {
        name: 'crearRespuestaforo',
        path: '/forum_answer',
        component: Crearrf
    },
    {
        name: 'editarRespuestaforo',
        path: '/forum_answer/:id',
        component: Editarrf
    },

    //preguntas del foro

    {
        name: 'mostrarPreguntasforo',
        path: '/forum_questions',
        component: Mostrarpf
    },
    {
        name: 'crearPreguntaforo',
        path: '/forum_question',
        component: Crearpf
    },
    {
        name: 'editarPreguntaforo',
        path: '/forum_question/:id',
        component: Editarpf
    },

    //productos

    {
        name: 'mostrarProductos',
        path: '/products',
        component: Mostrarp
    },
    {
        name: 'crearProducto',
        path: '/product',
        component: Crearp
    },
    {
        name: 'editarProducto',
        path: '/products/:id',
        component: Editarp
    },

    //vendedores

    {
        name: 'mostrarVendedores',
        path: '/sellers',
        component: Mostrarv
    },
    {
        name: 'crearVendedor',
        path: '/seller',
        component: Crearv
    },
    {
        name: 'editarVendedor',
        path: '/seller/:id',
        component: Editarv
    },

    //servicios

    {
        name: 'mostrarServicios',
        path: '/services',
        component: Mostrars
    },
    {
        name: 'crearServicio',
        path: '/service',
        component: Crears
    },
    {
        name: 'editarServicio',
        path: '/services/:id',
        component: Editars
    },

    //tecnicos

    {
        name: 'mostrarTecnicos',
        path: '/technicians',
        component: Mostrart
    },
    {
        name: 'crearTecnico',
        path: '/technician',
        component: Creart
    },
    {
        name: 'editarTecnico',
        path: '/technician/:id',
        component: Editart
    },

]