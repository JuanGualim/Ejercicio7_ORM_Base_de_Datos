# 🛒 Proyecto E-commerce con Laravel y Eloquent

## 📌 Descripción

Este proyecto consiste en el desarrollo de un sistema de base de datos
utilizando Laravel y Eloquent ORM. Se implementa un modelo de tienda en
línea (E-commerce) con múltiples relaciones entre entidades.

------------------------------------------------------------------------

## 🧱 Estructura del Proyecto

El sistema incluye las siguientes tablas:

-   users
-   addresses
-   categories
-   products
-   product_images
-   orders
-   order_items
-   payments
-   reviews
-   carts
-   cart_items
-   category_product (tabla pivote)

------------------------------------------------------------------------

## 🔗 Relaciones implementadas

Se implementaron múltiples relaciones entre modelos:

-   One to One: Order → Payment
-   One to Many:
    -   User → Orders
    -   Order → OrderItems
    -   Product → Reviews
-   Many to Many:
    -   Product ↔ Category
-   Otros:
    -   User → Cart
    -   Cart → CartItems

------------------------------------------------------------------------

## ⚙️ Tecnologías usadas

-   Laravel
-   Eloquent ORM
-   MySQL
-   Docker (Laravel Sail)

------------------------------------------------------------------------

## 🚀 Instalación y ejecución

1.  Clonar el repositorio:

``` bash
git clone <URL_DEL_REPO>
cd ecommerce
```

2.  Levantar contenedores:

``` bash
./vendor/bin/sail up -d
```

3.  Ejecutar migraciones y seeders:

``` bash
./vendor/bin/sail artisan migrate:fresh --seed
```

------------------------------------------------------------------------

## 🌱 Datos

El sistema genera más de **10,000 registros** usando factories y
seeders, simulando datos reales.

------------------------------------------------------------------------

## 🔍 Consultas Eloquent

Ejemplos implementados:

### 1. Órdenes con usuario y productos (Eager Loading)

``` php
Order::with(['user', 'items.product'])->get();
```

### 2. Productos con categorías

``` php
Product::with('categories')->get();
```

### 3. Productos con reviews mayores a 4

``` php
Product::whereHas('reviews', function ($q) {
    $q->where('rating', '>', 4);
})->with('reviews')->get();
```

### 4. Usuarios con órdenes mayores a $100 ```php User::whereHas('orders', function ($q) {

    $q->where('total', '>', 100);

})-\>with('orders')-\>get();


    ### 5. Productos ordenados por precio
    ```php
    Product::orderBy('price', 'desc')->get();

