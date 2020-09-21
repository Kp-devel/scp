<template>
    <div class="">
        <div class="d-flex pb-4">
            <i class="fa fa-desktop pr-2 fa-lg pt-3 text-green"></i>
            <div>
                <p class="subheader-title mb-0">Compromisos {{titulo}}</p>
                <p class="mb-0">Cantidad de Regsistros: <b>{{cantidad_registros}}</b></p>
            </div>
        </div>
        <!-- <div class="d-flex justify-content-center py-3" v-if="loading">
            <div class="spinner-border text-blue" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <div v-if="viewBusqueda">
            <div class="row">
                <div class="col-md-5">
                    <table class="mb-3">
                        <tr>
                            <td class="pr-2">Campaña</td>
                            <td>
                                <select class="form-control" v-model="busqueda.campana" @change="btnEmpezar=false;cantidad_registros=0">
                                    <option value="">Seleccionar</option>
                                    <option v-for="(item,index) in filtros['campanas']" :key="index" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-2">Zona</td>
                            <td>
                                <select class="form-control" v-model="busqueda.zona" @change="btnEmpezar=false;cantidad_registros=0">
                                    <option value="">Seleccionar</option>
                                    <option v-for="(item,index) in filtros['zonas']" :key="index" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-2">Tramo Deuda</td>
                            <td>
                                <select class="form-control" v-model="busqueda.tramo_deuda" @change="btnEmpezar=false;cantidad_registros=0">
                                    <option value="">Seleccionar</option>
                                    <option v-for="(item,index) in filtros['tramoDeuda']" :key="index" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-2">Tramo Atraso</td>
                            <td>
                                <select class="form-control" v-model="busqueda.tramo_atraso" @change="btnEmpezar=false;cantidad_registros=0">
                                    <option value="">Seleccionar</option>
                                    <option v-for="(item,index) in filtros['tramoAtraso']" :key="index" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-12">
                    <div class="alert alert-warning border-left" v-if="mensaje">
                        <p class="mb-0" >{{mensaje}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="" class="btn btn-outline-blue waves-effect" @click.prevent="buscar()">
                        <span v-if="loadbuscar" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Buscar
                    </a>
                    <a href="" class="btn btn-outline-blue waves-effect" @click.prevent="limpiar()">Limpiar</a>
                    <a href="" class="btn btn-outline-blue waves-effect" @click.prevent="empezar()" v-if="btnEmpezar">Empezar campaña</a>
                </div>
            </div>
        </div>
        <div v-else>
            <div v-if="loadTrabajo" class="d-flex justify-content-center pt-5">
                <div class="spinner-border text-blue" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div v-else>
                <operativo :datosCliente="dataTrabajo"/>
            </div>
        </div>
    </div>
</template>

<script>
    import operativo from './operativos';

    export default {
        props:["tipo","filtros"],
        data() {
            return {
                titulo:'',
                busqueda:{campana:'',zona:'',tramo_deuda:'',tramo_atraso:''},
                viewBusqueda:true,
                cantidad_registros:0,
                btnEmpezar:false,
                mensaje:'',
                loadbuscar:false,
                loadTrabajo:false,
                dataTrabajo:[],
            }
        },
        created(){
            if(this.tipo==1){
                this.titulo="Caídos";
            }else{
                this.titulo="Pendientes";
            }
        },
        methods:{
            detalleCliente(){
                window.location.href="cliente/detalle";
            },
            buscar(){
                this.viewBusqueda=true;
                this.btnEmpezar=false;
                this.mensaje='';
                this.cantidad_registros=0;
                this.loadbuscar=true;
                axios.post("buscar/buscarClientes",this.busqueda).then(res=>{
                    if(res.data){
                        this.cantidad_registros=res.data[0].cantidad;
                        this.loadbuscar=false;
                        if(this.cantidad_registros>0){
                            this.btnEmpezar=true;
                        }
                    }
                })
            },
            empezar(){
                this.dataTrabajo=[];
                this.viewBusqueda=false;
                this.loadTrabajo=true;
                if(this.cantidad_registros>0){
                    axios.post("buscar/dataCliente",this.busqueda).then(res=>{
                        if(res.data){
                            this.dataTrabajo=res.data
                            this.loadTrabajo=false;
                           // this.cantidad_gestionada=this.dataTrabajo.length;
                        }else{
                            this.viewBusqueda=true;
                            this.mensaje="Existen cLientes que ya han sido gestionados el día de hoy";
                            this.limpiar();
                        }
                    })
                }
            },
            limpiar(){
                this.busqueda.campana='';
                this.busqueda.zona='';
                this.busqueda.tramo_deuda='';
                this.busqueda.tramo_atraso='';
                this.cantidad_registros=0;
                this.btnEmpezar=false;
            },
        },
        components:{
            operativo            
        }
    }
</script>
