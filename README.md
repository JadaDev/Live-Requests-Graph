![Alt text](https://github.com/JadaDev/Live-Requests-Graph/blob/main/graph_preview.png)
https://github.com/JadaDev/Live-Requests-Graph/blob/main/graph_preview_cf.png

# Live Graph Requests

This PHP script provides a live graph representation of incoming requests to a website. It utilizes a combination of JavaScript, CSS, PHP, HTML, and a database to display real-time data. The script requires an Apache server for execution and a database for data storage. To set up the script, follow the installation instructions below.

## Installation

1.  Ensure you have an Apache server installed on your machine. If you don't have one, you can install Apache by following the instructions for your operating system:
    
    -   **Windows:** Download and install [XAMPP](https://www.apachefriends.org/index.html).
    -   **Mac:** Install [MAMP](https://www.mamp.info/).
    -   **Linux:** Use the package manager specific to your distribution (e.g., `apt` for Ubuntu, `yum` for CentOS).
2.  Download or clone the repository to your local machine.
3.  Edit `config.php` to your database information & Edit `index.php` to add CloudFlare API (CloudFlare_Global_API_Key, CloudFlare_Zone_ID, CloudFlare_Email)
4.  Create a database named "visitors" in your preferred database management system (e.g., MySQL, PostgreSQL).
    
5.  Import the `visitors.sql` file into the "visitors" database. This file contains the necessary table structure for storing visitor data.
6.  `mysql -u your_username -p visitors < visitors.sql` 
    
    Replace `your_username` with your database username and enter your password when prompted.
    
7.  Copy the entire script folder to your Apache server's document root. The document root is typically located in one of the following directories:
    
    -   **Windows (XAMPP):** `C:\xampp\htdocs`
    -   **Mac (MAMP):** `/Applications/MAMP/htdocs`
    -   **Linux:** `/var/www/html`
8.  Open a web browser and navigate to `http://localhost/script-folder` (replace `script-folder` with the actual path of the copied folder).
    
9.  The live graph should now be displayed, representing the incoming requests to the website in real-time.

    

## Usage

The script captures incoming requests and stores relevant information in the database. The live graph updates dynamically to display the number of requests over time.

## Technologies Used

The Live Graph Requests script utilizes the following technologies:

-   **JavaScript:** Responsible for updating the graph in real-time by making AJAX requests to the server.
-   **CSS:** Used for styling the graph and providing visual aesthetics.
-   **PHP:** Handles the server-side logic, including capturing and storing the incoming request data in the database.
-   **HTML:** Renders the web page structure and provides the canvas for the graph.
-   **Database:** Stores the captured request data for future analysis.

## License

This script is licensed under the [MIT License](https://chat.openai.com/LICENSE). Feel free to modify and use it according to your needs.
