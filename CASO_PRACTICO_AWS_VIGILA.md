# Propuesta de Optimización y Migración a AWS: VIGILA

**Fecha:** Octubre 2026  
**Proyecto:** Plataforma de Videovigilancia en la Nube VIGILA  
**Objetivo:** Optimizar la infraestructura en AWS para reducir costos, mejorar la seguridad, escalar la base de datos y gestionar eficientemente el almacenamiento masivo de video.

---

## 1. Revisión de la Infraestructura Actual y Puntos Críticos

Durante la migración inicial de VIGILA a AWS, se han identificado los siguientes cuellos de botella que afectan el rendimiento y la rentabilidad:

*   **Costos de Cómputo (EC2):** Uso ineficiente de instancias On-Demand para todas las cargas de trabajo (incluso las no críticas o asíncronas), resultando en sobreaprovisionamiento y facturas elevadas.
*   **Almacenamiento (Storage):** Guardar videos directamente en discos EBS (bloques) o sin un ciclo de vida definido genera costos exorbitantes dada la naturaleza masiva de la videovigilancia.
*   **Base de Datos:** Bases de datos monolíticas y no optimizadas que sufren cuellos de botella al gestionar altos volúmenes de metadatos, registros y usuarios en tiempo real.
*   **Seguridad:** Accesos no restringidos adecuadamente, falta de encriptación generalizada y gestión ineficiente de credenciales.

---

## 2. Propuesta de Optimización de EC2 y Almacenamiento (Cómputo)

Para reducir drásticamente los gastos de cómputo sin comprometer el rendimiento:

*   **Aplicación Web (Laravel/PHP):** Desplegar la aplicación monolítica actual utilizando **AWS Elastic Beanstalk**. Esto proporciona Auto Scaling out-of-the-box, ajustando el número de instancias según el tráfico (por ejemplo, subiendo en horas de mayor actividad de usuarios).
*   **Procesamiento de Video (Encoding/Transcoding):** Extraer las tareas pesadas de procesamiento de video del flujo principal y ejecutarlas en **Amazon EC2 Spot Instances**. Al ser tareas tolerantes a fallos (se pueden reintentar si se interrumpe la instancia), podemos aprovechar el mercado de Spot y **ahorrar hasta un 90%** en comparación con instancias On-Demand.
*   **Microservicios y Tareas Basadas en Eventos:** Implementar **AWS Lambda** (Serverless) para tareas de respuesta rápida, como:
    *   Generación automática de miniaturas (thumbnails) cuando se sube un nuevo fragmento de video a S3.
    *   Envío de alertas o notificaciones push de movimiento detectado.
    *   *Costo cero si no hay eventos.*

---

## 3. Base de Datos Optimizada en Amazon RDS

Las bases de datos que gestionan el log de eventos, configuración de cámaras y usuarios requieren alta concurrencia:

*   **Migración a Amazon Aurora:** Mover la base de datos a **Amazon Aurora** (compatible con MySQL/PostgreSQL). Aurora ofrece hasta 5 veces el rendimiento de MySQL estándar, con almacenamiento tolerante a fallos y autorreparable que escala automáticamente hasta 128TB.
*   **Alta Disponibilidad (Multi-AZ):** Desplegar Aurora en múltiples Zonas de Disponibilidad para asegurar la continuidad del negocio en caso de desastres.
*   **Réplicas de Lectura (Read Replicas):** Configurar Aurora Auto Scaling con réplicas de lectura. El tráfico de escritura (logs de cámaras) irá a la instancia principal, mientras que todo el tráfico de lectura (usuarios viendo reportes, dashboards de Laravel) se balanceará entre las réplicas, aliviando la carga.

---

## 4. Estrategia de Seguridad (IAM, SG, Encriptación)

La protección de datos de videovigilancia es crítica y debe seguir el modelo *Zero Trust*:

