The suffix of the database data is `.sql`, which requires SQL query import,

The database configuration file is `database.php`.

## screenshot

![R_22-12-19-14-28-20_80](https://pic.shejibiji.com/i/2022/12/19/63a004c605532.jpg)

![R_22-12-19-14-33-35_80](https://pic.shejibiji.com/i/2022/12/19/63a005cd3c8b2.jpg)

## Question 3

Please build a small API based application.

The application should have a backend/API function (load.api) and a calling frontend (fetch.php).

Discription of function:

The client should display data from the sql-db as a html page in a neat way. The client will get it‘s data to be displayed over an URI call from the backend as an JSON-object. It should be possible to alter all displayed data value in the frontende and send them to the backend. Please use JSON for this too. 

The backend must get the requested data from the sql-db. The backend must also take JSON data from the frontend and write it to the database.

Short description:

Backend/API:

\-   Get data from a database and pass it as an JSON reply to the calling client (fetch,php).

\-   Write reveived data tot he database.

Client:

\-   Request data by calling the backend and receive it as a JSON-object. Display data in html

\-   Let the user alter all data and send it to the backend (API).

Database:

Table „vehicle“

id int(10) auto inc.

manuactor varChar(15)

typ varChar(15)

ps int(3)

Please fill the database mit at least 5 example data sets.

 

**Please note:**

This application is very close to our projects, so it is essential that you understand all aspects of how it works.

Important: Please make use of JSON for data exchange between the backend and frontend.

![img](https://pic.shejibiji.com/i/2022/12/27/63aacd52ba86b.png)