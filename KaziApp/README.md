
 <h1 align="center"> Kazi App </h1>


 

## Description.

This is a basic php project for recording tasks done, employees who undertook the tasks and other relevant data.

## Installation.

- Clone the project.    
```bash 
$ git clone https://github.com/Jesse-Bett/kaziplus.git
```  

- Ensure you have php, xampp and mysql installed.

- In **phpMyAdmin**, Run all the queries in ``` queries.sql ```  which is in the root folder of the repository. The queries are for creating the database and tables, and also populating tables. The passwords are hashed by **MD5** before being inserted to the database.

## Running the App.

- To run the app, move the **KaziApp** folder to **htdocs** directory so that it will be detected by xampp.

- Start xampp and ensure that both **mysql** and  **Apache** servers are running.

- Head  over to your browser and type  ``` http://localhost/KaziApp ``` on the URl searchbar, the web app should be visible.


- To **Log In** there are currently three users in the database and according to the queries you have run in queries.sql, their cridentials for email and password respectively are:
- ```pep@gmail.com``` - ```trebble123```
- ``` harrykane@gmail.com``` - ```harryscores```
-  ```braut@gmail.com``` - ```goldenboot```
    

## Database Design.

- Employee database.

| Field       | Data Type |
|-------------|-----------|
|   eid (Primary Key)   |    INT    |
|  first_name   |   VARCHAR(10)    |
|  last_name   | VARCHAR(10)      |
| phone|INT(12)   |
| email|VARCHAR(55)    |
|password|VARCHAR(55)        |



- Projects database.

| Field       | Data Type |
|-------------|-----------|
|pid (Primary Key)| INT|
| project_name| VARCHAR(55)|
|start_date| DATE|
|end_date| DATE|



- Employee database.

| Field       | Data Type |
|-------------|-----------|
|   tid (Primary Key)   |    INT    |
|  eid (Foreign Key) |   INT   |
|  pid  (Foreign Key)| INT     |
| date_done|DATE   |
| task|VARCHAR(55)    |
|time_taken (hours)|INT         |
|comments|VARCHAR(255)        |






## Screenshots.

- Log In page.
 ![LogIn Page](https://github.com/Jesse-Bett/kaziplus/assets/40341693/0ce14f53-e94a-49b1-97c0-c9f680a12c80)


- Home Page.
 ![Home Page](https://github.com/Jesse-Bett/kaziplus/assets/40341693/f4e78adb-a30e-4df2-b5cb-5489dde711db)