*   **IAM (Identity and Access Management):** Implementar el Principio de Menor Privilegio. Ninguna instancia EC2 usará claves de acceso de larga duración estáticas. En su lugar, se asignarán **Roles de IAM** a las instancias (EC2) y funciones Lambda, permitiéndoles acceder a S3 o RDS de forma segura y temporal.
*   **Protección de Red:** 
    *   Todas las bases de datos (RDS) y servidores de aplicaciones estarán en **Subredes Privadas** sin IP pública, protegidas por **NACLs** y **Security Groups** restrictivos.
    *   El acceso desde Internet se hará únicamente a través de un **Application Load Balancer (ALB)** en una subred pública.
    *   Uso de **AWS WAF** (Web Application Firewall) en el ALB para bloquear ataques SQLi, XSS y tráfico de bots maliciosos.
*   **Encriptación de Datos:**
    *   **En Reposo:** Encriptación nativa gestionada por **AWS KMS** (Key Management Service) activada obligatoriamente para todos los buckets S3, volúmenes EBS y bases de datos RDS.
    *   **En Tránsito:** Uso de certificados SSL/TLS gratuitos mediante **AWS Certificate Manager (ACM)** asociados al balanceador de carga.

---

## 5. Uso de AWS Systems Manager (SSM)

Para automatizar las tareas de mantenimiento y administración del parque de servidores sin comprometer la seguridad:

*   **SSM Session Manager:** Reemplazar por completo el acceso SSH tradicional (puerto 22 abierto). Los administradores accederán a las instancias de forma segura mediante Session Manager desde la consola o CLI, quedando todo el historial de comandos registrado en CloudTrail y S3 para auditorías.
*   **SSM Patch Manager:** Automatizar la aplicación de parches de seguridad a nivel de Sistema Operativo en las instancias EC2 dentro de ventanas de mantenimiento predefinidas.
*   **SSM Parameter Store / Secrets Manager:** Las credenciales de la base de datos, tokens de API de terceros y configuraciones (variables `.env`) se almacenarán de forma centralizada y segura, inyectándose dinámicamente en tiempo de ejecución.

---

## 6. Soluciones de Almacenamiento Escalable para Videovigilancia

El video es el activo principal de VIGILA. Almacenarlo adecuadamente es crucial para los costos:

*   **Amazon EBS:** Usar volúmenes tipo **gp3** exclusivamente para el sistema operativo de las instancias EC2 (rendimiento predecible a bajo costo). No usar para guardar videos.
*   **Ingesta y Video Reciente (Amazon S3):** Todos los flujos de video entrantes se almacenarán directamente en **Amazon S3 Standard**. S3 es infinitamente escalable, diseñado para una durabilidad del 99.999999911%.
*   **Gestión del Ciclo de Vida (S3 Lifecycle Policies):** Para mitigar costos por almacenamiento histórico:
    *   **> 30 días:** Mover automáticamente los videos que rara vez se consultan a **S3 Glacier Flexible Retrieval** (reducción drástica del costo de GB/mes).
    *   **> 1 año (Retención Legal):** Mover a **S3 Glacier Deep Archive**, la clase de almacenamiento más económica de AWS, para archivos de cumplimiento normativo que raramente se acceden y toleran tiempos de recuperación largos.

---

## 7. Presentación de Mejoras Esperadas y Beneficios Finales

La implementación de esta arquitectura integral brindará a VIGILA los siguientes beneficios clave:

1.  **Ahorro de Costos Sustancial:**
    *   Hasta un **90% de ahorro** en cómputo de procesamiento asíncrono gracias a EC2 Spot Instances.
    *   Reducción masiva en almacenamiento histórico a largo plazo utilizando S3 Glacier y políticas de ciclo de vida.
    *   Optimización del gasto (*Pay-as-you-go*) mediante Elastic Beanstalk y funciones Lambda (Serverless), evitando pagar por instancias ociosas.
2.  **Rendimiento y Escalabilidad Maximizados:**
    *   Escalado automático tanto a nivel de aplicación (Auto Scaling Groups) como de Base de Datos (Aurora Read Replicas). La plataforma soportará grandes picos de cámaras conectadas y procesamiento de video en tiempo real sin sufrir caídas ni degradación.
3.  **Seguridad y Cumplimiento Normativo:**
    *   Infraestructura totalmente blindada desde la red (sin exposición pública de BD/Servers) hasta el dato (KMS, WAF, SSL).
    *   Auditoría y administración centralizada libre de vulnerabilidades asociadas a puertos abiertos (SSM), cumpliendo con estándares de seguridad internacionales.
