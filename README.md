
# Foodics Code Chalange

Task requirements

In a system that has three main models; Product, Ingredient, and Order.
A Burger (Product) may have several ingredients:
- 150g Beef
- 30g Cheese
- 20g Onion
The system keeps the stock of each of these ingredients stored in the database. You
can use the following levels for seeding the database:
- 20kg Beef
- 5kg Cheese
- 1kg Onion
When a customer makes an order that includes a Burger. The system needs to update the
stock of each of the ingredients so it reflects the amounts consumed.
Also when any of the ingredients stock level reaches 50%, the system should send an
email message to alert the merchant they need to buy more of this ingredient.

## Run Project

Clone the project

```bash
  git clone https://github.com/AndrewWagih/foodics-code-challenge-.git
```

Go to the project directory

```bash
  cd oodics-code-challenge
```

Install dependencies

```bash
  composer install
```

Run migration with seeder

```bash
  php artisan migrate --seed
```

Start the server

```bash
  php artisan serve
```


## Document

DB: https://github.com/AndrewWagih/foodics-code-challenge-/blob/main/Documents/DB

Postman Collection: https://github.com/AndrewWagih/foodics-code-challenge-/tree/main/Documents/PostmanCollection


## API Reference

#### Get all product

```http
  GET /api/products
```

#### Get single product

```http
  GET /api/product/{id}
```

#### Get order list

```http
  GET /api/orders
```


#### Store Order

```http
  GET /api/order
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `product`      | `array` | **Required**.  |
| `product.product_id`      | `integer` | **Required**. Id of item to fetch |
| `product.quantitu`      | `integer` | **Required**,**Min 1**|



