Perfecto, aquí tienes un **proyecto completo, práctico, realizable en 2 días**, orientado al sector **Fintech/Banca**, que te permitirá **practicar todos los conocimientos clave que piden** en esa oferta de trabajo, desde Laravel y PostgreSQL hasta Redis, AWS, CI/CD, patrones de arquitectura, y más.

---

# 🏦 Proyecto: **MiniBanco 360 – Plataforma de Solicitud y Gestión de Créditos**

> 🎯 Este es un sistema minimalista, pero bien estructurado, que simula una plataforma bancaria donde los usuarios pueden solicitar créditos, consultar su historial y donde un equipo financiero (admin) puede aprobar o rechazar dichas solicitudes.

---

## 🎯 Objetivos del Proyecto

* Practicar **Laravel + PHP avanzado**
* Usar **PostgreSQL** con diseño optimizado
* Integrar **Redis** como cache y cola de trabajos
* Usar **Filament** para backoffice administrativo moderno
* Configurar **CI/CD con GitHub Actions**
* Realizar **despliegue en AWS EC2 + S3 + RDS**
* Aplicar **principios SOLID + arquitectura limpia**
* Usar **design patterns (repositorio, servicios, jobs, etc.)**

---

## 📦 Módulos del Sistema

### 1. 👤 Autenticación

* Registro y login con Laravel Sanctum
* Rol: `cliente` y `admin` (guardado con políticas de acceso)
* Verificación de email (opcional para práctica)

### 2. 💰 Solicitudes de Crédito

* Cliente crea solicitud de préstamo (`LoanRequest`)
* Validaciones de negocio (monto, historial, etc.)
* Job asíncrono en Redis simula análisis del riesgo

### 3. 📊 Panel Admin (Filament)

* Admin ve solicitudes, cambia estado (aprobado/rechazado)
* Filtros, gráficas y exportaciones

### 4. 🗂 Historial Financiero

* Cliente ve el estado y evolución de sus préstamos
* Consulta PDF con detalle del préstamo (usando `barryvdh/laravel-dompdf`)

### 5. ☁️ AWS Integración

* Subida de documentos a S3 (cédula, colillas de pago)
* Uso de RDS PostgreSQL en producción
* Despliegue en EC2 (manual o con GitHub Actions)

### 6. 🧠 Arquitectura y diseño limpio

* Repositorio + Service Layer
* Jobs + Events para tareas asíncronas
* Jobs usando Redis y workers
* Cache con Redis para dashboard y consultas

---

## 🗃️ Estructura del Proyecto

```
minibanco360/
├── app/
│   ├── Http/Controllers/
│   ├── Models/ (User, LoanRequest)
│   ├── Services/
│   ├── Repositories/
│   ├── Jobs/
│   ├── Events/
│   ├── Filament/Resources/
├── config/
├── routes/
│   ├── web.php
│   ├── api.php
├── database/
│   ├── migrations/
│   ├── seeders/
├── resources/views/ (opcional)
├── public/
├── tests/
├── .github/workflows/laravel.yml
├── Dockerfile (opcional)
├── docker-compose.yml (opcional)
└── README.md
```

---

## 🔧 Tecnologías

| Categoría       | Herramienta            |
| --------------- | ---------------------- |
| Lenguaje        | PHP 8.x                |
| Framework       | Laravel 11.x           |
| BD              | PostgreSQL             |
| Cache/Queue     | Redis                  |
| Frontend Admin  | Filament               |
| API             | Laravel Sanctum        |
| CI/CD           | GitHub Actions         |
| Cloud           | AWS EC2, RDS, S3, IAM  |
| DevOps opcional | Docker, docker-compose |
| Testing         | PHPUnit, Laravel Test  |

---

## 🧪 Funcionalidades clave para practicar

✅ CRUD + validaciones
✅ Autenticación API
✅ Authorization policies
✅ Redis caching + queue jobs
✅ Subida de archivos a AWS S3
✅ CI/CD con GitHub Actions
✅ Despliegue a EC2 y uso de RDS
✅ Panel administrativo en tiempo real
✅ Diseño limpio, desacoplado (Service + Repository + Event-driven)

---

## 📅 Cronograma de Ejecución (2 días, 16 horas)

### Día 1 – Fundamentos + Backend (8 horas)

| Hora | Tareas                                                  |
| ---- | ------------------------------------------------------- |
| 1h   | Iniciar proyecto Laravel + config PostgreSQL + Redis    |
| 1h   | Crear modelos y migraciones (`User`, `LoanRequest`)     |
| 1h   | Crear registro/login con Sanctum                        |
| 1h   | Crear API protegida para crear y consultar préstamos    |
| 2h   | Crear Jobs para procesar préstamos en background        |
| 2h   | Crear panel admin con Filament (ver, aprobar, rechazar) |

### Día 2 – DevOps + Arquitectura + Despliegue (8 horas)

| Hora | Tareas                                           |
| ---- | ------------------------------------------------ |
| 1h   | Añadir patrón Service + Repository               |
| 1h   | Cache con Redis en dashboard y detalles          |
| 1h   | Subida de archivos a S3 (cédula/colillas)        |
| 1h   | Configurar CI/CD con GitHub Actions              |
| 2h   | Despliegue manual/automático a EC2 con RDS       |
| 1h   | Agregar PDF export con barryvdh/dompdf           |
| 1h   | Escribir README técnico con endpoints y diagrama |

---

## 🔁 ¿Quieres que empiece generándote el proyecto Laravel base?

Puedo generarte:

* Comandos para que inicies todo paso a paso
* Código base (`composer create-project`, setup de PostgreSQL y Redis)
* Primeros modelos y controladores
* Script de GitHub Actions listo para CI/CD
* Plantilla de README con documentación profesional
* Deploy script simple para EC2

---
