![Hub Of Homes Logo](./logo.svg)

## Table of Contents
- [Description](#description)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Features](#features)

## Description
Hub Of Homes is a user-friendly Real-Estate Listing Management platform for uploading, searching, and managing property listings. Users can easily view uploaded detailed property descriptions and photos, search for listings using advanced filters, and view properties on interactive maps. The admin can add/remove new properties as required.

## Tech Stack
- **Frontend:** HTML, CSS, JS
- **Backend:** PHP, JS
- **Database:** MySQL
- **Server:** Apache
- **Version Control:** Git, GitHub

## Installation
Follow these steps to set up the project locally:


### Prerequisites:
1. **Web Server with PHP support**: Ensure you have a web server like Apache or another server with PHP support installed.

2. **MySQL Server**: Make sure you have a MySQL server installed on the machine intended for local setup.


### Setup:
1. **Clone the repository:**

   ```bash
   git clone https://github.com/RadiantQuark/HubOfHomes.git
   ```
  
2.  **Move Project files to the Server's Root Directory:**  
    Copy all files from the cloned repository into your installed web server's root directory. For example, if XAMPP is used, copy all files from the cloned repo to the *htdocs* folder residing inside XAMPP's installation directory.

3. **Start Database Server:**  
    Start the MySQL service according to the installed server. Make sure the service starts on the port *3306*.

4. **Import the Database:**  
    From your database service control panel, import the pre-constructed database schema into the local database server by importing the file *database_structure.sql* from the root directory of the repository.

5. **Start the webserver:**  
    After completing all the above steps, start the webserver service to host the project on the local machine. *XAMPP* is the recommended software package to host this project as it contains both, *Apache* Server and the *MySQL* database required to host this project as a single package.

## Features
- **Add New Listings:** Authorized users can add new listings from the homepage, by providing details such as property name, address, photos (interior/exterior), etc.

- **View Listings:** Users can view uploaded listings by clicking the *View Details* button provided under each Listing on the *Listings* Page.

#### Disclaimer:
This project's front-end is heavily based on a template available for free use on the web. The template was completely static. Hence, conversion from static to dynamic was necessary for a working prototype of the project. Only the pages' designs were taken as inspiration from the template.