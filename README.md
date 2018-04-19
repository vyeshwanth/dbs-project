# dbs-project

### Installation
#### Required tools
* Git
* Yarn
* Xampp

#### On Windows using XAMPP

1. Open Windows powershell
2. Go to XAMPP root directory ```cd C:\xampp\htdocs```
3. Clone the git repo using ```git clone https://github.com/vyeshwanth/dbs-project.git```
4. ```cd dbs-project```
5. ```yarn install``` to install dependencies like bootstrap, jquery etc.,
6. open folder ```dbs-project``` in a text editor or any IDE
7. copy the contents of ```config.sample.php``` to a new ```config.php``` file
8. change ```$config['password']``` to your mysql server password. By default it is empty 
9. Open XAMPP control panel and start Apache and MySQL services.
10. Go to [http://localhost/dbs-project](http://localhost/dbs-project)
