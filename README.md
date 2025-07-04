## 🚀 Steps to Run the Project

1. **Create a `.env` file** in the root directory of the project.

2. **Fill in the `.env` file** with the required environment variables.  
   You can copy everything from the `.env.example` file and paste it into the `.env` file, then adjust the values accordingly.

3. **Update the database name** in the `.env` file to exactly match the name of the database you created.

4. **Run database migrations and seed data** with the following command:

   ```bash
   php artisan migrate --seed
   ```

5. **Create a symbolic link** to the storage folder to allow image display:

   ```bash
   php artisan storage:link
   ```

6. **Install project dependencies** using:

   ```bash
   composer install
   ```

   and

   ```bash
   npm install
   ```

7. **Generate the application key** by running:

   ```bash
   php artisan key:generate
   ```

8. **Compile frontend assets** using:

   ```bash
   npm run dev
   ```

9. **Run the development server**:

   ```bash
   php artisan serve
   ```

10. **Copy the URL** displayed in the terminal and paste it into your browser to view the app.
