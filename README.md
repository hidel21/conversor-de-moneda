### 🌍Conversor de Monedas - Proyecto Laravel Livewire 🚀

#### 📝 Descripción General
¡Bienvenido al proyecto Conversor de Monedas! Este es un sistema sencillo y amigable desarrollado en Laravel Livewire, que te permite convertir cantidades entre diferentes monedas de manera rápida y eficiente. Ideal para viajeros, estudiantes de finanzas o simplemente para quienes gustan de mantenerse al tanto del mundo de las divisas. 🌐💱

#### 🌟 Características Principales
- **Conversión Instantánea**: Convierte montos de una moneda a otra en un abrir y cerrar de ojos. 💸
- **Soporte de Múltiples Monedas**: Accede a una amplia gama de monedas internacionales. 🌍
- **Interfaz Amigable**: Fácil de usar, ideal para todos los usuarios. 👥
- **Validación Inteligente**: Garantiza la precisión en las entradas de los usuarios. ✅
- **Uso Diario Limitado**: Para mantener la calidad del servicio, limitamos las conversiones diarias. 📆

#### 🛠️ Cómo Empezar
1. **Instalación**:
   - Clona el repositorio en tu máquina local:
     ```
     git clone [URL_DEL_REPOSITORIO]
     ```
   - Navega al directorio del proyecto:
     ```
     cd [NOMBRE_DEL_DIRECTORIO]
     ```

2. **Configuración**:
   - Instala las dependencias de Composer:
     ```
     composer install
     ```
   - Configura tu archivo `.env` copiando el ejemplo proporcionado y ajustándolo según tus necesidades:
     ```
     cp .env.example .env
     ```
     Luego, asegúrate de establecer las claves de la API en el archivo `.env`:
     ```
     CURRENCY_LAYER_API_URL=[URL_DE_LA_API]
     CURRENCY_LAYER_API_KEY=[TU_CLAVE_API]
     ```

3. **Base de Datos**:
   - Configura tu conexión de base de datos en el archivo `.env`.
   - Ejecuta las migraciones para configurar tu base de datos:
     ```
     php artisan migrate
     ```

4. **Ejecución**:
   - Genera la clave de la aplicación de Laravel:
     ```
     php artisan key:generate
     ```
   - Inicia el servidor de desarrollo:
     ```
     php artisan serve
     ```
   - Abre tu navegador y navega a la dirección proporcionada, usualmente `http://localhost:8000`.



#### 🔧 Requisitos
- PHP 7.4 o superior.
- Laravel y Livewire.
- Clave API para acceder a los servicios de conversión de monedas.

#### 📋 Configuración del Entorno
- `CURRENCY_LAYER_API_URL`: URL de la API de conversión.
- `CURRENCY_LAYER_API_KEY`: Tu clave API personal.

#### 🌈 Uso del Controlador
El corazón de este proyecto es nuestro controlador `CurrencyConverter`, que maneja todas las operaciones de conversión. Es fácil de entender y utilizar, ¡incluso para principiantes!

#### 📊 Limitaciones y Errores
- El sistema tiene un límite diario de conversiones para cada usuario.
- Los errores se manejan de forma clara, informando al usuario sobre cualquier problema.

