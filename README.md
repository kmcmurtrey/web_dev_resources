# web_dev_resources

This is my project for Code Louisville's back-end PHP web development course. It's a website to display my favorite and most used resources while learning web development. It's written in PHP to connect to a MySQL database that stores the data about the resources.

<h2>Getting Started</h2>
Cloning this repo and previewing the website should be pretty straightforward with Vagrant and Composer:
<ol>
  <li>Fork the repo or just clone it to your local machine.</li>
  <li>CD into the directory of the repo and run:

  ```
  vagrant up
  ```
  The included Vagrant file uses <a href="box.scotch.io">Scotch Box</a>.</li>
  <li>

  ```
  composer install
  ```
  </li>
  <li>Preview the site in your browser at 192.168.33.10. </li>
</ol>

<h2>Basic features include:</h2>
<ol>
  <li>Main page displaying all the websites in the database.</li>
  <li>MySQL database to store the website data.</li>
  <li>Form to create and edit websites in the database.</li>
  <li>The ability to delete websites from the database.</li>
  <li>A category sidebar that calls different SQL queries to display different groups of websites.</li>
  <li>Button to vote for your favorite or most used resources.</li>
  <li>Sort websites based on different criteria (category, alphabetically, popularity).</li>
  <li>Pagination.</li>
</ol>
    
<h2>Other features to implement include:</h2>
<ol>
  <li>Login functionality so multiple users can add/edit website list items.</li>
  <li>Nicer display of items.</li>
  <li>Comment system for users to add comments on individual list items.</li>
</ol>
