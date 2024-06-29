# Thriftify

Welcome to Thriftify – your go-to multi-vendor e-commerce platform dedicated to thrift products. Whether you're a vendor looking to sell unique thrift items or a customer hunting for great deals, Thriftify offers a seamless and engaging shopping experience. This README provides a comprehensive guide on Thriftify's features, setup instructions, and additional recommendations to enhance your journey with us.

## Features

Thriftify comes packed with a range of features designed to provide an excellent user experience for both vendors/stores and customers:

### 1. User Authentication

-   **User Registration and Login**
-   **Store Registration and Login**
-   **Phone Number Validation**
-   **Email Validation:**

### 2. Product Management (CRUD)

-   **Create Product**
-   **Read Produc**
-   **Update Product**
-   **Delete Product**

### 3. Product Status Management

-   **Draft:** Products will not be displayed on the Thriftify main page.
-   **For Sale:** Products that are ready to be sold.
-   **Waiting for Payment:** When a product is added to the cart and the user proceeds to checkout but has not paid yet.
-   **Need Confirmation:** After the user has paid, the status changes to need confirmation from the store.
-   **On Delivery:** After store confirmation, the product status changes to on delivery and will automatically change to success after 10 seconds.
-   **Success:** After the store confirms the delivery, the product status changes to success.

### 4. Cart Management

-   Users can add products to their cart.
-   **Select Products for Checkout:** Users can select which products to proceed with for checkout.
-   **Retain Unselected Products:** Products not selected for checkout remain in the cart.

### 5. Checkout Process

-   **Create Order:** Creating an order for the selected products.
-   **200-Second Auto-Reject** If a user does not complete the payment within 200 seconds from checkout, the order is canceled and the product status reverts to for sale.

### 6. Order Payment

-   Users can proceed to pay for their orders.
-   **Session Handling:** After payment, the session data is updated to remove the paid orders from the list.

### 7. Order Confirmation by Store

-   **Confirm Order:** Store confirms the order changing the status to on delivery.
-   **Automatic Status Change:** After 200 seconds, the order status changes from on delivery to success.

### 8. Order Detail View

-   **User Order History Detail:** Users can view details of their orders by clicking on the order card.
-   **Store Sales Detail:** Stores can view details of each sale by clicking on the sale card.

### 9. Profile

-   Users and Store can change their profile.

### 10. Other

-   Slug
-   Validation
-   Authorization
-   Responsiveness
-   Live Preview for Upload Store Logo

## Setup

### Prerequisites

-   PHP 8.0 or higher
-   Composer
-   MySQL

### Installation

1. **Clone the repository**:

    ```sh
    git clone https://github.com/muhananaufal/thriftify.git
    cd thriftify
    ```

2. **Install dependencies**:

    ```sh
    composer install
    npm install
    ```

3. **Environment setup**:

    - Copy the `.env.example` to `.env`:
        ```sh
        cp .env.example .env
        ```
    - Update the `.env` file configurations.

        ```sh
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=thriftify
        DB_USERNAME=root
        DB_PASSWORD=

        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        FILESYSTEM_DISK=local
        QUEUE_CONNECTION=database
        SESSION_DRIVER=file
        SESSION_LIFETIME=120
        ```

4. **Generate application key**:

    ```sh
    php artisan key:generate
    ```

5. **Run migrations**:

    ```sh
    php artisan migrate
    ```

6. **Seed the database**:

    ```sh
    php artisan db:seed --class=CategorySeeder
    ```

7. **Compile Assets**:

    ```sh
    npm run dev
    ```

8. **Start the development server**:

    ```sh
    php artisan serve
    ```

9. **Run queue worker**:

    ```sh
    php artisan queue:work
    ```

10. **Access the application**:
    - Open your browser and go to `http://127.0.0.1:8000`

## Usage

### User Actions

1. Register and login as a user.
2. Browse products and add desired products to the cart.
3. Proceed to checkout, select shipping and payment methods, and place the order.
4. View order status and history, and confirm receipt of products.

### Vendor/Store Actions

1. Register and login as a store.
2. Create and manage products.
3. View and confirm orders.
4. Manage sales history.

### Detail

## Feature

-

### Conclusion

Thriftify is a robust multi-vendor e-commerce platform designed to cater to the needs of thrift product enthusiasts. By following the setup instructions and recommendations, you can get Thriftify up and running smoothly. For any issues or feature requests, please refer to the repository's issue tracker.

Happy Thrifting with Thriftify!

### Team Members

Thriftify is developed by Team Atom a team from AMCC:

-   Team Leader: Muhana Naufal Al-Atsari - [muhananaufal@students.amikom.ac.id]

-   Backend Fasilitator: Adib
-   Backend Developer: Muhana Naufal Al-Atsari - [muhananaufal@students.amikom.ac.id]
-   Backend Developer: Syafiq Ilham Sholehudin - [syafiqilhams@students.amikom.ac.id]

-   Frontend Fasilitator: Figo
-   Frontend Developer: Nasywan Damar Fadhila - [nasywanfadilah@gmail.com]
-   Frontend Developer: Aurellia Nur Fitria - [orellaja@students.amikom.ac.id]
-   Frontend Developer: Rosita Kurnia Larasati - [sitaras@students.amikom.ac.id]

### Project Management

The Thriftify project was managed using ClickUp, a comprehensive project management tool. ClickUp allowed us to effectively:

-   Assign tasks and responsibilities to team members.
-   Track progress and deadlines.
-   Collaborate on project documentation and features.
-   Ensure smooth communication within the team.

## Contribution

Contributions are welcome! Please fork the repository and submit a pull request for any improvements.

## License

This project is open-source and available under the [MIT License](LICENSE).
