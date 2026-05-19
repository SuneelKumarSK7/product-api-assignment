# Product Inventory API (Laravel 12)

A RESTful Product Inventory API built using Laravel 12. This API allows users to create, update, and retrieve product details using JSON file storage instead of a database.

---

## Tech Stack

- **Framework:** Laravel 12.12.2
- **Language:** PHP 8+
- **Storage:** JSON File Storage
- **Response Format:** Laravel API Resources/Collections (JSON)
- **Architecture:** Service-Based Architecture
- **API Type:** RESTful

---

## ⚙️ Setup Instructions

### 1️⃣ Clone & Install

```bash
git clone https://github.com/<your-username>/product-api-assignment.git

cd product-api-assignment

composer install

cp .env.example .env

php artisan key:generate

php artisan serve
Run the Application
php artisan serve

Open in browser:

http://127.0.0.1:8000
API Base URL
http://127.0.0.1:8000/api 

API Endpoints
Use the following APIs in Postman to test the application functionality and verify the responses.

Feature	                Method	  Endpoint	            Description
Create Product	        POST	  /api/products	        Create a new product
Get All Products	    GET	      /api/products	        Retrieve all products
Get Single Product	    GET	      /api/products/{id}	Retrieve single product
Update Product	        PUT	      /api/products/{id}	Update product details


Request Payload Examples
Create Product
POST /api/products (Example: http://127.0.0.1:8000/api/products)

{
    "name": "Laptop",
    "description": "Gaming Laptop",
    "price": 50000,
    "quantity": 10
}


Update Product
PUT /api/products/1 (Example: http://127.0.0.1:8000/api/products/1)

{
    "price": 55000
}

Sample API Response

{
    "success": true,
    "message": "Product created successfully.",
    "data": {
        "id": 1,
        "name": "Laptop",
        "description": "Gaming Laptop",
        "price": 50000,
        "quantity": 10
    }
}

Retrieve all products
GET /api/products (Example: http://127.0.0.1:8000/api/products)


Retrieve single product
GET /api/products/1 (Example: http://127.0.0.1:8000/api/products/1)




Validation Rules

Field	               Rules
name	               required, string, max:255
description	           nullable, string
price	               required, numeric, min:0.01
quantity	           required, integer, min:0



Features Implemented

1: Service-Based Architecture
2: Form Request Validation
3: Laravel API Resources & Collections
4: JSON File Storage
5: Proper HTTP Status Codes
6: Exception Handling
7: Clean RESTful APIs


Commands Summary

Purpose	                Command
Generate App Key	    php artisan key:generate
Run Application	        php artisan serve
Clear Cache	            php artisan optimize:clear



Storage Information

Products are stored inside:
storage/app/products/products.json
No database is used as per assignment requirements.


Author

Suneel Kumar
Full Stack Web Developer

📧 suneelkumarsk036@gmail.com

📞 +91-9793581152

🌐 New Delhi, India

License

MIT License — Free for learning and interview purposes.