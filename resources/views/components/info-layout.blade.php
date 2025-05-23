<div>
    <!-- Componente principal que hace uso de los demas componentes segun los botones del menu -->

    @guest()
        <!-- Componente que muestra Quienes somos, Certificados, Seguridad del cliente , Texto informativo -->
        <x-info-tope />
        <!-- end banner -->

        <!-- Componente Informacion General  -->
        <x-info-informacion-gral />
        <!-- end Informacion General -->

        <!-- Componente Informacion de Marco Legal -->
        <x-info-marco-legal/>
        <!-- end Informacion Marco Legal -->

        <!-- Componente Preguntas Frecuentes -->
        <x-info-preguntas-frecuentes />
        <!-- end Preguntas Frecuentes -->

        <!-- Componente Ayuda y Soporte -->
        <x-info-ayuda-soporte />
        <!-- end Ayuda y Soporte -->

        <!-- Componente con formulario de Contactanos   -->
        <x-info-contactanos />
        <!-- End Contactanos  -->
    @endguest

    @auth()
            @role('Admin|SuperAdmin')
                <!-- Componente que muestra Quienes somos, Certificados, Seguridad del cliente , Texto informativo -->
                <x-info-tope />
                <!-- end banner -->

                <!-- Componente Informacion General  -->
                <x-info-informacion-gral />
                <!-- end Informacion General -->

                <!-- Componente Informacion de Marco Legal -->
                <x-info-marco-legal/>
                <!-- end Informacion Marco Legal -->

                <!-- Componente Preguntas Frecuentes -->
                <x-info-preguntas-frecuentes />
                <!-- end Preguntas Frecuentes -->

                <!-- Componente Ayuda y Soporte -->
                <x-info-ayuda-soporte />
                <!-- end Ayuda y Soporte -->

                <!-- Componente con formulario de Contactanos   -->
                <x-info-contactanos />
                <!-- End Contactanos  -->
                <x-info-doc-contractuales />
            @endrole

            @role('Usuario')
                <!-- Componente que muestra Quienes somos, Certificados, Seguridad del cliente , Texto informativo -->
                <x-info-tope />
                <!-- end banner -->

                <!-- Componente Informacion General  -->
                <x-info-informacion-gral />
                <!-- end Informacion General -->

                <!-- Componente Informacion de Marco Legal -->
                <x-info-marco-legal/>
                <!-- end Informacion Marco Legal -->

                <!-- Componente Preguntas Frecuentes -->
                <x-info-preguntas-frecuentes />
                <!-- end Preguntas Frecuentes -->

                <!-- Componente Ayuda y Soporte -->
                <x-info-ayuda-soporte />
                <!-- end Ayuda y Soporte -->


                <!-- Componente con formulario de Contactanos   -->
                <x-info-contactanos />
                <!-- End Contactanos  -->

                <!-- Componente Documentacion Contractual -->
                <x-info-doc-contractuales />
                <!-- End Documentacion Contractual -->
            @endrole

            @role('Aspirante|Titular')
               <!-- Componente que muestra Quienes somos, Certificados, Seguridad del cliente , Texto informativo -->
                <x-info-tope />
                <!-- end banner -->

                <!-- Componente Informacion General  -->
                <x-info-informacion-gral />
                <!-- end Informacion General -->

                <!-- Componente Preguntas Frecuentes -->
                <x-info-preguntas-frecuentes />
                <!-- end Preguntas Frecuentes -->

                <!-- Componente Ayuda y Soporte -->
                <x-info-ayuda-soporte />
                <!-- end Ayuda y Soporte -->

                <!-- Componente con formulario de Contactanos   -->
                <x-info-contactanos />
                <!-- End Contactanos  -->

                <!-- Componente Documentacion Contractual -->
                <x-info-doc-contractuales />
                <!-- End Documentacion Contractual -->

                <!-- Componente Autoridad Registro Publica -->
                <x-info-autoridad-registro-publica />
                <!-- end Autoridad Registro Publica  -->
            @endrole

            @role('Representante')
               <!-- Componente que muestra Quienes somos, Certificados, Seguridad del cliente , Texto informativo -->
                <x-info-tope />
                <!-- end banner -->

                <!-- Componente Informacion General  -->
                <x-info-informacion-gral />
                <!-- end Informacion General -->

                <!-- Componente Preguntas Frecuentes -->
                <x-info-preguntas-frecuentes />
                <!-- end Preguntas Frecuentes -->

                <!-- Componente Ayuda y Soporte -->
                <x-info-ayuda-soporte />
                <!-- end Ayuda y Soporte -->

                <!-- Componente con formulario de Contactanos   -->
                <x-info-contactanos />
                <!-- End Contactanos  -->

                <!-- Componente Documentacion Contractual -->
                <x-info-doc-contractuales />
                <!-- End Documentacion Contractual -->

                <!-- Componente Contrato -->
                <!--<x-info-contrato />-->
                <!-- End Componente Contrato -->


                <!-- Componente Autoridad Registro Publica -->
                <x-info-autoridad-registro-publica />
                <!-- end Autoridad Registro Publica  -->
            @endrole
    @endauth

</div>
