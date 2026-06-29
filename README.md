# 🏊 SwimStore DSS
Sistema Inteligente de Venta de Materiales de Natación
Integrantes del Squad
Sergio Ignacio Estrada Simons

## Descripción del Proyecto
SwimStore DSS es una plataforma web orientada a la venta de materiales de natación que incorpora funcionalidades de apoyo a la toma de decisiones (DSS).
El sistema permite administrar productos, categorías, clientes y ventas, además de generar indicadores estratégicos mediante un dashboard analítico para optimizar el control de inventario y mejorar la rentabilidad del negocio.

## Problema Identificado

Las tiendas de artículos de natación suelen llevar el control de ventas e inventario de manera manual, dificultando:

![Árbol de Problemas](Doc/Arbol%20de%20Problemas.drawio.png)

## Objetivo SMART

Desarrollar un sistema web DSS para la gestión de ventas e inventario de materiales de natación que permita registrar productos, clientes y ventas, generando indicadores de productos más vendidos, ingresos y niveles de stock para mejorar la toma de decisiones comerciales.

### Arbol de Soluciones:

![Árbol de Soluciones](Doc/Árbol%20de%20Soliciones.drawio.png)

## Canva MVP

![Canva MVP](Doc/Canvas%20MVP.png)

### Propuesta de Valor

SwimStore DSS permite gestionar la venta de materiales de natación y proporciona indicadores estratégicos sobre inventario, productos más vendidos y rentabilidad, facilitando la toma de decisiones comerciales.
Definicion del MVP

Es / No es
Es	No es
Sistema de ventas	Marketplace completo
DSS Comercial	ERP Empresarial
Control de inventario	Sistema de contabilidad
Hace / No Hace
Hace	No Hace
Registro de productos	Facturación electrónica
Registrar ventas	Gestión bancaria
Mostrar dashboard	Control avanzado de proveedores
Generar reportes	Aplicación móvil

## Épicas

### EP-01 Gestión de Inventario
Administrar categorías y productos.

### EP-02 Gestión Comercial
Administrar clientes y ventas.

### EP-03 Dashboard DSS
Generar indicadores para la toma de decisiones.

## Historias de Usuario

| ID    | Historia de Usuario                                                                                                                                 | Prioridad | Épica                            |
| ----- | --------------------------------------------------------------------------------------------------------------------------------------------------- | --------- | -------------------------------- |
| HU-01 | Como administrador, quiero registrar, editar y eliminar categorías de productos para organizar correctamente el catálogo de materiales de natación. | Alta      | EP-01 Gestión de Inventario      |
| HU-02 | Como administrador, quiero registrar, editar y eliminar productos para mantener actualizado el inventario.                                          | Alta      | EP-01 Gestión de Inventario      |
| HU-03 | Como administrador, quiero registrar clientes para mantener información de compradores frecuentes.                                                  | Alta      | EP-02 Gestión Comercial          |
| HU-04 | Como Cliente Quiero registrar en la pagina Para poder realizar comprar de la mercancía disponible                                                   | Alta      | EP-02 Seguridad y Administacion  |
| HU-05 | Como administrador, quiero visualizar el historial de ventas para realizar seguimiento de las transacciones realizadas.                             | Media     | EP-02 Gestión Comercial          |
| HU-06 | Como administrador, quiero visualizar los productos más vendidos para identificar cuáles generan mayores ingresos.                                  | Alta      | EP-03 Dashboard DSS              |
| HU-07 | Como administrador, quiero visualizar productos con stock bajo para tomar decisiones de reposición de inventario.                                   | Alta      | EP-03 Dashboard DSS              | 
| HU-08 | Como administrador, quiero analizar las ventas por categoría para identificar qué línea de productos es más rentable.                               | Media     | EP-03 Dashboard DSS              |
| HU-09 | Como administrador, quiero visualizar los ingresos mensuales para evaluar el desempeño financiero del negocio.                                      | Media     | EP-03 Dashboard DSS              |
| HU-10 | Como administrador principal, quiero administrar usuarios y roles para controlar el acceso al sistema.                                              | Baja      | EP-04 Seguridad y Administración |



### MVP (Sprint 1)

Las siguientes historias forman parte del MVP inicial:

*  HU-01 Gestionar Categorías
*  HU-02 Gestionar Productos
*  HU-03 Registrar Clientes
*  HU-04 Registrar Ventas
*  HU-06 Productos Más Vendidos
*  HU-07 Productos con Stock Bajo

Estas historias permiten disponer de un sistema funcional de ventas con capacidades de análisis para la toma de decisiones (DSS).

## Definition of Ready

Una historia está lista cuando:

- Tiene descripción clara.
- Tiene criterios de aceptación.
- Está priorizada.
- Tiene relación con UML.
- Tiene relación con la base de datos.
- No posee dependencias pendientes.
- Fue aprobada por el Product Owner.

## Definition of Done (DoD)

Una Historia de Usuario se considera terminada cuando cumple con todos los siguientes criterios:

* El código compila y ejecuta sin errores.
* Se respetan los estándares de nomenclatura definidos por el equipo.
* La funcionalidad cumple los criterios de aceptación establecidos.
* Se realizaron pruebas funcionales satisfactorias.
* La integración con la base de datos funciona correctamente.
* La documentación UML se encuentra actualizada.
* El código fue revisado antes de ser integrado a la rama develop.
* La historia fue movida a la columna Done en GitHub Projects.
* El Product Owner valida que la funcionalidad cumple el objetivo de negocio.
* No existen errores críticos pendientes relacionados con la funcionalidad implementada.

## Tecnologías Utilizadas
### Backend
* Laravel 11
* PHP 8.3
### Frontend
* Blade
* Bootstrap 5
* JavaScript
### Base de Datos
* MySQL
### Control de Versiones
* Git
* GitHub
### Gestión Ágil
* Scrum
* GitHub Projects

# Estructura del Proyecto

### Diagrama de Clases:

![Diagrama de Clases](Doc/Diagrama%20de%20Clases.drawio.png)

### Diagrama de Secuencia:

#### Secuencia de Clientes

![Diagrama de Secuencia cliente](Doc/Secuencia%20de%20Cliente.png)

#### Secuencia de Administrador

![Diagrama de Secuencia Administrador](Doc/Secuencia%20de%20administrador.png)

## Esquema Entidad Relacion:

![Diagrama de Secuencia cliente](Doc/Esquema%20Modelo%20Realcional.drawio%20.png)

