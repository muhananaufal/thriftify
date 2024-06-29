# Thriftify

Welcome to Thriftify – your go-to multi-vendor e-commerce platform dedicated to thrift products. Whether you're a vendor looking to sell unique thrift items or a customer hunting for great deals, Thriftify offers a seamless and engaging shopping experience. This README provides a comprehensive guide on Thriftify's features, setup instructions, and additional recommendations to enhance your journey with us.

## Features
Thriftify comes packed with a range of features designed to provide an excellent user experience for both vendors and customers:

### User Features
- **User Authentication**: Register, login, and manage profiles.
- **Product Browsing**: Browse products that are available for sale.
- **Cart Management**: Add products to the cart and manage the cart.
- **Checkout**: Select shipping and payment methods, and checkout the products.
- **Order Management**: View order status and history, pay for orders, and confirm deliveries.

### Vendor/Store Features
- **Store Authentication**: Register, login, and manage store profiles.
- **Product Management**: Create, update, and delete products.
- **Order Management**: View orders that need confirmation, confirm orders, and manage deliveries.
- **Sales History**: View the history of successful sales.

### Additional Features
- **Status Updates**: Products automatically update their status from 'on_delivery' to 'success' after 200 seconds of confirmation.
- **Session Management**: Manage carts and orders through sessions.

## Setup

### Prerequisites
- PHP 8.0 or higher
- Composer
- MySQL

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


### Conclusion
Thriftify is a robust multi-vendor e-commerce platform designed to cater to the needs of thrift product enthusiasts. By following the setup instructions and recommendations, you can get Thriftify up and running smoothly. For any issues or feature requests, please refer to the repository's issue tracker.

Happy Thrifting with Thriftify!

### Team Members
Thriftify is developed by Team Atom a team from AMCC:

- Team Leader: Muhana Naufal Al-Atsari - [muhananaufal@students.amikom.ac.id]

- Backend Fasilitator: Adib
- Backend Developer: Muhana Naufal Al-Atsari - [muhananaufal@students.amikom.ac.id]
- Backend Developer: Syafiq Ilham Sholehudin - [syafiqilhams@students.amikom.ac.id]

- Frontend Fasilitator: Figo
- Frontend Developer: Nasywan Damar Fadhila - [nasywanfadilah@gmail.com]
- Frontend Developer: Aurellia Nur Fitria - [orellaja@students.amikom.ac.id]
- Frontend Developer: Rosita Kurnia Larasati - [sitaras@students.amikom.ac.id]

### Project Management
The Thriftify project was managed using ClickUp, a comprehensive project management tool. ClickUp allowed us to effectively:

- Assign tasks and responsibilities to team members.
- Track progress and deadlines.
- Collaborate on project documentation and features.
- Ensure smooth communication within the team.

## Contribution

Contributions are welcome! Please fork the repository and submit a pull request for any improvements.

## License

This project is open-source and available under the [MIT License](LICENSE).

